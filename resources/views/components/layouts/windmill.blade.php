<!DOCTYPE html>
<html :class="{ dark }" x-data="data()" lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Windmill Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body x-cloak>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        @include('components.windmill.sidebar')
        <div class="flex flex-col flex-1 w-full">
            @include('components.windmill.header')
            <main class="h-full overflow-y-auto">
                {{ $slot }}
            </main>
        </div>
    </div>
    <script>
        function data() {
            function getThemeFromLocalStorage() {
                // if user already changed the theme, use it
                if (window.localStorage.getItem('dark')) {
                    return JSON.parse(window.localStorage.getItem('dark'))
                }

                // else return their preferences
                return (
                    !!window.matchMedia &&
                    window.matchMedia('(prefers-color-scheme: dark)').matches
                )
            }

            function setThemeToLocalStorage(value) {
                window.localStorage.setItem('dark', value)
            }

            return {
                dark: getThemeFromLocalStorage(),
                toggleTheme() {
                    this.dark = !this.dark
                    setThemeToLocalStorage(this.dark)
                },
                isSideMenuOpen: false,
                toggleSideMenu() {
                    this.isSideMenuOpen = !this.isSideMenuOpen
                },
                closeSideMenu() {
                    this.isSideMenuOpen = false
                },
                // Modal
                isModalOpen: false,
                trapCleanup: null,
                openModal() {
                    this.isModalOpen = true
                    this.trapCleanup = focusTrap(document.querySelector('#modal'))
                },
                closeModal() {
                    this.isModalOpen = false
                    this.trapCleanup()
                },
            }
        }
        /**
         * Limit focus to focusable elements inside `element`
         * @param {HTMLElement} element - DOM element to focus trap inside
         * @return {Function} cleanup function
         */
        function focusTrap(element) {
            const focusableElements = getFocusableElements(element)
            const firstFocusableEl = focusableElements[0]
            const lastFocusableEl = focusableElements[focusableElements.length - 1]

            // Wait for the case the element was not yet rendered
            setTimeout(() => firstFocusableEl.focus(), 50)

            /**
             * Get all focusable elements inside `element`
             * @param {HTMLElement} element - DOM element to focus trap inside
             * @return {HTMLElement[]} List of focusable elements
             */
            function getFocusableElements(element = document) {
                return [
                    ...element.querySelectorAll(
                        'a, button, details, input, select, textarea, [tabindex]:not([tabindex="-1"])'
                    ),
                ].filter((e) => !e.hasAttribute('disabled'))
            }

            function handleKeyDown(e) {
                const TAB = 9
                const isTab = e.key.toLowerCase() === 'tab' || e.keyCode === TAB

                if (!isTab) return

                if (e.shiftKey) {
                    if (document.activeElement === firstFocusableEl) {
                        lastFocusableEl.focus()
                        e.preventDefault()
                    }
                } else {
                    if (document.activeElement === lastFocusableEl) {
                        firstFocusableEl.focus()
                        e.preventDefault()
                    }
                }
            }

            element.addEventListener('keydown', handleKeyDown)

            return function cleanup() {
                element.removeEventListener('keydown', handleKeyDown)
            }
        }
    </script>
</body>

</html>

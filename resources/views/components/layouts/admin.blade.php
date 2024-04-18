<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin Panel' }}</title>
    <!-- Stylesheet -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <!-- Page Container -->
    <div x-data="{ userDropdownOpen: false, mobileNavOpen: false }" id="page-container"
        class="mx-auto flex min-h-dvh w-full min-w-[320px] flex-col bg-gray-100 dark:bg-gray-900 dark:text-gray-100">

        <!-- Page Content -->

        @include('components.sidebar')
        <main id="page-content" class="sm:ml-64">
            @include('components.header')
            <!-- Page Section -->
            <div class="container mx-auto p-4 lg:p-8 xl:max-w-7xl">
                @include('components.success-alert')
                <div class=" bg-gray-50 text-gray-400 p-4 dark:border-gray-700 dark:bg-gray-800">
                    {{ $slot }}
                </div>
            </div>
            <!-- END Page Section -->
        </main>
        <!-- END Page Content -->

    </div>
    <!-- END Page Container -->

</body>

</html>

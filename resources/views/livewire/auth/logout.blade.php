<div class="space-y-1 p-2.5">
    <form wire:submit='logout'>
        <button type="submit" role="menuitem"
            class="group flex w-full items-center justify-between gap-2 rounded-lg border border-transparent px-2.5 py-2 text-left text-sm font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-800 active:border-blue-100 dark:text-gray-200 dark:hover:bg-gray-700/75 dark:hover:text-white dark:active:border-gray-600">
            <svg class="hi-mini hi-lock-closed inline-block size-5 flex-none opacity-25 group-hover:opacity-50"
                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z"
                    clip-rule="evenodd" />
            </svg>
            <span class="grow">Sign out</span>
        </button>
    </form>
</div>

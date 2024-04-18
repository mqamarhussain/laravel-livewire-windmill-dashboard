@props(['name'])

<input type="text" name="{{ $name }}" {{ $attributes }}
    {{ $attributes->merge(['class' => 'block w-full rounded-lg border border-gray-200 px-5 py-3 leading-6 placeholder-gray-500 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 dark:border-gray-600 dark:bg-gray-800 dark:placeholder-gray-400 dark:focus:border-blue-500']) }}>

@props(['as' => 'submit'])

@if($as === 'a')
    <a {{ $attributes->merge(['class' => 'inline-flex items-center px-4 py-2 bg-blue-600 dark:bg-blue-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-blue-600 uppercase tracking-widest hover:bg-blue-700 dark:hover:bg-white focus:bg-blue-700 dark:focus:bg-white active:bg-blue-900 dark:active:bg-blue-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-blue-600 transition ease-in-out duration-150']) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-blue-600 dark:bg-blue-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-blue-600 uppercase tracking-widest hover:bg-blue-700 dark:hover:bg-white focus:bg-blue-700 dark:focus:bg-white active:bg-blue-900 dark:active:bg-blue-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-blue-600 transition ease-in-out duration-150']) }}>
        {{ $slot }}
    </button>
@endif
@props(['href'])

<p>
    <a class="inline-flex gap-x-2 text-gray-400 hover:text-gray-200 focus:outline-none focus:text-gray-200 dark:text-neutral-400 dark:hover:text-neutral-200 dark:focus:text-neutral-200"
        href="{{ $href }}">
        {{ $slot }}
    </a>
</p> 
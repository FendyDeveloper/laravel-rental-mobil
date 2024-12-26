@props(['color' => 'blue'])

<span class="inline-flex w-full align-center items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-{{ $color }}-100 text-{{ $color }}-800 dark:bg-{{ $color }}-800/30 dark:text-{{ $color }}-500">
    {{ $slot }}
</span>
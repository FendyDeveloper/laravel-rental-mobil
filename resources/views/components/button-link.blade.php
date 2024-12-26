@props(['href'])

<a href="{{ $href }}" class="block w-full">
    <x-button {{ $attributes }}>
        {{ $slot }}
    </x-button>
</a> 
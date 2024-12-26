@props(['href'])

<a href="{{ $href }}" {{ $attributes->merge(['class' => 'text-gray-600 hover:text-blue-600 px-3 py-2 rounded-md']) }}>
    {{ $slot }}
</a>

@props([
    'variant' => 'primary',
    'type' => 'button'
])

@php
    $baseClasses = 'font-medium rounded-lg text-sm px-4 py-2 text-center focus:ring-4 transition-colors';
    
    $variants = [
        'primary' => 'text-white bg-blue-600 hover:bg-blue-700 focus:ring-blue-300',
        'outline' => 'text-blue-700 bg-transparent border border-blue-700 hover:bg-blue-50 focus:ring-blue-300',
        'outline-red' => 'text-red-700 bg-transparent border border-red-700 hover:bg-red-50 focus:ring-red-300'
    ];
@endphp

<button type="{{ $type }}" {{ $attributes->merge(['class' => $baseClasses . ' ' . $variants[$variant]]) }}>
    {{ $slot }}
</button> 
@props([
    'id',
    'active' => false,
    'count' => 0,
    'value' => ''
])

<button 
    type="button" 
    {{ $attributes->merge(['class' => "py-4 px-1 mb-3 inline-flex items-center gap-x-2 border-b-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-blue-500 hs-tab-active:font-semibold hs-tab-active:border-blue-600 hs-tab-active:text-blue-600 " . ($active ? 'active' : '')]) }}
    id="tabs-with-badges-item-{{ $id }}" 
    data-hs-tab="#tabs-with-badges-{{ $id }}" 
    role="tab"
    aria-controls="tabs-with-badges-{{ $id }}" 
    aria-selected="{{ $active ? 'true' : 'false' }}"
>
    {{ $value }} 
    <span class="hs-tab-active:bg-blue-100 hs-tab-active:text-blue-600 dark:hs-tab-active:bg-blue-800 dark:hs-tab-active:text-white ms-1 py-0.5 px-1.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-neutral-700 dark:text-neutral-300">
        {{ $count }}
    </span>
</button>
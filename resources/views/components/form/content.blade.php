@props([
    'as' => 'text', 
    'label' => '', 
    'name' => '', 
    'value' => '', 
    'required' => '', 
    'options' => [],
    'selected' => ''
])

<div class="mb-4">
    <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
    @if ($as === 'select')
        <select name="{{ $name }}" id="{{ $name }}"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" {{ $required }}>
            @foreach($options as $value => $text)
                <option value="{{ $value }}" {{ $selected === $value ? 'selected' : '' }}>{{ $text }}</option>
            @endforeach
        </select>
    @elseif ($as === 'textarea')
        <textarea name="{{ $name }}" id="{{ $name }}"
        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ $value}}</textarea>     
    @else
        <input type="{{ $as }}" name="{{ $name }}" id="{{ $name }}" value="{{ $value }}" {{ $required }}
        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
    @endif
    @error($name)
    <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
</div>

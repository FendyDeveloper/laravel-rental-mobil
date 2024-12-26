@props([
    'action' => ''
])

<form action="{{ $action }}" method="POST">
    @csrf
    @method('DELETE')
    <x-danger-button type="submit">
        Delete
    </x-danger-button>
</form>
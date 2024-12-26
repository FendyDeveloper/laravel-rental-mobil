@props([
    'id',
    'users',
    'transactions',
    'from',
])

<div {{ $attributes->merge(['class' => '' ])}} id="tabs-with-badges-{{ $id }}"   role="tabpanel" aria-labelledby="tabs-with-badges-item-{{ $id }}">
    @if ($from === 'users')
        @include('dashboard.users.partials.users-table', ['users' => $users])
    @elseif ($from === 'transactions')
        @include('dashboard.transactions.partials.transaction-table', ['transactions' => $transactions])
    @endif
</div>

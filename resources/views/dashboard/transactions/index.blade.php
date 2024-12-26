<x-app-layout>
    <div class="flex justify-between">
        <x-table.title>Transactions</x-table.title>
        @if (Auth::user()->role != 'user')
        <x-primary-button as="a" href="{{ route('transactions.exportPdf') }}">
            Export PDF
        </x-primary-button>
        @endif
    </div>
    <x-tabs.index>
        <x-tabs.tab-button id="1" :active="true" :count="$bookingTransactions->count()" value="Booking"/>
        <x-tabs.tab-button id="2" :active="false" :count="$approvedTransactions->count()" value="Approve"/>
        <x-tabs.tab-button id="3" :active="false" :count="$pickupTransactions->count()" value="Pickup"/>
        <x-tabs.tab-button id="4" :active="false" :count="$returnedTransactions->count()" value="Retruned"/>    
    </x-tabs.index>

    <x-tabs.show-tab id="1" from="transactions" :transactions="$bookingTransactions" />
    <x-tabs.show-tab id="2" from="transactions" class="hidden" :transactions="$approvedTransactions" />
    <x-tabs.show-tab id="3" from="transactions" class="hidden" :transactions="$pickupTransactions" />
    <x-tabs.show-tab id="4" from="transactions" class="hidden" :transactions="$returnedTransactions" />
</x-app-layout>

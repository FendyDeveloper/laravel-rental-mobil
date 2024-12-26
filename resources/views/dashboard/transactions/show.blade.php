<x-app-layout>
    <div class="flex justify-between">
        <h2 class="text-lg pt-2 font-semibold text-gray-800 dark:text-neutral-200">User Transactions</h2>
        {{-- <a href="{{ route('transactions.create') }}">
            <x-primary-button>Add Transaction</x-primary-button>
        </a> --}}
    </div>
    <div class="-m-1.5 overflow-x-auto">
        <div class="p-1.5 min-w-full inline-block align-middle">
            <div class="border rounded-lg shadow overflow-hidden dark:border-neutral-700 dark:shadow-gray-900">
                <x-table.table>
                    <x-table.thead>
                        <tr>
                            <x-table.th>ID</x-table.th>
                            <x-table.th>NIK</x-table.th>
                            <x-table.th>License Plate</x-table.th>
                            <x-table.th>Booking Date</x-table.th>
                            <x-table.th>Pickup Date</x-table.th>
                            <x-table.th>Return Date</x-table.th>
                            <x-table.th>Driver</x-table.th>
                            <x-table.th>Total</x-table.th>
                            <x-table.th>Downpayment</x-table.th>
                            <x-table.th>Balance Due</x-table.th>
                            <x-table.th>Status</x-table.th>
                            <x-table.th>Action</x-table.th>
                        </tr>
                    </x-table.thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                        @foreach ($transactions as $transaction)
                            <tr>
                                <x-table.td>{{ $transaction->id_transaction }}</x-table.td>
                                <x-table.td>{{ $transaction->nik }}</x-table.td>
                                <x-table.td>{{ $transaction->license_plate }}</x-table.td>
                                <x-table.td>{{ $transaction->booking_date }}</x-table.td>
                                <x-table.td>{{ $transaction->pickup_date }}</x-table.td>
                                <x-table.td>{{ $transaction->return_date ?? 'N/A' }}</x-table.td> {{-- Nullable --}}
                                <x-table.td>{{ $transaction->driver ? 'Yes' : 'No' }}</x-table.td> {{-- Boolean --}}
                                <x-table.td>{{ number_format($transaction->total, 2) }}</x-table.td>
                                <x-table.td>{{ number_format($transaction->downpayment, 2) }}</x-table.td>
                                <x-table.td>{{ number_format($transaction->balance_due, 2) }}</x-table.td>
                                <x-table.td>{{ ucfirst($transaction->status) }}</x-table.td>
                            </tr>
                        @endforeach
                    </tbody>
                </x-table.table>
            </div>
        </div>
    </div>
</x-app-layout>

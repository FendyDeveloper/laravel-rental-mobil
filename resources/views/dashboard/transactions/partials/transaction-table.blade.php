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
            @if (Auth::user()->role == 'admin' || Auth::user()->role == 'petugas')
                <x-table.th>Action</x-table.th>
            @endif
        </tr>
    </x-table.thead>
    <x-table.tbody>
        @forelse ($transactions as $transaction)
            <tr>
                <x-table.td>{{ $transaction->id_transaction }}</x-table.td>
                <x-table.td>{{ $transaction->nik }}</x-table.td>
                <x-table.td>{{ $transaction->license_plate }}</x-table.td>
                <x-table.td>{{ $transaction->booking_date }}</x-table.td>
                <x-table.td>{{ $transaction->pickup_date }}</x-table.td>
                <x-table.td>{{ $transaction->return_date ?? 'N/A' }}</x-table.td>
                <x-table.td>{{ $transaction->driver ? 'Yes' : 'No' }}</x-table.td>
                <x-table.td>Rp{{ $transaction->total }}</x-table.td>
                <x-table.td>Rp{{ $transaction->downpayment }}</x-table.td>
                <x-table.td>Rp{{ $transaction->balance_due }}</x-table.td>
                <x-table.td>{{ ucfirst($transaction->status) }}</x-table.td>
                @if (Auth::user()->role == 'admin' || Auth::user()->role == 'petugas')
                    <x-table.td>
                        @include('dashboard.transactions.partials.action-buttons', [
                            'transaction' => $transaction,
                        ])
                    </x-table.td>
                @endif
            </tr>
        @empty
            <tr>
                <x-table.td colspan="12" class="text-center">No transactions found</x-table.td>
            </tr>
        @endforelse
    </x-table.tbody>
</x-table.table>

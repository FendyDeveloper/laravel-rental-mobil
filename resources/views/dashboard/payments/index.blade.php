<x-app-layout>
    <div class="flex flex-col">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="flex justify-between">
                    <h2 class="text-lg pt-2 font-semibold text-gray-800 dark:text-neutral-200">Payments</h2>
                    
                </div>
                <div class="border rounded-lg shadow overflow-hidden dark:border-neutral-700 dark:shadow-gray-900">
                    <x-table.table>
                        <x-table.thead>
                            <tr>
                                <x-table.th>NO.</x-table.th>
                                <x-table.th>Transaction ID</x-table.th>
                                <x-table.th>Return Date</x-table.th>
                                <x-table.th>Car Condition</x-table.th>
                                <x-table.th>Fine</x-table.th>
                                <x-table.th>Total Payment</x-table.th>
                                <x-table.th>Payment Status</x-table.th>
                                {{-- <x-table.th>Action</x-table.th> --}}
                            </tr>
                        </x-table.thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                            @foreach($payments as $payment)
                                <tr>
                                    {{-- <x-table.td>{{ $payment->return->transaction->id_transaction }}</x-table.td> --}}
                                    {{-- <x-table.td>{{ $payment->id_payment }}</x-table.td> --}}
                                    <x-table.td>{{ $loop->iteration }}</x-table.td>
                                    <x-table.td>{{ $payment->return->id_transaction }}</x-table.td>
                                    <x-table.td>{{ $payment->return->return_date ?? 'No return date' }}</x-table.td>
                                    <x-table.td>{{ $payment->return->car_condition ?? 'No condition' }}</x-table.td>
                                    <x-table.td>{{ $payment->return->fine }}</x-table.td>
                                    <x-table.td>{{ $payment->total_payment }}</x-table.td>
                                    {{-- <x-table.td>{{ ucfirst($payment->status) }}</x-table.td> --}}
                                    <x-table.td>
                                        @if ($payment->status == 'unpaid')
                                            <a href="/payments/create/{{ $payment->id_return }}" class="text-blue-600 hover:underline">Bayar</a>
                                        @elseif ($payment->status == 'paid')
                                        <div>
                                            <span class="py-1 px-2 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full dark:bg-teal-500/10 dark:text-teal-500">
                                              <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path>
                                                <path d="m9 12 2 2 4-4"></path>
                                              </svg>
                                              Lunas
                                            </span>
                                          </div> 
                                        @endif
                                    </x-table.td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </x-table.table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

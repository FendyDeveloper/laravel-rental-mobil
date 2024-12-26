<x-app-layout>
    <div class="flex flex-col gap-6">
        <!-- Payment Details Card -->
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
            <h2 class="text-xl font-bold text-gray-800 dark:text-white mb-4">Payment Details</h2>
            
            <div class="grid md:grid-cols-2 gap-6">
                <!-- Customer Details -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-3">Customer Information</h3>
                    <div class="space-y-2">
                        <p class="text-gray-600 dark:text-gray-400">
                            <span class="font-medium">Name:</span> 
                            {{ $transaction->user->name }}
                        </p>
                        <p class="text-gray-600 dark:text-gray-400">
                            <span class="font-medium">Email:</span>
                            {{ $transaction->user->email }}
                        </p>
                        <p class="text-gray-600 dark:text-gray-400">
                            <span class="font-medium">NIK:</span>
                            {{ $transaction->user->nik }}
                        </p>
                    </div>
                </div>

                <!-- Order Details -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-3">Rental Information</h3>
                    <div class="space-y-2">
                        <p class="text-gray-600 dark:text-gray-400">
                            <span class="font-medium">Car:</span>
                            {{ $transaction->license_plate }}
                        </p>
                        <p class="text-gray-600 dark:text-gray-400">
                            <span class="font-medium">Rental Period:</span>
                            {{ $transaction->pickup_date }} to {{ $transaction->return_date }}
                        </p>
                        <p class="text-gray-600 dark:text-gray-400">
                            <span class="font-medium">Duration:</span>
                            <span id="duration"></span> days
                        </p>
                        <p class="text-gray-600 dark:text-gray-400">
                            <span class="font-medium">Duration:</span>
                            <span id="duration"></span> days
                        </p>
                        
                        <script>
                            // Mengambil tanggal pickup_date dan return_date dari server-side (Laravel)
                            var pickupDate = "{{ $transaction->pickup_date }}";  // Format: YYYY-MM-DD
                            var returnDate = "{{ $transaction->return_date }}";  // Format: YYYY-MM-DD
                        
                            // Fungsi untuk menghitung selisih hari antara dua tanggal
                            function calculateDuration(pickup, returnDate) {
                                var pickupDateObj = new Date(pickup);
                                var returnDateObj = new Date(returnDate);
                        
                                // Menghitung perbedaan waktu dalam milidetik
                                var timeDifference = returnDateObj - pickupDateObj;
                        
                                // Menghitung jumlah hari (milidetik per hari: 1000 * 60 * 60 * 24)
                                var dayDifference = timeDifference / (1000 * 60 * 60 * 24);
                        
                                return dayDifference;
                            }
                        
                            // Menghitung durasi dan menampilkan hasilnya
                            var duration = calculateDuration(pickupDate, returnDate);
                            document.getElementById('duration').innerText = duration;
                        </script>
                        
                        
                    </div>
                </div>
            </div>

            <!-- Payment Breakdown -->
            <div class="mt-6">
                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-3">Payment Breakdown</h3>
                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <span class="text-gray-600 dark:text-gray-400">Rental Cost</span>
                            <span class="font-medium">Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600 dark:text-gray-400">Late Return Fine</span>
                            <span class="font-medium text-red-500">Rp {{ number_format($return->fine ?? 0, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600 dark:text-gray-400">Amount Paid</span>
                            <span class="font-medium text-green-500">Rp {{ number_format($transaction->total_price - $transaction->balance_due, 0, ',', '.') }}</span>
                        </div>
                        <div class="border-t border-gray-200 dark:border-gray-600 my-2"></div>
                        <div class="flex justify-between">
                            <span class="font-semibold text-gray-700 dark:text-gray-200">Remaining Balance</span>
                            <span class="font-bold text-lg" id="balance_due">Rp {{ number_format($transaction->balance_due, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Payment Form Card -->
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
            <h2 class="text-xl font-bold text-gray-800 dark:text-white mb-4">Make Payment</h2>

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('payments.store') }}" class="space-y-6">
                @csrf
                <input type="hidden" value="{{ $return->id_return }}" name="id_return">

                <div>
                    <label for="payment_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Payment Date</label>
                    <input type="date" value="{{ now()->format('Y-m-d') }}" name="payment_date" id="payment_date" required 
                        class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-blue-500 focus:ring-blue-500" />
                </div>
                
                <div>
                    <label for="total_payment" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Payment Amount</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500">Rp</span>
                        <input type="number" value="{{ $transaction->balance_due }}" name="total_payment" id="total_payment" required 
                            class="w-full pl-10 rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-blue-500 focus:ring-blue-500" 
                            step="0.01" min="0" />
                    </div>
                </div>

                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Payment Status</label>
                    <select name="status" id="status" required 
                        class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        <option value="paid">Paid</option>
                        <option value="unpaid">Unpaid</option>
                    </select>
                </div>

                <div class="bg-blue-50 dark:bg-blue-900/30 rounded-lg p-4">
                    <p class="text-sm text-blue-700 dark:text-blue-300">
                        <span class="font-medium">Note:</span> Payment status will automatically be set to "Paid" if the full amount is paid.
                    </p>
                </div>

                <div>
                    <x-primary-button type="submit" class="w-full justify-center">
                        Process Payment
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const balanceDue = {{ $transaction->balance_due }};
        const fine = {{ $return->fine ?? 0 }};
        const totalPaymentInput = document.getElementById('total_payment');
        const statusSelect = document.getElementById('status');

        function updatePaymentStatus() {
            const totalPayment = parseFloat(totalPaymentInput.value) || 0;
            const remainingBalance = balanceDue + fine - totalPayment;
            
            // Automatically set status based on payment amount
            if (remainingBalance <= 0) {
                statusSelect.value = 'paid';
                statusSelect.disabled = true;
            } else {
                statusSelect.value = 'unpaid';
                statusSelect.disabled = false;
            }
        }

        totalPaymentInput.addEventListener('input', updatePaymentStatus);
        updatePaymentStatus(); // Run on initial load
    </script>
</x-app-layout>

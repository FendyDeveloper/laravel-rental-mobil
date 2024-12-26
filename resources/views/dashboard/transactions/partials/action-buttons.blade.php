
        @if ($transaction->status == 'booking')
            <form action="{{ route('transactions.update', $transaction->id_transaction) }}" method="POST"
                style="display:inline">
                @csrf
                @method('PUT')
                <input type="hidden" name="status" value="approved">
                <button type="submit"
                    class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-none focus:text-blue-800 dark:text-blue-500 dark:hover:text-blue-400 dark:focus:text-blue-400">
                    Approve
                </button>
            </form>
            <form action="{{ route('transactions.update', $transaction->id_transaction) }}" method="POST"
                style="display:inline">
                @csrf
                @method('PUT')
                <input type="hidden" name="status" value="returned">
                <button type="submit"
                    class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-red-600 hover:text-red-800 focus:outline-none focus:text-red-800 dark:text-red-500 dark:hover:text-red-400 dark:focus:text-red-400">
                    Reject
                </button>
            </form>
            
        @elseif ($transaction->status == 'approved')
            <form action="{{ route('transactions.update', $transaction->id_transaction) }}" method="POST"
                style="display:inline">
                @csrf
                @method('PUT')
                <input type="hidden" name="status" value="picked_up">
                <button type="submit"
                    class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-none focus:text-blue-800 dark:text-blue-500 dark:hover:text-blue-400 dark:focus:text-blue-400">
                    Pickup
                </button>
            </form>
        @elseif ($transaction->status == 'picked_up')

            <button type="button"
            class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-2 py-1 text-center me-2 mb-2"
                aria-haspopup="dialog" aria-expanded="false"
                data-hs-overlay="#update-modal-{{ $transaction->id_transaction }}">
                Return
            </button>

            <div id="update-modal-{{ $transaction->id_transaction }}"
                class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none"
                role="dialog" tabindex="-1" aria-labelledby="update-modal-{{ $transaction->id_transaction }}-label">
                <div
                    class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
                    <div
                        class="w-full flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
                        <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
                            <h3 id="update-modal-{{ $transaction->id_transaction }}-label"
                                class="font-bold text-gray-800 dark:text-white">
                                Update Return Information
                            </h3>
                            <button type="button"
                                class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600"
                                aria-label="Close" data-hs-overlay="#update-modal-{{ $transaction->id_transaction }}">
                                <span class="sr-only">Close</span>
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M18 6 6 18"></path>
                                    <path d="m6 6 12 12"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="p-4 overflow-y-auto">
                            <form action="{{ route('returns.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id_transaction" value="{{ $transaction->id_transaction }}">
                                <div class="mb-4">
                                    <label for="initial_return_date"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Initial
                                        Return Date</label>
                                    <input type="date" value="{{ $transaction->return_date }}"
                                        name="initial_return_date" id="initial_return_date"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                        required>
                                </div>

                                <div class="mb-4">
                                    <label for="new_return_date"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">New Return
                                        Date</label>
                                    <input type="date" value="{{ now()->format('Y-m-d') }}" name="new_return_date"
                                        id="new_return_date"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                        required>
                                </div>

                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Total Days
                                        Between</label>
                                    <p id="total_days" class="mt-1 text-lg font-semibold">0 days</p>
                                    <input type="hidden" name="license_plate"
                                        value="{{ $transaction->license_plate }}">
                                    <input type="hidden" name="days_difference" id="days_difference" value="0">
                                </div>
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        const initialReturnDateInput = document.getElementById('initial_return_date');
                                        const newReturnDateInput = document.getElementById('new_return_date');
                                        const totalDaysOutput = document.getElementById('total_days');
                                        const daysDifferenceInput = document.getElementById('days_difference');

                                        function calculateDaysDifference() {
                                            const initialDate = new Date(initialReturnDateInput.value);
                                            const newDate = new Date(newReturnDateInput.value);

                                            if (initialDate && newDate) {
                                                const timeDifference = newDate - initialDate; // Difference in milliseconds
                                                const daysDifference = Math.ceil(timeDifference / (1000 * 3600 * 24)); // Convert to days
                                                totalDaysOutput.textContent = daysDifference >= 0 ? daysDifference + ' days' : '0 days';
                                                daysDifferenceInput.value = daysDifference >= 0 ? daysDifference : 0; // Update hidden input
                                            } else {
                                                totalDaysOutput.textContent = '0 days';
                                                daysDifferenceInput.value = 0;
                                            }
                                        }

                                        initialReturnDateInput.addEventListener('change', calculateDaysDifference);
                                        newReturnDateInput.addEventListener('change', calculateDaysDifference);
                                    });
                                </script>


                                <div class="mb-4">
                                    <label for="car_condition"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Car
                                        Condition</label>
                                    <textarea name="car_condition" id="car_condition"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                        rows="3" placeholder="Describe the car's condition"></textarea>
                                </div>
                                <div class="mb-4">
                                    <label for="fine"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Fine
                                        Amount</label>
                                    <input type="number" name="fine" id="fine"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                        step="0.01" min="0" placeholder="Enter fine amount"
                                        value="0">
                                </div>
                        </div>
                        <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
                            <button type="button"
                                class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                                data-hs-overlay="#update-modal-{{ $transaction->id_transaction }}">
                                Close
                            </button>
                            <button type="submit"
                                class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                Save changes
                            </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @elseif ($transaction->status == 'returned')
                <a href="/payments/create/{{ $transaction->id_transaction }}" class="text-blue-600 hover:underline">Bayar</>
        @endif
  

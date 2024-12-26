<x-app-layout>
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Car Details Card -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-bold mb-4">Car Details</h2>

                <!-- Car Image -->
                <div class="mb-4">
                    @if ($car->image)
                        <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->brand }}"
                            class="w-full h-64 object-cover rounded-lg">
                    @else
                        <div class="w-full h-64 bg-gray-200 rounded-lg flex items-center justify-center">
                            <span class="text-gray-500">No image available</span>
                        </div>
                    @endif
                </div>

                <!-- Car Information -->
                <div class="space-y-3">
                    <div class="flex justify-between items-center">
                        <h3 class="text-xl font-semibold">{{ $car->brand }}</h3>
                        {!! $car->status == 'available' ? 
                        '<span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">'.ucfirst($car->status).'</span>' : 
                        '<span class="px-3 py-1 bg-red-100 text-red-800 rounded-full text-sm">'.ucfirst($car->status).'</span>' !!}
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-gray-600 text-sm">License Plate</p>
                            <p class="font-medium">{{ $car->license_plate }}</p>
                        </div>
                        <div>
                            <p class="text-gray-600 text-sm">Type</p>
                            <p class="font-medium">{{ $car->type }}</p>
                        </div>
                        <div>
                            <p class="text-gray-600 text-sm">Year</p>
                            <p class="font-medium">{{ $car->year }}</p>
                        </div>
                        <div>
                            <p class="text-gray-600 text-sm">Price per Day</p>
                            <p class="font-medium">Rp <span
                                    id="price">{{ number_format($car->price, 0, ',', '.') }}</span></p>
                        </div>
                    </div>
                    <div class="items-center">
                        <h3 class="text-xl font-semibold">Description</h3>
                        <span class=" text-blue-800 rounded-full text-sm">
                            Rent a 2017 Mercedes-Benz GLS in Chisinau - Luxury and Elegance at Your Service. Generous
                            Space for 7 Passengers: With 7 comfortable seats, this SUV is suitable for group travel or
                            families, providing enough space for all passengers. Equipped with the latest safety
                            technologies, this Mercedes-Benz gives you the peace of mind that you are protected during
                            your journeys.

                            Deposit of car is negotiated individually, the rental price is not fixed, the system of
                            discounts is also applied with each client.</span>
                    </div>
                </div>
            </div>

            <!-- Booking Form Card -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-bold mb-4">Booking Form</h2>
                <form method="POST" action="{{ route('orders.store') }}" class="space-y-4" onsubmit="return confirmBooking()">
                    @csrf
                    <input type="hidden" name="license_plate" value="{{ $car->license_plate }}">
                    <input type="hidden" name="status" value="booking">
                    <input type="hidden" name="total" id="total_input">
                    <input type="hidden" name="balance_due" id="balance_due_input">


                    <!-- Customer Information -->
                    <div class="bg-gray-50 p-4 rounded-lg mb-4">
                        <h3 class="text-lg font-semibold mb-2">Customer Information</h3>
                        <div class="mb-4">
                            <label for="nik" class="block text-sm font-medium text-gray-700">NIK</label>
                            <input type="text" value="{{ Auth::user()->nik }}" readonly required name="nik"
                                id="nik"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-gray-100" />
                            @error('nik')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Dates Section -->
                    <div class="bg-gray-50 p-4 rounded-lg mb-4">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                            <div>
                                <label for="booking_date" class="block text-sm font-medium text-gray-700">Booking
                                    Date</label>
                                <input type="date" value="{{ now()->format('Y-m-d') }}" name="booking_date"
                                    id="booking_date" required
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" />
                                @error('booking_date')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="driver" class="block text-sm font-medium text-gray-700">Driver</label>
                                <select name="driver" id="driver" required
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option value="1">Yes</option>
                                    <option value="0" selected>No</option>
                                </select>
                                @error('driver')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="pickup_date" class="block text-sm font-medium text-gray-700">Pickup
                                    Date</label>
                                <input type="date" name="pickup_date" id="pickup_date" required
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" />
                                @error('pickup_date')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="return_date" class="block text-sm font-medium text-gray-700">Return
                                    Date</label>
                                <input type="date" name="return_date" id="return_date" required
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" />
                                @error('return_date')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Payment Section -->
                    <div class="w-full max-w-2xl mx-auto bg-white rounded-lg shadow">
                        <!-- Header -->
                        <div class="p-4 border-b">
                            <h3 class="text-lg font-semibold">Payment Details</h3>
                        </div>

                        <!-- Content -->
                        <div class="p-4 space-y-6">
                            <!-- Read-only information table -->
                            <div class="bg-gray-50 rounded-md p-4">
                                <table class="w-full text-sm">
                                    <tbody>
                                        <tr>
                                            <td class="text-gray-600 py-1">Car Price/Day</td>
                                            <td class="text-right font-medium">Rp
                                                {{ number_format($car->price, 0, ',', '.') }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-gray-600 py-1">Number of Days</td>
                                            <td class="text-right font-medium">
                                                <span id="rental_days">-</span> days
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-gray-600 py-1">Driver Cost per Day</td>
                                            <td class="text-right font-medium">Rp 100.000</td>
                                        </tr>
                                        <tr>
                                            <td class="text-gray-600 py-1">Total Driver Cost</td>
                                            <td class="text-right font-medium">
                                                <span id="driver_total">Rp 0</span>
                                            </td>
                                        </tr>
                                        <tr class="border-t">
                                            <td class="text-gray-600 py-2 font-medium">Total Amount</td>
                                            <td class="text-right font-medium">
                                                <span id="total">Rp 0</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Hidden inputs for calculations -->
                            <input type="hidden" id="price" value="{{ $car->price }}">
                            <input type="hidden" id="driver_cost" value="100000">

                            <!-- Interactive payment inputs -->
                            <div class="space-y-4">
                                <div>
                                    <label for="downpayment" class="block text-sm font-medium text-gray-700 mb-1">
                                        Downpayment (Minimum 30% of total amount)
                                    </label>
                                    <div class="relative rounded-md">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <span class="text-gray-500 sm:text-sm">Rp</span>
                                        </div>
                                        <input type="number" name="downpayment" id="downpayment" placeholder="-"
                                            required
                                            class="pl-12 block w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 disabled:bg-gray-100"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                        <!-- Filter input hanya angka -->
                                        <div class="text-sm text-red-600 mt-1" id="downpayment-error"></div>
                                    </div>
                                    <div class="grid grid-cols-4 gap-1 mt-2">
                                        <x-primary-button type="button" id="downpayment-option-30"
                                            class="w-full bg-blue-600/50 justify-center">30%</x-primary-button>
                                        <x-primary-button type="button" id="downpayment-option-50"
                                            class="w-full bg-blue-600/50 justify-center">50%</x-primary-button>
                                        <x-primary-button type="button" id="downpayment-option-80"
                                            class="w-full bg-blue-600/50 justify-center">80%</x-primary-button>
                                        <x-primary-button type="button" id="downpayment-option-100"
                                            class="w-full bg-blue-600/50 justify-center">100%</x-primary-button>
                                    </div>
                                </div>


                                <div class="bg-blue-50 p-4 rounded-md">
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-700 font-medium">Downpayment:</span>
                                        <span class="text-lg font-semibold text-blue-600" id="d-downpayment">Rp
                                            0</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-700 font-medium">Balance Due:</span>
                                        <span class="text-lg font-semibold text-blue-600" id="balance_due">Rp 0</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-700 font-medium">Return:</span>
                                        <span class="text-lg font-semibold text-blue-600" id="d-return">Rp 0</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Footer -->
                        @if ($car->status === 'available')
                            <div class="p-4 bg-gray-50 rounded-b-lg">
                                <x-primary-button type="submit" class="w-full justify-center">
                                    Confirm Booking
                                </x-primary-button>
                            </div>
                        @else
                            <div class="p-4 bg-gray-50 rounded-b-lg">
                                <x-primary-button type="button" class="w-full bg-red-500 hover:bg-red-700 justify-center" disabled>
                                    Not Avaliable
                                </x-primary-button>
                            </div>
                        @endif
                    </div>
                </div>
            </form>
        </div>
</x-app-layout>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get all required elements
        const pickupDateInput = document.getElementById('pickup_date');
        const returnDateInput = document.getElementById('return_date');
        const bookingDateInput = document.getElementById('booking_date');
        const rentalDaysSpan = document.getElementById('rental_days');
        const driverSelect = document.getElementById('driver');
        const driverTotalSpan = document.getElementById('driver_total');
        const totalSpan = document.getElementById('total');
        const totalInput = document.getElementById('total_input');
        const balanceDueInput = document.getElementById('balance_due_input');
        const downpaymentInput = document.getElementById('downpayment');
        const balanceDueSpan = document.getElementById('balance_due');
        const carPrice = parseFloat(document.getElementById('price').textContent.replace(/[^\d]/g, ''));
        const driverCost = 100000; // Driver cost per day in Rupiah
        const downpaymentOption30 = document.getElementById('downpayment-option-30');
        const downpaymentOption50 = document.getElementById('downpayment-option-50');
        const downpaymentOption80 = document.getElementById('downpayment-option-80');
        const downpaymentOption100 = document.getElementById('downpayment-option-100');
        const dDownpayment = document.getElementById('d-downpayment');
        const dReturn = document.getElementById('d-return');

        const today = new Date()
        bookingDateInput.min = today.toISOString().split('T')[0];
        pickupDateInput.min = today.toISOString().split('T')[0];

        // pickupDateInput.disabled = true;
        bookingDateInput.addEventListener('input', (event) => {
            let selectedDate = event.target.value;
            pickupDateInput.disabled = false;
            let pickupAfterBooking = new Date(selectedDate);
            pickupAfterBooking.setDate(pickupAfterBooking.getDate() + 1);
            pickupDateInput.min = pickupAfterBooking.toISOString().split('T')[0];
        })

        returnDateInput.disabled = true;
        pickupDateInput.addEventListener('input', (event) => {
            let selectedDate = event.target.value;
            returnDateInput.disabled = false;
            let tomorrow = new Date(selectedDate);
            tomorrow.setDate(tomorrow.getDate() + 1);
            returnDateInput.min = tomorrow.toISOString().split('T')[0];
        })


        function formatCurrency(amount) {
            return 'Rp ' + new Intl.NumberFormat('id-ID').format(Math.max(0, amount));
        }

        function parseCurrency(currencyString) {
            return parseInt(currencyString.replace(/[^\d]/g, '')) || 0;
        }

        function calculateRentalDays() {
            const pickupDate = new Date(pickupDateInput.value);
            const returnDate = new Date(returnDateInput.value);

            if (pickupDate && returnDate && returnDate >= pickupDate) {
                const diffTime = returnDate.getTime() - pickupDate.getTime();
                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                return Math.max(1, diffDays);
            }
            return 0;
        }

        //Mengunci input sebelum memilih tanggal
        downpaymentInput.disabled = true;

        function calculateTotal() {
            const rentalDays = calculateRentalDays();

            if (rentalDays > 0) {
                rentalDaysSpan.textContent = rentalDays;

                // Calculate car rental cost
                const rentalCost = rentalDays * carPrice;

                // Calculate driver cost if selected
                const driverTotal = driverSelect.value === '1' ? rentalDays * driverCost : 0;
                driverTotalSpan.textContent = formatCurrency(driverTotal);

                // Calculate total amount
                const totalAmount = rentalCost + driverTotal;
                totalSpan.textContent = formatCurrency(totalAmount);
                totalInput.value = totalAmount; // Set the hidden input value


                // Enable downpayment input
                downpaymentInput.disabled = false;
                downpaymentInput.max = totalAmount;


                // Set minimum downpayment (30% of total)
                const minDownpayment = Math.ceil(totalAmount * 0.3);
                downpaymentInput.min = minDownpayment;
                downpaymentInput.value = minDownpayment; // Set actual minimum downpayment value


                downpaymentInput.placeholder = 'Minimum - Rp' +
                    minDownpayment; // Set actual minimum downpayment value

                //Menampilkan jumlah pembayaran berdasarkan %
                downpaymentOption30.addEventListener('click', () => {
                    downpaymentInput.value = Math.ceil(totalAmount * 0.3);
                    calculateBalanceDue();
                })
                downpaymentOption50.addEventListener('click', () => {
                    downpaymentInput.value = Math.ceil(totalAmount * 0.5);
                    calculateBalanceDue();
                })
                downpaymentOption80.addEventListener('click', () => {
                    downpaymentInput.value = Math.ceil(totalAmount * 0.8);
                    calculateBalanceDue();
                })
                downpaymentOption100.addEventListener('click', () => {
                    downpaymentInput.value = Math.ceil(totalAmount);
                    calculateBalanceDue();
                })

                calculateBalanceDue();
            } else {
                resetCalculations();
            }
        }


        function calculateBalanceDue() {
            const totalAmount = parseCurrency(totalSpan.textContent);
            const downpaymentAmount = parseFloat(downpaymentInput.value) || 0;

            if (!isNaN(totalAmount)) {
                // Validate downpayment
                const minDownpayment = Math.ceil(totalAmount * 0.3);

                if (downpaymentAmount < minDownpayment) {
                    downpaymentInput.setCustomValidity(
                        `Minimum downpayment is ${formatCurrency(minDownpayment)}`);
                } else {
                    downpaymentInput.setCustomValidity('');
                }

                const balanceDue = totalAmount - downpaymentAmount;
                balanceDueSpan.textContent = formatCurrency(balanceDue);
                balanceDueInput.value = balanceDue;
                dDownpayment.textContent = formatCurrency(downpaymentAmount);
                if (downpaymentAmount >= totalAmount) {
                    dReturn.textContent = formatCurrency(downpaymentAmount - totalAmount);
                } else {
                    dReturn.textContent = 0;
                }


            }
        }



        function resetCalculations() {
            rentalDaysSpan.textContent = '-';
            driverTotalSpan.textContent = formatCurrency(0);
            totalSpan.textContent = formatCurrency(0);
            balanceDueSpan.textContent = formatCurrency(0);
            totalInput.value = '0';
            balanceDueInput.value = '0';
            downpaymentInput.value = '';
            downpaymentInput.disabled = true;
        }

        // Event listeners
        pickupDateInput.addEventListener('change', calculateTotal);
        returnDateInput.addEventListener('change', calculateTotal);
        driverSelect.addEventListener('change', calculateTotal);
        downpaymentInput.addEventListener('input', calculateBalanceDue);

        // Form submission validation
        document.querySelector('form').addEventListener('submit', function(e) {
            if (totalInput.value === '0' || balanceDueInput.value === '0') {
                e.preventDefault();
                alert('Please select valid dates and enter a downpayment before submitting.');
            }
        });

        function confirmBooking() {
        // Menampilkan alert
        alert('Hello');
        console.log('Yesay');

        // Menambahkan konfirmasi pengiriman form
        var isConfirmed = confirm("Apakah Anda yakin ingin mengirimkan data ini?");
        if (isConfirmed) {
            return true; // Form akan dikirim
        } else {
            return false; // Form tidak akan dikirim
        }
    }
    });
</script>

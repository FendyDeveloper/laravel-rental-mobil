<x-app-layout>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 ">
        @foreach ($cars as $car)
        <div>
            <a href="{{ route('orders.show', $car->id_car) }}">
                <div
                    class="bg-white dark:bg-gray-800 shadow-lg rounded-xl overflow-hidden transition-all duration-300 hover:shadow-xl group">
                    <div class="relative">
                        <img src="{{ $car->image ? Storage::url($car->image) : asset('default-image.jpg') }}"
                            alt="{{ $car->brand }}"
                            class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute top-4 right-4">
                            <span
                                class="
                            {{ $car->status == 'available' ? 'bg-green-500 text-white' : 'bg-red-500 text-white' }} 
                            px-3 py-1 rounded-full text-xs font-semibold uppercase tracking-wider
                        ">
                                {{ ucfirst($car->status) }}
                            </span>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                                {{ $car->brand }}
                            </h3>
                            <span class="text-gray-500 text-sm">{{ $car->license_plate }}</span>
                        </div>

                        <div class="space-y-2 mb-4">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600 dark:text-gray-300">Type</span>
                                <span class="font-medium text-gray-900 dark:text-white">{{ $car->type }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600 dark:text-gray-300">Year</span>
                                <span class="font-medium text-gray-900 dark:text-white">{{ $car->year }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600 dark:text-gray-300">Price</span>
                                <span class="font-bold text-primary-600">Rp{{ number_format($car->price, 2) }}</span>
                            </div>
                        </div>

                        @if (Auth::user()->role == 'user')
                            <div class="mt-6">
                                @if ($car->status == 'available')
                                    <x-primary-button href="{{ route('orders.show', $car->id_car) }}"
                                        class="
                                        w-full block text-center 
                                        bg-primary-600 text-white 
                                        py-3 rounded-lg 
                                        hover:bg-primary-700 
                                        transition-colors duration-300 
                                        font-semibold
                                    ">
                                        Book Now
                                    </x-primary-button>
                                @else
                                    <button disabled
                                        class="
                                        w-full 
                                        bg-gray-300 text-gray-500 
                                        py-3 rounded-lg 
                                        cursor-not-allowed
                                        font-semibold
                                    ">
                                        Not Available
                                    </button>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>

    <div class="px-6 py-4">
        {{ $cars->links() }}
    </div>
</x-app-layout>

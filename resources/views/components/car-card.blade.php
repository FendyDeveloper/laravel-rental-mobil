@props(['car'])

<div class="h-full bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 dark:bg-gray-800 flex flex-col">
    <!-- Image container dengan fixed aspect ratio -->
    <div class="relative w-full pt-[75%]"> <!-- 4:3 aspect ratio -->
        <img src="{{ $car->image ? Storage::url($car->image) : asset('default-image.jpg') }}"
            alt="{{ $car->brand }}" 
            class="absolute inset-0 w-full h-full object-cover rounded-t-lg">
    </div>
    
    <!-- Content container -->
    <div class="p-4 flex-1 flex flex-col">
        <h3 class="text-lg font-semibold text-gray-800 dark:text-white">{{ $car->brand }}</h3>
        <div class="mt-2 space-y-1 flex-1">
            <p class="text-sm text-gray-600 dark:text-gray-300">Tipe: {{ $car->type }}</p>
            <p class="text-sm text-gray-600 dark:text-gray-300">Tahun: {{ $car->year }}</p>
            <p class="text-lg font-bold text-blue-600 dark:text-blue-400 mt-2">
                Rp. {{ number_format($car->price, 0, ',', '.') }}/hari
            </p>
        </div>
        
        <!-- Button container -->
        <div class="mt-4 space-y-2">
            @if ($car->status == 'available')
                <a href="{{ route('orders.show', $car->id_car) }}" 
                   class="block w-full">
                    <button class="w-full text-white bg-gradient-to-r from-blue-500 to-blue-700 
                                 hover:bg-gradient-to-br focus:ring-4 focus:ring-blue-300 
                                 font-medium rounded-lg text-sm px-4 py-2 text-center">
                        Pesan Sekarang
                    </button>
                </a>
                <a href="{{ route('orders.show', $car->id_car) }}" 
                <button class="w-full text-blue-700 bg-transparent border border-blue-700 
                             hover:bg-blue-50 focus:ring-4 focus:ring-blue-300 
                             font-medium rounded-lg text-sm px-4 py-2 text-center">
                    Detail Mobil
                </button>
            </a>
            @else
                <button disabled type="button"
                    class="w-full text-red-700 bg-transparent border border-red-700 
                           hover:bg-red-50 focus:ring-4 focus:ring-red-300 
                           font-medium rounded-lg text-sm px-4 py-2 text-center">
                    Tidak Tersedia
                </button>
            @endif
        </div>
    </div>
</div> 
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'RentalKu') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite('resources/js/app.js')
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</head>

<body class="font-sans antialiased">
    <!-- resources/views/components/promo-banner.blade.php -->
    <div x-data="{ showBanner: true }" x-show="showBanner" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform -translate-y-2"
        x-transition:enter-end="opacity-100 transform translate-y-0"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 transform translate-y-0"
        x-transition:leave-end="opacity-0 transform -translate-y-2"
        class="relative bg-gradient-to-r from-blue-600 via-blue-500 to-blue-400">
        <div class="max-w-[85rem] px-4 py-4 sm:px-6 lg:px-8 mx-auto">
            <div class="grid justify-center md:grid-cols-2 md:justify-between md:items-center gap-2">
                <div class="text-center md:text-start">
                    <div class="flex items-center justify-center md:justify-start space-x-2">
                        <span class="animate-pulse inline-flex h-2 w-2 rounded-full bg-white"></span>
                        <p class="text-xs text-white/80 uppercase tracking-wider">Promo Spesial</p>
                    </div>
                    <p class="mt-1 text-white font-medium">
                        Dapatkan diskon <span
                            class="text-yellow-300 font-bold text-xl animate-bounce inline-block">20%</span> untuk
                        pemesanan mobil pertama Anda
                    </p>
                    <p class="text-xs text-white/70 mt-1">
                        *Syarat dan ketentuan berlaku
                    </p>
                </div>
                <div class="mt-3 text-center md:text-start md:flex md:justify-end md:items-center">
                    <div class="space-x-3">
                        <a class="group py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-full border border-white/30 bg-white/10 text-white hover:bg-white hover:text-blue-600 transition-all duration-300 backdrop-blur-sm"
                            href="{{ route('register') }}">
                            <span>Pesan Sekarang</span>
                            <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </a>
                        <button @click="showBanner = false" class="text-white/70 hover:text-white">
                            <span class="sr-only">Tutup</span>
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- resources/views/components/hero-section.blade.php -->
    <div x-data="{ activeSlide: 1 }" class="relative overflow-hidden bg-gray-900">
        <!-- Background Slider -->
        <div class="absolute inset-0 w-full h-full">
            <div x-show="activeSlide === 1" x-transition:enter="transition ease-out duration-500"
                x-transition:enter-start="opacity-0 transform scale-110"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-500"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-90" class="absolute inset-0 w-full h-full">
                <img src="https://images.unsplash.com/photo-1485291571150-772bcfc10da5?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8Y2FyJTIwYmFja2dyb3VuZHN8ZW58MHx8MHx8fDA%3D"
                    class="object-cover w-full h-full opacity-50" alt="Luxury Car">
            </div>
            <div x-show="activeSlide === 2" x-transition:enter="transition ease-out duration-500"
                x-transition:enter-start="opacity-0 transform scale-110"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-500"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-90" class="absolute inset-0 w-full h-full">
                <img src="https://img.freepik.com/free-photo/white-offroader-jeep-parking_114579-4007.jpg?ga=GA1.1.1786565508.1730186453&semt=ais_hybrid"
                    class="object-cover w-full h-full opacity-50" alt="SUV">
            </div>
            <div x-show="activeSlide === 3" x-transition:enter="transition ease-out duration-500"
                x-transition:enter-start="opacity-0 transform scale-110"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-500"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-90" class="absolute inset-0 w-full h-full">
                <img src="https://img.freepik.com/free-photo/sports-car-driving-asphalt-road-night-generative-ai_188544-8052.jpg?ga=GA1.1.1786565508.1730186453&semt=ais_hybrid"
                    class="object-cover w-full h-full opacity-50" alt="Sports Car">
            </div>
        </div>

        <!-- Content -->
        <div class="relative z-10 max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 py-24 lg:py-32">
            <div class="max-w-3xl mx-auto text-center">
                <h1 class="font-bold text-white text-4xl sm:text-5xl lg:text-6xl lg:leading-tight">
                    Rental Mobil
                    <span
                        class="bg-gradient-to-r from-blue-400 to-blue-600 bg-clip-text text-transparent">Terpercaya</span>
                </h1>
                <p class="mt-6 text-lg text-gray-300">
                    Pilihan terlengkap mobil berkualitas dengan harga terbaik untuk perjalanan Anda
                </p>
                <div class="mt-10 flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#catalog"
                        class="inline-flex items-center justify-center px-8 py-4 text-base font-medium text-white bg-gradient-to-r from-blue-500 to-blue-700 rounded-full hover:from-blue-600 hover:to-blue-800 transform hover:scale-105 transition-all duration-300">
                        Lihat Katalog
                        <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="#contact"
                        class="inline-flex items-center justify-center px-8 py-4 text-base font-medium text-blue-600 bg-white rounded-full hover:bg-gray-100 transform hover:scale-105 transition-all duration-300">
                        Hubungi Kami
                    </a>
                </div>
            </div>

            <!-- Slider Controls -->
            <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-3">
                <button @click="activeSlide = 1" :class="{ 'w-8 bg-blue-600': activeSlide === 1 }"
                    class="h-2 w-2 rounded-full bg-white/50 transition-all duration-300"></button>
                <button @click="activeSlide = 2" :class="{ 'w-8 bg-blue-600': activeSlide === 2 }"
                    class="h-2 w-2 rounded-full bg-white/50 transition-all duration-300"></button>
                <button @click="activeSlide = 3" :class="{ 'w-8 bg-blue-600': activeSlide === 3 }"
                    class="h-2 w-2 rounded-full bg-white/50 transition-all duration-300"></button>
            </div>
        </div>
    </div>


    <!-- Car List Section -->
    <div class="overflow-x-auto m-10">
        <h2 class="text-2xl font-bold text-center mb-8 text-gray-800 dark:text-neutral-200">Mobil Tersedia</h2>
        <div class="flex space-x-4">
            @foreach ($cars as $car)
                <div
                    class="card w-72 bg-white rounded-lg shadow-md p-4 flex-shrink-0 hover:shadow-xl transition-shadow duration-300">
                    <img src="{{ $car->image ? Storage::url($car->image) : asset('default-image.jpg') }}"
                        alt="{{ $car->brand }}" class="w-full h-40 object-cover rounded-md">
                    <div class="mt-4">
                        <h3 class="text-xl font-semibold">{{ $car->brand }}</h3>
                        <p class="text-gray-600">Tipe: {{ $car->type }}</p>
                        <p class="text-gray-600">Tahun: {{ $car->year }}</p>
                        <p class="text-blue-600 font-bold text-lg mt-2">Rp.
                            {{ number_format($car->price, 0, ',', '.') }}/hari</p>
                        @if ($car->status == 'available')
                            <div class="mt-4 space-y-2">
                                <a href="{{ route('orders.show', $car->id_car) }}">
                                    <button
                                        class="w-full text-white bg-gradient-to-r from-blue-500 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Pesan
                                        Sekarang</button>
                                </a>
                                <button
                                    class="w-full text-blue-700 bg-transparent border border-blue-700 hover:bg-blue-50 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Detail
                                    Mobil</button>
                            </div>
                        @else
                            <div class="mt-4 space-y-2">
                                <button disabled type="button"
                                    class="w-full text-red-700 bg-transparent border border-red-700 hover:bg-red-50 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Not
                                    Avliable</button>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Features Section -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 items-center gap-12">
            <!-- Feature 1 -->
            <div>
                <div
                    class="relative flex justify-center items-center size-12 bg-white rounded-xl before:absolute before:-inset-px before:-z-[1] before:bg-gradient-to-br before:from-blue-600 before:via-transparent before:to-blue-600 before:rounded-xl dark:bg-neutral-900">
                    <svg class="size-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </div>
                <div class="mt-5">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Mudah</h3>
                    <p class="mt-1 text-gray-600 dark:text-neutral-400">Proses pemesanan yang cepat dan mudah</p>
                </div>
            </div>

            <!-- Feature 2 -->
            <div>
                <div
                    class="relative flex justify-center items-center size-12 bg-white rounded-xl before:absolute before:-inset-px before:-z-[1] before:bg-gradient-to-br before:from-blue-600 before:via-transparent before:to-blue-600 before:rounded-xl dark:bg-neutral-900">
                    <svg class="size-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="mt-5">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Terpercaya</h3>
                    <p class="mt-1 text-gray-600 dark:text-neutral-400">Mobil terawat dan berkualitas</p>
                </div>
            </div>

            <!-- Feature 3 -->
            <div>
                <div
                    class="relative flex justify-center items-center size-12 bg-white rounded-xl before:absolute before:-inset-px before:-z-[1] before:bg-gradient-to-br before:from-blue-600 before:via-transparent before:to-blue-600 before:rounded-xl dark:bg-neutral-900">
                    <svg class="size-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="mt-5">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">24/7 Support</h3>
                    <p class="mt-1 text-gray-600 dark:text-neutral-400">Layanan pelanggan 24 jam</p>
                </div>
            </div>

            <!-- Feature 4 -->
            <div>
                <div
                    class="relative flex justify-center items-center size-12 bg-white rounded-xl before:absolute before:-inset-px before:-z-[1] before:bg-gradient-to-br before:from-blue-600 before:via-transparent before:to-blue-600 before:rounded-xl dark:bg-neutral-900">
                    <svg class="size-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <div class="mt-5">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Harga Bersaing</h3>
                    <p class="mt-1 text-gray-600 dark:text-neutral-400">Penawaran harga terbaik</p>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ Section -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
            <h2 class="text-2xl font-bold md:text-3xl md:leading-tight text-gray-800 dark:text-neutral-200">
                Pertanyaan yang Sering Diajukan
            </h2>
        </div>

        <div class="max-w-5xl mx-auto">
            <div class="grid sm:grid-cols-2 gap-6 md:gap-12">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                        Bagaimana cara memesan mobil?
                    </h3>
                    <p class="mt-2 text-gray-600 dark:text-neutral-400">
                        Anda dapat memesan mobil melalui website kami dengan memilih mobil yang diinginkan, mengisi
                        form pemesanan, dan melakukan pembayaran.
                    </p>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                        Apa saja syarat menyewa mobil?
                    </h3>
                    <p class="mt-2 text-gray-600 dark:text-neutral-400">
                        Syarat utama adalah KTP, SIM A yang masih berlaku, dan deposit sesuai ketentuan.
                    </p>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                        Apakah ada asuransi?
                    </h3>
                    <p class="mt-2 text-gray-600 dark:text-neutral-400">
                        Ya, setiap mobil kami dilengkapi dengan asuransi comprehensive untuk keamanan Anda.
                    </p>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                        Bagaimana dengan pembatalan?
                    </h3>
                    <p class="mt-2 text-gray-600 dark:text-neutral-400">
                        Pembatalan dapat dilakukan 24 jam sebelum waktu pengambilan dengan pengembalian dana 100%.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- ========== FOOTER ========== -->
    <footer class="mt-auto bg-gray-900 w-full dark:bg-neutral-950">
        <div class="mt-auto w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 lg:pt-20 mx-auto">
            <!-- Grid -->
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-6">
                <div class="col-span-full lg:col-span-1">
                    <a class="flex-none text-xl font-semibold text-white focus:outline-none focus:opacity-80"
                        href="#" aria-label="Brand">Brand</a>
                </div>
                <!-- End Col -->

                <div class="col-span-1">
                    <h4 class="font-semibold text-gray-100">Product</h4>

                    <div class="mt-3 grid space-y-3">
                        <p><a class="inline-flex gap-x-2 text-gray-400 hover:text-gray-200 focus:outline-none focus:text-gray-200 dark:text-neutral-400 dark:hover:text-neutral-200 dark:focus:text-neutral-200"
                                href="#">Pricing</a></p>
                        <p><a class="inline-flex gap-x-2 text-gray-400 hover:text-gray-200 focus:outline-none focus:text-gray-200 dark:text-neutral-400 dark:hover:text-neutral-200 dark:focus:text-neutral-200"
                                href="#">Changelog</a></p>
                        <p><a class="inline-flex gap-x-2 text-gray-400 hover:text-gray-200 focus:outline-none focus:text-gray-200 dark:text-neutral-400 dark:hover:text-neutral-200 dark:focus:text-neutral-200"
                                href="#">Docs</a></p>
                    </div>
                </div>
                <!-- End Col -->

                <div class="col-span-1">
                    <h4 class="font-semibold text-gray-100">Company</h4>

                    <div class="mt-3 grid space-y-3">
                        <p><a class="inline-flex gap-x-2 text-gray-400 hover:text-gray-200 focus:outline-none focus:text-gray-200 dark:text-neutral-400 dark:hover:text-neutral-200 dark:focus:text-neutral-200"
                                href="#">About us</a></p>
                        <p><a class="inline-flex gap-x-2 text-gray-400 hover:text-gray-200 focus:outline-none focus:text-gray-200 dark:text-neutral-400 dark:hover:text-neutral-200 dark:focus:text-neutral-200"
                                href="#">Blog</a></p>
                        <p><a class="inline-flex gap-x-2 text-gray-400 hover:text-gray-200 focus:outline-none focus:text-gray-200 dark:text-neutral-400 dark:hover:text-neutral-200 dark:focus:text-neutral-200"
                                href="#">Careers</a> <span
                                class="inline-block ms-1 text-xs bg-blue-700 text-white py-1 px-2 rounded-lg">We're
                                hiring</span></p>
                        <p><a class="inline-flex gap-x-2 text-gray-400 hover:text-gray-200 focus:outline-none focus:text-gray-200 dark:text-neutral-400 dark:hover:text-neutral-200 dark:focus:text-neutral-200"
                                href="#">Customers</a></p>
                    </div>
                </div>
                <!-- End Col -->

                <div class="col-span-2">
                    <h4 class="font-semibold text-gray-100">Stay up to date</h4>

                    <form>
                        <div
                            class="mt-4 flex flex-col items-center gap-2 sm:flex-row sm:gap-3 bg-white rounded-lg p-2 dark:bg-neutral-900">
                            <div class="w-full">
                                <label for="hero-input" class="sr-only">Subscribe</label>
                                <input type="text" id="hero-input" name="hero-input"
                                    class="py-3 px-4 block w-full border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-transparent dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                    placeholder="Enter your email">
                            </div>
                            <a class="w-full sm:w-auto whitespace-nowrap p-3 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                                href="#">
                                Subscribe
                            </a>
                        </div>
                        <p class="mt-3 text-sm text-gray-400">
                            New UI kits or big discounts. Never spam.
                        </p>
                    </form>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Grid -->

            <div class="mt-5 sm:mt-12 grid gap-y-2 sm:gap-y-0 sm:flex sm:justify-between sm:items-center">
                <div class="flex justify-between items-center">
                    <p class="text-sm text-gray-400 dark:text-neutral-400">
                        © 2024 Preline Labs.
                    </p>
                </div>
                <!-- End Col -->

                <!-- Social Brands -->
                <div>
                    <a class="size-10 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-white hover:bg-white/10 focus:outline-none focus:bg-white/10 disabled:opacity-50 disabled:pointer-events-none"
                        href="#">
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="16"
                            height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                        </svg>
                    </a>
                    <a class="size-10 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-white hover:bg-white/10 focus:outline-none focus:bg-white/10 disabled:opacity-50 disabled:pointer-events-none"
                        href="#">
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="16"
                            height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z" />
                        </svg>
                    </a>
                    <a class="size-10 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-white hover:bg-white/10 focus:outline-none focus:bg-white/10 disabled:opacity-50 disabled:pointer-events-none"
                        href="#">
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="16"
                            height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                        </svg>
                    </a>
                    <a class="size-10 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-white hover:bg-white/10 focus:outline-none focus:bg-white/10 disabled:opacity-50 disabled:pointer-events-none"
                        href="#">
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="16"
                            height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z" />
                        </svg>
                    </a>
                    <a class="size-10 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-white hover:bg-white/10 focus:outline-none focus:bg-white/10 disabled:opacity-50 disabled:pointer-events-none"
                        href="#">
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="16"
                            height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M3.362 10.11c0 .926-.756 1.681-1.681 1.681S0 11.036 0 10.111C0 9.186.756 8.43 1.68 8.43h1.682v1.68zm.846 0c0-.924.756-1.68 1.681-1.68s1.681.756 1.681 1.68v4.21c0 .924-.756 1.68-1.68 1.68a1.685 1.685 0 0 1-1.682-1.68v-4.21zM5.89 3.362c-.926 0-1.682-.756-1.682-1.681S4.964 0 5.89 0s1.68.756 1.68 1.68v1.682H5.89zm0 .846c.924 0 1.68.756 1.68 1.681S6.814 7.57 5.89 7.57H1.68C.757 7.57 0 6.814 0 5.89c0-.926.756-1.682 1.68-1.682h4.21zm6.749 1.682c0-.926.755-1.682 1.68-1.682.925 0 1.681.756 1.681 1.681s-.756 1.681-1.68 1.681h-1.681V5.89zm-.848 0c0 .924-.755 1.68-1.68 1.68A1.685 1.685 0 0 1 8.43 5.89V1.68C8.43.757 9.186 0 10.11 0c.926 0 1.681.756 1.681 1.68v4.21zm-1.681 6.748c.926 0 1.682.756 1.682 1.681S11.036 16 10.11 16s-1.681-.756-1.681-1.68v-1.682h1.68zm0-.847c-.924 0-1.68-.755-1.68-1.68 0-.925.756-1.681 1.68-1.681h4.21c.924 0 1.68.756 1.68 1.68 0 .926-.756 1.681-1.68 1.681h-4.21z" />
                        </svg>
                    </a>
                </div>
                <!-- End Social Brands -->
            </div>
        </div>
    </footer>
    <!-- ========== END FOOTER ========== -->
</body>

</html>

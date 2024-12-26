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
    <!-- Navigation -->
    <nav x-data="{ open: false }" class="fixed w-full z-50 bg-white/80 backdrop-blur-md shadow-md dark:bg-gray-800/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <a href="#" class="flex-shrink-0 text-2xl font-bold text-blue-600">RentalKu</a>
                    <div class="hidden md:block ml-10 flex items-baseline space-x-4">
                        <x-nav-link href="#home">Home</x-nav-link>
                        <x-nav-link href="#cars">Cars</x-nav-link>
                        <x-nav-link href="#features">Features</x-nav-link>
                        <x-nav-link href="#pricing">Pricing</x-nav-link>
                    </div>
                </div>
                <div class="hidden md:block">
                    <div class="ml-4 flex items-center md:ml-6">

                        <a href="/login"
                            class="mx-2 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition">
                            Login
                        </a>
                        <a href="/register"
                            class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition">
                            Register
                        </a>

                    </div>
                </div>
                <div class="-mr-2 flex md:hidden">
                    <button @click="open = !open" type="button"
                        class="bg-gray-100 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <span class="sr-only">Open main menu</span>
                        <svg x-show="!open" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg x-show="open" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div x-show="open" class="md:hidden">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="#home" class="text-gray-600 hover:bg-gray-200 block px-3 py-2 rounded-md">Home</a>
                <a href="#cars" class="text-gray-600 hover:bg-gray-200 block px-3 py-2 rounded-md">Cars</a>
                <a href="#features" class="text-gray-600 hover:bg-gray-200 block px-3 py-2 rounded-md">Features</a>
                <a href="#pricing" class="text-gray-600 hover:bg-gray-200 block px-3 py-2 rounded-md">Pricing</a>
                <a href="/login">
                    <button class="w-full bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-600 transition">
                        Login
                    </button>
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header id="home"
        class="relative pt-24 pb-12 bg-gradient-to-br from-blue-100 to-blue-300 dark:from-gray-800 dark:to-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid md:grid-cols-2 gap-10 items-center">
            <div>
                <h1 class="text-4xl md:text-6xl font-extrabold text-gray-900 dark:text-white mb-9~ leading-tight">
                    <span
                        class="block animate-text bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 bg-clip-text text-transparent">
                        Kendarai Mobilmu<span class="gradient-text"> Sekarang</span> Juga
                    </span>
                </h1>
                <p class="text-xl text-gray-600 dark:text-gray-300 mb-8">
                    Experience luxury, convenience, and freedom with our premium car rental service.
                </p>
                <div class="flex space-x-4">
                    <button
                        class="bg-blue-600 text-white px-6 py-3 rounded-full hover:bg-blue-700 transition transform hover:scale-105">
                        Rent Now
                    </button>
                    <button
                        class="border border-blue-600 text-blue-600 px-6 py-3 rounded-full hover:bg-blue-50 transition">
                        Learn More
                    </button>
                </div>
            </div>
            <div class="relative">
                <img src="https://static.tcimg.net/vehicles/primary/b995a9a53077df51/2025-BMW-i5-gray-full_color-driver_side_front_quarter.png"
                    alt="Luxury Car"
                    class="w-full h-auto rounded-2xl floating-element transform hover:scale-105 transition duration-300">
            </div>
        </div>
    </header>



    <!-- Car List Section -->
    <section class="py-16 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold text-center mb-8 text-gray-800 dark:text-neutral-200">
                Mobil Tersedia
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach ($cars as $car)
                    <x-car-card :car="$car" />
                @endforeach
            </div>
            <div class="w-full flex  justify-center mt-10">

                <x-primary-button as='a' href="{{ route('orders.index')}}">Show more ...</x-primary-button>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-16 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center mb-12">Pelanggan Kami</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <x-public.testimonial-card name="Sarah Johnson" image="https://img.freepik.com/free-vector/blue-circle-with-white-user_78370-4707.jpg"
                    :rating="5"
                    content="Layanan luar biasa! Proses pemesanan lancar, dan mobil dalam kondisi sempurna." />

                <x-public.testimonial-card name="Mike Thompson" image="https://img.freepik.com/free-vector/blue-circle-with-white-user_78370-4707.jpg"
                    :rating="4"
                    content="Variasi mobil banyak dan harga sangat bersaing. Pasti akan menyewa lagi!" />

                <x-public.testimonial-card name="Emily Rodriguez" image="https://img.freepik.com/free-vector/blue-circle-with-white-user_78370-4707.jpg"
                    :rating="5"
                    content="Dukungan 24/7 menyelamatkan perjalanan saya ketika saya mengalami masalah kecil. Sangat membantu!" />
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-16 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center mb-12">Why Choose RentalKu?</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <x-public.feature-card title="Easy Booking"
                    description="Simple and intuitive booking process in just a few clicks."
                    icon='<svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>' />
                <x-public.feature-card title="Easy Booking"
                    description="Simple and intuitive booking process in just a few clicks."
                    icon='<svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>' />
                <x-public.feature-card title="Easy Booking"
                    description="Simple and intuitive booking process in just a few clicks."
                    icon='<svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>' />
            </div>
        </div>
    </section>


    <!-- FAQ Section -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
            <h2 class="text-2xl font-bold md:text-3xl md:leading-tight text-gray-800 dark:text-neutral-200">
                Pertanyaan yang Sering Diajukan
            </h2>
        </div>

        <div class="max-w-5xl mx-auto">
            <div class="grid sm:grid-cols-2 gap-6 md:gap-12">
                <x-public.faq-item question="Bagaimana cara memesan mobil?"
                    answer="Anda dapat memesan mobil melalui website kami dengan memilih mobil yang diinginkan, mengisi form pemesanan, dan melakukan pembayaran." />

                <x-public.faq-item question="Apa saja syarat menyewa mobil?"
                    answer="Syarat utama adalah KTP, SIM A yang masih berlaku, dan deposit sesuai ketentuan." />

                <x-public.faq-item question="Apakah ada asuransi?"
                    answer="Ya, setiap mobil kami dilengkapi dengan asuransi comprehensive untuk keamanan Anda." />

                <x-public.faq-item question="Bagaimana dengan pembatalan?"
                    answer="Pembatalan dapat dilakukan 24 jam sebelum waktu pengambilan dengan pengembalian dana 100%." />
            </div>
        </div>
    </div>

    <!-- ========== FOOTER ========== -->
    <footer class="mt-auto bg-gray-900 w-full dark:bg-neutral-950">
        <div class="mt-auto w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 lg:pt-20 mx-auto">
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-6">
                <!-- Brand -->
                <div class="col-span-full lg:col-span-1">
                    <a class="flex-none text-xl font-semibold text-white" href="#">RentalKu</a>
                </div>

                <!-- Product Links -->
                <div class="col-span-1">
                    <h4 class="font-semibold text-gray-100">Product</h4>
                    <div class="mt-3 grid space-y-3">
                        <x-public.footer-link href="#">Pricing</x-public.footer-link>
                        <x-public.footer-link href="#">Changelog</x-public.footer-link>
                        <x-public.footer-link href="#">Docs</x-public.footer-link>
                    </div>
                </div>

                <div class="col-span-1">
                    <h4 class="font-semibold text-gray-100">Company</h4>

                    <div class="mt-3 grid space-y-3">
                        <x-public.footer-link href="#">About us</x-public.footer-link>
                        <x-public.footer-link href="#">Blog</x-public.footer-link>
                        <x-public.footer-link href="#">Careers</x-public.footer-link>
                        <x-public.footer-link href="#">Customers</x-public.footer-link>
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

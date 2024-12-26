<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="./node_modules/apexcharts/dist/apexcharts.css">

    <!-- Scripts -->
    @vite('resources/js/app.js')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="./node_modules/lodash/lodash.min.js"></script>
    <script src="./node_modules/apexcharts/dist/apexcharts.min.js"></script>
    <script src="./node_modules/preline/dist/helper-apexcharts.js"></script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')
        @include('layouts.sidebar')

        <!-- Page Heading -->
        <!-- @isset($header)
    <header class="bg-white dark:bg-gray-800 shadow">
                                                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                                                        {{ $header }}
                                                    </div>
                                                </header>
@endisset -->



        <!-- Page Content -->
        <main>
            <div class="p-4 lg:ml-64">
                <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-16">
                    {{ $slot }}
                </div>
            </div>
        </main>
    </div>
</body>

</html>

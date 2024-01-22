<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.4/html5-qrcode.min.js" integrity="sha512-k/KAe4Yff9EUdYI5/IAHlwUswqeipP+Cp5qnrsUjTPCgl51La2/JhyyjNciztD7mWNKLSXci48m7cctATKfLlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Scripts -->

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    @wireUiScripts
    @filamentStyles
    @vite('resources/css/app.css')

</head>

<body class="font-sans antialiased relative">
    <x-dialog z-index="z-50" blur="md" align="center" />
    <img src="{{ asset('images/fitness1.jpg') }}" class="absolute top-0 left-0 h-full w-full object-cover opacity-20"
        alt="">
    <div class="min-h-screen relative bg-gray-100 bg-opacity-50">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-green-600 bg-opacity-70 relative shadow-lg text-white">

                <div class="max-w-7xl relative mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('scripts')
    @vite('resources/js/app.js')
    @filamentScripts

</body>

</html>

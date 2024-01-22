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

    <!-- Scripts -->
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    @filamentStyles
    @vite('resources/css/app.css')
</head>

<body class="font-sans antialiased bg-gray-700 overflow-hidden">
    <img src="{{ asset('images/fitness.jpg') }}"
        class="absolute object-cover top-0 opacity-10 left-0 right-0 w-full h-full bottom-0" alt="">

    <section class="relative flex items-center justify-center">
        <div class="relative items-center w-full px-5 py-12 mx-auto max-w-7xl lg:px-16 lg:py-32 md:px-12">
            <div>
                <div class="text-center">
                    <span class="bg-gray-500/10 px-4 py-2 rounded-full w-auto">
                        <span class="text-sm text-white">
                            Start your Training.
                        </span>
                    </span>
                    <p class="mt-8 text-3xl font-extrabold tracking-tight text-white lg:text-6xl">
                        Take care of your body and it's the only place you have to live
                    </p>
                    <p class=" mt-10 text-lg  tracking-tight text-gray-200 ">
                        Gym session or brisk walk can help. Physical activity stimulates many brain chemicals that may
                        leave you.
                    </p>
                    <div class="mt-5 flex justify-center">
                        <div class="flex flex-col items-center gap-3 mt-10 lg:flex-row">
                            <a class="inline-flex items-center justify-center w-full  font-bold px-4 py-3 text-center text-white duration-200 bg-indigo-500 border-2 border-indigo-500 focus:outline-none focus-visible:outline-black focus-visible:ring-black hover:bg-transparent  lg:w-auto rounded-xl"
                                href="{{ route('login') }}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    class="h-5 w-5 fill-white">
                                    <path
                                        d="M10 11V8L15 12L10 16V13H1V11H10ZM2.4578 15H4.58152C5.76829 17.9318 8.64262 20 12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C8.64262 4 5.76829 6.06817 4.58152 9H2.4578C3.73207 4.94289 7.52236 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C7.52236 22 3.73207 19.0571 2.4578 15Z">
                                    </path>
                                </svg>
                                <span class="ml-3 ">Get Started</span></a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="relative items-center w-full py-5 pb-12 mx-auto mt-10 max-w-7xl">
                <svg class="absolute -mt-2 blur-3xl" fill="none" viewBox="0 0 400 400" height="100%" width="100%"
                    xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_10_20)">
                        <g filter="url(#filter0_f_10_20)">
                            <path d="M128.6 0H0V322.2L106.2 134.75L128.6 0Z" fill="#03FFE0"></path>
                            <path d="M0 322.2V400H240H320L106.2 134.75L0 322.2Z" fill="#7C87F8"></path>
                            <path d="M320 400H400V78.75L106.2 134.75L320 400Z" fill="#4C65E4"></path>
                            <path d="M400 0H128.6L106.2 134.75L400 78.75V0Z" fill="#043AFF"></path>
                        </g>
                    </g>
                    <defs>
                        <filter color-interpolation-filters="sRGB" filterUnits="userSpaceOnUse" height="720.666"
                            id="filter0_f_10_20" width="720.666" x="-160.333" y="-160.333">
                            <feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
                            <feBlend in="SourceGraphic" in2="BackgroundImageFix" mode="normal" result="shape">
                            </feBlend>
                            <feGaussianBlur result="effect1_foregroundBlur_10_20" stdDeviation="80.1666">
                            </feGaussianBlur>
                        </filter>
                    </defs>
                </svg>
                <img alt="" class="relative object-cover w-full border rounded shadow-2xl lg:rounded-3xl"
                    src="{{ asset('images/fitness1.jpg') }}">
            </div>
        </div>
    </section>
    @filamentScripts
    @vite('resources/js/app.js')
</body>

</html>

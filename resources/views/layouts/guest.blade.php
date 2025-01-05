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
        @vite('resources/css/app.css')
        @livewireStyles
        @stack('styles')

        <style>
            [x-cloak] {
                display: none !important;
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">

            <!-- Page Heading -->
            @if (isset($header))
            <div class="shadow rounded-b-[80px] rounded-br-[80px] pb-[160px] bg-no-repeat bg-cover bg-center" style="background-image: url({{ asset('images/bg-header.png')}})">
                <x-navigation />
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-[64px]">
                        {{ $header }}
                    </div>
                </div>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
            <footer class="w-full bg-black text-white">
                <div class="footer-top py-[80px]">
                    <div class="container xl:max-w-[1100px]">
                        <div class="grid grid-cols-4">
                            <div class="col-span-1">
                                <img src="{{ asset('images/logo.png') }}" alt="logo" class="w-[200px]">
                                <div class="flex items-center">
                                    <a href="#" class="mr-[20px]"><img src="{{ asset('images/facebook.png') }}" alt="facebook"></a>
                                    <a href="#"><img src="{{ asset('images/twitter.png') }}" alt="twitter"></a>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <h3 class="text-[24px] font-bold">Special Services</h3>
                                <ul class="mt-[20px] text-gray-400">
                                    <li><a href="#">Fast Delivery</a></li>
                                    <li><a href="#">Free Delivery Fee</a></li>
                                </ul>
                            </div>
                            <div class="col-span-1">
                                <h3 class="text-[24px] font-bold">Need Help?</h3>
                                <ul class="mt-[20px] text-gray-400">
                                    <li><a href="#">Contact Us</a></li>
                                    <li><a href="#">FAQs</a></li>
                                </ul>
                            </div>
                            <div class="col-span-1">
                                <h3 class="text-[24px] font-bold">About Us</h3>
                                <ul class="mt-[20px] text-gray-400">
                                    <li><a href="#">About TMs Supplier</a></li>
                                    <li><a href="#">Blog Post</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="container">
                        <div class="flex justify-center items-center py-[20px] text-center">
                            <p>&copy; 2021 TMs Supplier. All Rights Reserved.</p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>


        @livewireScripts
        @vite('resources/js/app.js')
        @stack('scripts')
    </body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Sofia+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">


        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="antialiased h-screen" style="font-family: 'Poppins', sans-serif;">
        <!-- Navbar -->
        <div class="sticky top-0 z-30 bg-white shadow-sm">
            <header class="max-w-6xl mx-auto py-4">
                <div class="flex justify-between items-center">
                    <!-- Logo -->
                    <div class="font-extrabold text-3xl" style="font-family: 'Sofia Sans', sans-serif;">
                        <p class="text-[#056676]">So<span class="text-[#97DECE]">goo</span></p>
                    </div>

                    <!-- Login & Register -->
                    @if (Route::has('login'))
                    <div class="hidden sm:block">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="bg-[#CBEDD5] py-2 px-6 rounded-lg font-medium text-base hover:bg-[#00dcaa] hover:scale-105">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="bg-[#CBEDD5] py-2 px-6 rounded-lg font-medium text-base hover:bg-[#00dcaa] hover:scale-105">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="bg-[#CBEDD5] py-2 px-6 rounded-lg font-medium text-base hover:bg-[#00dcaa] hover:scale-105">Register</a>
                            @endif
                        @endauth
                    </div>
                    @endif
                </div>
            </header>
        </div>

        <!-- Line -->
        <div></div>

        <!-- Content -->
        <div class="max-w-6xl mx-auto mt-12">
            <div class="w-full flex items-center">
                <div class="w-1/2">
                    <div class="max-w-md">
                        <p class="font-bold text-6xl">Find Your Dream <span class="text-[#00dcaa]">Item.</span> </p>
                        <p class="font-light text-base mt-8">This is a site made for you to help find your dream item.</p>
                        <div class="mt-8">
                            <a href="{{ route('register') }}" class="rounded-lg bg-[#F49D1A] p-2 px-24 font-medium hover:bg-[#f0aa41]">Let's try</a>
                        </div>
                    </div>
                </div>
                <div class="w-1/2">
                    <img src="images/1.jpg" alt="">
                </div>
            </div>
        </div>
    </body>
</html>

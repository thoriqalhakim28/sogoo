<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
        <nav class="max-w-6xl mx-auto mt-4">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <div class="font-extrabold text-3xl" style="font-family: 'Sofia Sans', sans-serif;">
                    <p class="text-[#056676]">So<span class="text-[#97DECE]">goo</span></p>
                </div>

                <!-- Navigation -->
                <div class="flex gap-12 font-semibold text-base">
                    <a href="#home" class="hover:text-[#97DECE] hover:scale-110">HOME</a>
                    <a href="#about" class="hover:text-[#97DECE] hover:scale-110">ABOUT</a>
                    <a href="#contact" class="hover:text-[#97DECE] hover:scale-110">CONTACT</a>
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
        </nav>
        <!-- Line -->
        <div></div>

        <!-- Content -->
        <main class="">
        </main>
    </body>
</html>

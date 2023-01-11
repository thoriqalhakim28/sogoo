<!-- Navbar -->
<nav class="bg-white shadow-sm">
    <div class="max-w-6xl mx-auto py-4">
        <div class="flex justify-between items-center">
            <!-- Logo -->
            <div class="font-extrabold text-3xl" style="font-family: 'Sofia Sans', sans-serif;">
                <a href="{{ url('/dashboard') }}">
                    <p class="text-[#056676]">So<span class="text-[#97DECE]">goo</span></p>
                </a>
            </div>

            <!-- Search -->
            <div class="w-full max-w-xl flex">
                <input type="text" class="w-full border border-[#97DECE] border-r-0 rounded-l-lg focus:outline-none focus:ring-inset" placeholder="Search">
                <button class="border px-2 rounded-r-lg border-[#97DECE] bg-[#97DECE] hover:bg-[#00dcaa] hover:text-white">Search</button>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Sell Items -->
                <a href="{{ route('item.create') }}" class="border p-2 px-4 rounded-lg bg-[#97DECE] hover:bg-[#00dcaa]">Sell items</a>
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">

                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link href="{{ route('profile.edit') }}">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</nav>


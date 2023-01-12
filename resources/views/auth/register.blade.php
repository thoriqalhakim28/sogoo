<x-auth-layout>
    <div class="relative min-h-screen flex ">
        <div class="flex items-center flex-auto min-w-0 bg-white">
          <div class="h-full hidden md:flex flex-auto items-center justify-center p-10 overflow-hidden bg-[#056676] text-white bg-no-repeat bg-cover relative">
            <div class="w-full max-w-md z-10">

            </div>
          </div>
          <div class="flex items-center justify-center w-full w-2/5 bg-white">
            <div class="max-w-md w-full space-y-8">
              <div class="text-center">
                <h2 class="mt-6 text-3xl font-bold text-gray-900">
                  Welcome to <span class="text-[#056676]">So<span class="text-[#97DECE]">goo</span></span>
                </h2>
                <p class="mt-2 text-sm text-gray-500">Please sign up to your account</p>
              </div>
              <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex justify-center mt-4">
                    <x-primary-button class="ml-4">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>

                <div class="flex justify-center mt-4">
                    <p class="mt-2 text-sm text-gray-500">You don't have account? <a href="{{ route('login') }}" class="hover:text-blue-400">Sign up here!</a></p>
                </div>
            </form>
            </div>
          </div>
        </div>
      </div>
</x-auth-layout>

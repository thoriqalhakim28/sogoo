<section class="space-y-6 w-full bg-white p-4 rounded-lg shadow-lg">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <div class="">
        <form action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('patch')

            <!-- Name -->
            <div class="mt-4">
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input class="block mt-1 w-full" id="name" type="text" name="name" value="{{ old('name', $user->name) }}" autocomplete="name" autofocus/>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Phone Number -->
            <div class="mt-4">
                <x-input-label for="phoneNumber" :value="__('Phone Number')" />
                <x-text-input class="block mt-1 w-full" id="phoneNumber" type="text" name="phoneNumber" value="{{ old('phoneNumber', $user->phoneNumber) }}" autocomplete="phoneNumber" autofocus/>
                <x-input-error :messages="$errors->get('phoneNumber')" class="mt-2" />
            </div>

            <!-- Address -->
            <div class="mt-4">
                <x-input-label for="address" :value="__('Address')" />
                <x-text-input class="block mt-1 w-full" id="address" type="text" name="address" value="{{ old('address', $user->address) }}" autocomplete="address" autofocus/>
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>
            <div class="flex justify-end mt-8">
                <x-primary-button class="">
                    {{ __('Save') }}
                </x-primary-button>
                @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
            </div>
        </form>
    </div>
</section>

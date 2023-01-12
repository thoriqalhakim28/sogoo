<x-app-layout>
    <div class="max-w-4xl mx-auto mt-8">
        <div class="flex w-full gap-12">
            <div class="flex w-1/4 flex-col font-light gap-4 bg-blue">
                <a href="{{ route('profile.edit') }}">Edit Profile</a>
                <a href="{{ route('profile.password') }}">Password</a>
                <a href="{{ route('profile.item') }}">Item for sale</a>
                <a href="{{ route('profile.job') }}">Job</a>
                <a href="{{ route('profile.delete') }}">Delete Account</a>
            </div>
            @include('profile.partials.update-password-form')

        </div>
    </div>
</x-app-layout>

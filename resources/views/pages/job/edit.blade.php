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

            <section class="w-full p-4 bg-white shadow-lg rounded-lg">
                <div class="flex justify-center text-lg font-medium">
                    Edit item
                </div>
                <div class="border-b my-2"></div>
                <div class="">
                    <form action="{{ route('job.update', $jobs->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mt-4">
                            <x-input-label for="job_name" :value="__('Job Name')" />
                            <x-text-input id="job_name" class="block mt-1 w-full" type="text" name="job_name" value="{{ $jobs->job_name }}" required autofocus />
                            <x-input-error :messages="$errors->get('job_name')" class="mt-2" />
                        </div>

                        <!-- Salary -->
                        <div class="mt-4">
                            <x-input-label for="salary" :value="__('Salary')" />
                            <x-text-input id="salary" class="block mt-1 w-full" type="number" name="salary" value="{{ $jobs->salary }}" required autofocus />
                            <x-input-error :messages="$errors->get('salary')" class="mt-2" />
                        </div>

                        <!-- Description -->
                        <div class="mt-4">
                            <x-input-label for="description" :value="__('Description')" />
                            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" value="{{ $jobs->description }}" required autofocus />
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <div class="flex justify-end mt-8">
                            <x-primary-button class="shadow-lg">
                                {{ __('Submit') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <div class="max-w-4xl mx-auto mt-4">
        <form method="POST" action="{{ route('job.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="bg-white p-4 shadow-lg rounded-lg">
                <!-- Job name -->
                <div class="mt-4">
                    <x-input-label for="job_name" :value="__('Job Name')" />
                    <x-text-input id="job_name" class="block mt-1 w-full" type="text" name="job_name" :value="old('job_name')" required autofocus />
                    <x-input-error :messages="$errors->get('job_name')" class="mt-2" />
                </div>

                <!-- Salary -->
                <div class="mt-4">
                    <x-input-label for="salary" :value="__('Salary')" />
                    <x-text-input id="salary" class="block mt-1 w-full" type="number" name="salary" :value="old('salary')" required autofocus />
                    <x-input-error :messages="$errors->get('salary')" class="mt-2" />
                </div>

                <!-- Description -->
                <div class="mt-4">
                    <x-input-label for="name" :value="__('Description')" />
                    <textarea name="description" id="description" :value="old('description')" rows="5" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required autofocus></textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

            </div>
            <div class="flex justify-end mt-8">
                <x-primary-button class="shadow-lg">
                    {{ __('Submit') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>

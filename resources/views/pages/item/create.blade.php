<x-app-layout>
    <div class="max-w-4xl mx-auto mt-4">
        <form method="POST" action="{{ route('item.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-2 gap-4">
                <div class="bg-white p-4 shadow-lg rounded-lg">
                    <!-- Item name -->
                    <div class="mt-4">
                        <x-input-label for="name" :value="__('Item Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Category -->
                    <div class="mt-4">
                        <x-input-label for="cate_id" :value="__('Category')" />
                        <select name="cate_id" id="cate_id" :value="old('cate_id')" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required autofocus>
                            <option selected>-- Select a Category --</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->cate_name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('cate_id')" class="mt-2" />
                    </div>

                    <!-- Price -->
                    <div class="mt-4">
                        <x-input-label for="price" :value="__('Price')" />
                        <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price')" required autofocus />
                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
                    </div>

                    <!-- Image -->
                    <div class="mt-4">
                        <x-input-label for="image" :value="__('Image')" />
                        <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')" accept="images/*" onchange="document.getElementById('output').src = window.URL.createdObjectURL(this.files[0])" required autofocus />
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>

                </div>
                <div class="bg-white p-4 shadow-lg rounded-lg">
                    <!-- Location -->
                    <div class="mt-4">
                        <x-input-label for="location" :value="__('Location')" />
                        <x-text-input id="location" class="block mt-1 w-full" type="text" name="location" :value="old('location')" required autofocus />
                        <x-input-error :messages="$errors->get('location')" class="mt-2" />
                    </div>

                    <!-- Condition -->
                    <div class="mt-4">
                        <x-input-label for="condition" :value="__('Condition')" />
                        <x-text-input id="condition" class="block mt-1 w-full" type="text" name="condition" :value="old('condition')" required autofocus />
                        <x-input-error :messages="$errors->get('condition')" class="mt-2" />
                    </div>

                    <!-- Description -->
                    <div class="mt-4">
                        <x-input-label for="name" :value="__('Description')" />
                        <textarea name="description" id="description" :value="old('description')" rows="5" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required autofocus></textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>
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

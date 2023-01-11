<x-app-layout>
    <div class="max-w-4xl mx-auto mt-8">
        <div class="flex w-full gap-12">
            <div class="flex w-1/4 flex-col font-light gap-4 bg-blue">
                <a href="{{ route('profile.edit') }}">Edit Profile</a>
                <a href="{{ route('profile.password') }}">Password</a>
                <a href="{{ route('profile.item') }}">Item for sale</a>
                <a href="{{ route('profile.delete') }}">Delete Account</a>
            </div>

            <section class="w-full p-4 bg-white shadow-lg rounded-lg">
                <div class="flex justify-center text-lg font-medium">
                    Edit item
                </div>
                <div class="border-b my-2"></div>
                <div class="">
                    <form action="{{ route('item.update', $items->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-2 gap-4">
                            <div class="">
                                <!-- Item name -->
                                <div class="mt-4">
                                    <x-input-label for="name" :value="__('Item Name')" />
                                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $items->item_name }}" required autofocus />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <!-- Category -->
                                <div class="mt-4">
                                    <x-input-label for="cate_id" :value="__('Category')" />
                                    <select name="cate_id" id="cate_id" value="{{ $items->cate_id }}" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required autofocus>
                                        <option selected>{{ $items->cate_name }}</option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->cate_name }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('cate_id')" class="mt-2" />
                                </div>

                                <!-- Price -->
                                <div class="mt-4">
                                    <x-input-label for="price" :value="__('Price')" />
                                    <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" value="{{ $items->price }}" required autofocus />
                                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                                </div>

                                <!-- Image -->
                                <div class="mt-4">
                                    <x-input-label for="image" :value="__('Image')" />
                                    <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" value="{{ $items->image }}" accept="images/*" onchange="document.getElementById('output').src = window.URL.createdObjectURL(this.files[0])" required autofocus />
                                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                                </div>

                            </div>
                            <div class="">
                                <!-- Location -->
                                <div class="mt-4">
                                    <x-input-label for="location" :value="__('Location')" />
                                    <x-text-input id="location" class="block mt-1 w-full" type="text" name="location" value="{{ $items->location }}" required autofocus />
                                    <x-input-error :messages="$errors->get('location')" class="mt-2" />
                                </div>

                                <!-- Condition -->
                                <div class="mt-4">
                                    <x-input-label for="condition" :value="__('Condition')" />
                                    <x-text-input id="condition" class="block mt-1 w-full" type="text" name="condition" value="{{ $items->condition }}" required autofocus />
                                    <x-input-error :messages="$errors->get('condition')" class="mt-2" />
                                </div>

                                <!-- Description -->
                                <div class="mt-4">
                                    <x-input-label for="description" :value="__('Description')" />
                                    <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" value="{{ $items->description }}" required autofocus />
                                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                                </div>

                                <!-- Status -->
                                <div class="mt-4">
                                    <x-input-label for="status" :value="__('Status')" />
                                    <select name="status" id="status" value="{{ $items->status }}" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required autofocus>
                                        <option value="1" @if(old('status', $items->status) == 1) selected @endif>Available</option>
                                        <option value="2" @if(old('status', $items->status) == 2) selected @endif>Sold</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('status')" class="mt-2" />
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
            </section>
        </div>
    </div>
</x-app-layout>

<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <label for="create-category" class="inline-flex items-center mb-4 px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Add Category
                    </label>
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    No
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Category
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category )
                            <tr class="bg-white border-b">
                                <td class="px-6 py-4">
                                    {{ $category->id }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-700">
                                    {{ $category->cate_name }}
                                </td>
                                <td class="px-6 py-4">
                                    <form action="{{ route('category.destroy',$category->id) }}" method="POST">
                                        @csrf
                                        @method('delete')

                                        <button type="submit" class="hover:text-red-400" onclick="return confirm('Are you sure?')">
                                            <i class="uil uil-trash-alt text-xl"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Form create categoru -->
    <input type="checkbox" id="create-category" class="modal-toggle" />
    <div class="modal">
    <div class="modal-box relative">
        <label for="create-category" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
        <p class="font-medium text-lg">Add Category</p>
        <form action="{{ route('category.store') }}" method="POST">
            @csrf
            <!-- Cate Name name -->
            <div class="mt-4">
                <x-input-label for="cate_name" :value="__('Category')" />
                <x-text-input id="cate_name" class="block mt-1 w-full" type="text" name="cate_name" :value="old('cate_name')" required autofocus />
                <x-input-error :messages="$errors->get('cate_name')" class="mt-2" />
            </div>

            <div class="flex justify-end mt-8">
                <x-primary-button class="shadow-lg">
                    {{ __('Submit') }}
                </x-primary-button>
            </div>
        </form>
    </div>
    </div>

</x-admin-layout>

<x-app-layout>
    <div class="max-w-4xl mx-auto mt-8">
        <div class="flex w-full gap-12">
            <div class="flex w-1/4 flex-col font-light gap-4 bg-blue">
                <a href="{{ route('profile.edit') }}">Edit Profile</a>
                <a href="{{ route('profile.password') }}">Password</a>
                <a href="{{ route('profile.item') }}">Item for sale</a>
                <a href="{{ route('profile.delete') }}">Delete Account</a>
            </div>

            <section class="space-y-6 w-full bg-white p-4 rounded-lg shadow-lg">
                <div class="font-medium text-lg mb-4">
                    Item for sale
                </div>

            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Item name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Category
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Price
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                        <tr class="bg-white border-b">
                            <td class="px-6 py-4">
                                {{ $item->item_name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->cate_name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->price }}
                            </td>
                            <td class="px-6 py-4">
                                @if ($item->status === 1)
                                Available
                                @elseif ($item->status === 2)
                                Sold
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('item.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('delete')

                                    <a href="{{ route('item.edit', $item->id) }}" class="hover:text-green-400">
                                        <i class="uil uil-edit text-xl "></i>
                                    </a>

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

            </section>

        </div>
    </div>
</x-app-layout>

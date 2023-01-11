<x-app-layout>

    <div class="max-w-6xl mx-auto mt-8">
        <div class="w-full flex gap-2">
            <div class="w-3/4 bg-white shadow-lg rounded-lg p-4">
                <div class="grid grid-cols-2">
                    <!-- Image -->
                    <div class="">
                        <img src="https://placeimg.com/584/384/tech" alt="" class="">
                    </div>
                    <!-- Detail Item -->
                    <div class="mx-4">
                        <p class="font-base text-xl">{{ $items->item_name }}</p>
                        <p class="my-4 font-semibold text-2xl">Rp{{ $items->price }}</p>

                        <div class="bg-gray-200 p-2 text-sm rounded-lg">
                            <p class="block w-full font-medium">Location : <span class="font-light">{{ $items->location }}</span></p>
                            <p class="block w-full font-medium">Condition : <span class="font-light">{{ $items->condition }}</span></p>
                            @if ($items->status === 1)
                            <p class="block w-full font-medium">Status : <span class="font-light">Tersedia</span></p>
                            @elseif($items->status === 2)
                            <p class="block w-full font-medium">Status : <span class="font-light">Terjual</span></p>
                            @endif
                            <p class="block w-full font-medium">Post on : <span class="font-light">{{ $items->created_at }}</span></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-1/4 bg-white shadow-lg rounded-lg p-4">
                <p>Info Seller</p>
                <div class="border-t border-gray-200 my-2"></div>
                <div class="flex items-align gap-2">
                    <img src="https://placeimg.com/54/54/people" alt="" class="rounded-full">
                    <div class="flex flex-col">
                        <p>{{ $items->user->name }}</p>
                        <div class="border-t border-gray-200"></div>
                        <p>{{ $items->user->address }}</p>
                    </div>
                </div>
                <div class="flex justify-center mt-4">
                    <a href="" class="bg-[#97DECE] p-2 px-6 rounded-lg hover:bg-[#00dcaa]">Send PM</a>
                </div>
            </div>
        </div>
        <!-- Description -->
        <div class="bg-white shadow-lg rounded-lg p-4 mt-4">
            <p class="text-xl font-medium">Description</p>
            <div class="border-t border-gray-200 my-2"></div>
            <p class="font-light">
                {{ $items->description }}
            </p>
        </div>
    </div>
</x-app-layout>

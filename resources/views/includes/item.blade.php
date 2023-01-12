<div class="max-w-6xl mx-auto mt-8">
    <div class="p-4 bg-white shadow-lg rounded-lg">
        <p class="mb-4 font-semibold text-xl">Items</p>
        <div class="grid grid-cols-5 gap-2">
            <!-- Card -->
            @foreach ($items as $item)
            <div class="w-full rounded-lg p-2 bg-white shadow-lg">
                <a href="{{ route('item.view', $item->id) }}">
                    <!-- Image -->
                <img src="{{ $item->image }}" alt="" class="w-full">
                <!-- Title -->
                <div class="flex flex-col mt-2">
                    <p class="font-light text-sm text-gray-400">{{ $item->user->name }}</p>
                    <p class="text-sm font-base">{{ $item->item_name }}</p>
                    <p class="font-semibold text-xl">Rp{{ $item->price }}</p>
                </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>

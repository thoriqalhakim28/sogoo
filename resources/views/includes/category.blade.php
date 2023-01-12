<div class="max-w-6xl mx-auto mt-12">
    <!-- Category -->
    <div class="p-4 bg-white shadow-lg rounded-lg">
        <p class="mb-4 font-semibold text-xl">Category</p>
        <div class="grid grid-cols-8 gap-2">
            @foreach ($categories as $category)
            <div class="flex bg-white flex-col items-center border p-2 rounded-lg shadow-lg hover:bg-[#00dcaa] hover:text-white">
                <span class="font-light text-sm">{{ $category->cate_name }}</span>
            </div>
            @endforeach
        </div>
    </div>
</div>

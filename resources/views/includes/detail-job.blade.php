<x-app-layout>

    <div class="max-w-6xl mx-auto mt-8">
        <div class="w-full flex gap-2">
            <div class="w-3/4 bg-white shadow-lg rounded-lg p-4">
                <!-- Detail Item -->
                <div class="mx-4">
                    <p class="font-base text-xl">{{ $jobs->job_name }}</p>
                    <p class="my-4 font-semibold text-2xl">Rp{{ $jobs->salary }}</p>

                    <div class="bg-gray-200 w-1/4 p-2 text-sm rounded-lg">
                        <p class="block w-full font-medium">Post on : <span class="font-light">{{ $jobs->created_at }}</span></p>
                    </div>
                </div>
            </div>
            <div class="w-1/4 bg-white shadow-lg rounded-lg p-4">
                <p>Info</p>
                <div class="border-t border-gray-200 my-2"></div>
                <div class="flex items-align gap-2">
                    <img src="https://placeimg.com/54/54/people" alt="" class="rounded-full">
                    <div class="flex flex-col">
                        <p>{{ $jobs->user->name }}</p>
                        <div class="border-t border-gray-200"></div>
                        <p>{{ $jobs->user->address }}</p>
                    </div>
                </div>
                <div class="flex justify-center mt-4">
                    <a href="https://api.whatsapp.com/send?phone={{ $jobs->user->phoneNumber }}" class="bg-[#97DECE] p-2 px-6 rounded-lg hover:bg-[#00dcaa]">Send PM</a>
                </div>
            </div>
        </div>
        <!-- Description -->
        <div class="bg-white shadow-lg rounded-lg p-4 mt-4">
            <p class="text-xl font-medium">Description</p>
            <div class="border-t border-gray-200 my-2"></div>
            <p class="font-light">
                {{ $jobs->description }}
            </p>
        </div>
    </div>
</x-app-layout>

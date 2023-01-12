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

            <section class="space-y-6 w-full bg-white p-4 rounded-lg shadow-lg">
                <div class="font-medium text-lg mb-4">
                    Job
                </div>

            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Job name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                salary
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jobs as $job)
                        <tr class="bg-white border-b">
                            <td class="px-6 py-4">
                                {{ $job->job_name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $job->salary }}
                            </td>
                            <td class="px-6 py-4">
                                <form action="{{ route('job.destroy', $job->id) }}" method="POST">
                                    @csrf
                                    @method('delete')

                                    <a href="{{ route('job.edit', $job->id) }}" class="hover:text-green-400">
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

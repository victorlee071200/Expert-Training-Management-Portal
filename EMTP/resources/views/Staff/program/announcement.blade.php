<x-app-layout title="Client Specific Registered Program - Announcement">
    <div class="bg-white sm:rounded-lg flex">
        <!-- side nav -->
        <div class="bg-gray-300 text-gray-800 hidden md:flex h-auto">
            <ul>
                <li>
                    <a href="{{ route('client-program-detail', [$assignedprogram, $program]) }}" class="hover:bg-white hover:text-indigo-600 px-7 md:px-16 lg:px-20 h-16 flex justify-center items-center w-auto">Details</a>
                </li>
                <li>
                    <a href="{{ route('client-program-announcement', [$assignedprogram, $program]) }}" class="hover:bg-white hover:text-indigo-600 px-7 md:px-16 lg:px-20 bg-white text-indigo-600 h-16 flex justify-center items-center w-auto">Announcement</a>
                </li>
                <li>
                    <a href="{{ route('client-program-material', [$assignedprogram, $program]) }}" class="hover:bg-white hover:text-indigo-600 px-7 md:px-16 lg:px-20 h-16 flex justify-center items-center w-auto">Materials</a>
                </li>
                <li>
                    <a href="{{ route('client-program-feedback', [$assignedprogram, $program]) }}" class="hover:bg-white hover:text-indigo-600 px-7 md:px-16 lg:px-20 h-16 flex justify-center items-center w-auto">Feedback</a>
                </li>
            </ul>
        </div>
        <div class="block  w-full">
            <div class="mb-5">
                <h2 class="text-3xl font-bold text-gray-800 py-4 px-4 border-b border-gray-100 w-full">
                    {{ __('Announcement') }}
                </h2>
            </div>
        </div>
    </div>
</x-app-layout>
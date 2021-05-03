<x-app-layout title="Staff Specific Program - Material">
    <div class="bg-white sm:rounded-lg flex">
        <!-- side nav -->
        <div class="bg-gray-300 text-gray-800 hidden md:flex h-auto">
            <ul>
                <li>
                    <a href="{{ route('staff-program-detail', [$registeredprogram, $program]) }}" class="hover:bg-white hover:text-indigo-600 px-7 md:px-16 lg:px-20 h-16 flex justify-center items-center w-auto">Details</a>
                </li>
                <li>
                    <a href="{{ route('staff-program-announcement', [$registeredprogram, $program]) }}" class="hover:bg-white hover:text-indigo-600 px-7 md:px-16 lg:px-20 h-16 flex justify-center items-center w-auto">Announcement</a>
                </li>
                <li>
                    <a href="{{ route('staff-program-material', [$registeredprogram, $program]) }}" class="hover:bg-white hover:text-indigo-600 px-7 md:px-16 lg:px-20 bg-white text-indigo-600 h-16 flex justify-center items-center w-auto">Materials</a>
                </li>
                <li>
                    <a href="{{ route('staff-program-feedback', [$registeredprogram, $program]) }}" class="hover:bg-white hover:text-indigo-600 px-7 md:px-16 lg:px-20 h-16 flex justify-center items-center w-auto">Feedback</a>
                </li>
            </ul>
        </div>
        <div class="block  w-full">
            <div class="mb-5 text-3xl font-bold text-gray-800 py-4 px-4 border-b border-gray-100 grid grid-cols-2">
                <h2 class="">
                    {{ __('Material') }}
                </h2>
                <button class="m-5 px-5 py-2 bg-green-400 rounded text-sm">Create Material</button>
            </div>
            <div class="p-3 mx-2" href="">
                <table class="w-full">
                    @foreach($trainingMaterial as $indexKey => $material)
                        @if($material->program_code == $program->code)
                            <tr class="grid-cols-1 rounded shadow-sm m-2">
                                <th class="w-auto py-5 px-2"><h2 class="text-left pl-10">{{$material->title}}</h2></th>
                                <th class="w-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </th>
                                <th class="w-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </th>
                                <th class="w-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </th>
                            </tr>
                        @endif
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
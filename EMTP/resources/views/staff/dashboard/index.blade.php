<x-app-layout title="Support">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Staff Dashbaord') }}
        </h2>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <!--Card list container-->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-1 mx-2">
            <!--card container-->
            <div  href="#" class="hover:bg-gray-100 lg:m-4 shadow-md hover:shadow-lg rounded-lg bg-white w-auto">
                <!-- Card Image -->
                <a class="hover:bg-blue-700" href="#">
                    <img src="" alt="fitness training" class="h-auto">
                    <!-- Card Content -->
                    <div class="p-4">
                        <h3 class="font-medium text-gray-600 text-lg my-2 uppercase">Test</h3>
                        <p class="text-justify">Description</p>
                        <div class="mt-5">
                            <span class="rounded-full py-2 px-3 font-semibold bg-gray-200 text-gray-800 ml-2">On-going</span>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>

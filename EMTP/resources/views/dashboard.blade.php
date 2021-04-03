<x-app-layout>
    <x-slot name="header">
        <!--Navigation bar design-->
        <nav
            class="flex items-center justify-between flex-wrap bg-white py-4 lg:px-12 shadow">
            <div class="flex justify-between lg:w-auto w-full lg:border-b-0 pl-6 pr-2 border-solid border-b-2 border-gray-300 pb-5 lg:pb-0">
                <div class="flex items-center flex-shrink-0 text-gray-800 mr-16">
                    <span class="font-semibold text-xl tracking-tight">EMTP</span>
                </div>
                <div class="block lg:hidden ">
                    <button
                        id="nav"
                        class="flex items-center px-3 py-2 border-2 rounded text-blue-700 border-blue-700 hover:text-blue-700 hover:border-blue-700">
                        <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title>
                            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/>
                        </svg>
                    </button>
                </div>
            </div>
            <!--navigation bar list-->
            <div class="menu w-full lg:block flex-grow lg:flex lg:items-center lg:w-auto lg:px-3 px-8">
                <div class="text-md font-bold text-blue-700 lg:flex-grow">
                    <a href="#responsive-header"
                    class="block mt-4 lg:inline-block lg:mt-0 hover:text-white px-4 py-2 rounded hover:bg-blue-700 mr-2">
                        Home
                    </a>
                    <a href="#responsive-header"
                    class=" block mt-4 lg:inline-block lg:mt-0 hover:text-white px-4 py-2 rounded hover:bg-blue-700 mr-2">
                        Programs
                    </a>
                    <a href="{{ __('dashboard') }}"
                    class=" block mt-4 lg:inline-block lg:mt-0 hover:text-white px-4 py-2 rounded hover:bg-blue-700 mr-2">
                        Dashboard
                    </a>
                    <a href="#responsive-header"
                    class="block mt-4 lg:inline-block lg:mt-0 hover:text-white px-4 py-2 rounded hover:bg-blue-700 mr-2">
                        About Us
                    </a>
                    <a href="#responsive-header"
                    class="block mt-4 lg:inline-block lg:mt-0 hover:text-white px-4 py-2 rounded hover:bg-blue-700 mr-2">
                        Support
                    </a>
                </div>
            </div>
        </nav>
        <!--Dashboard title-->
        <h1 class="font-semibold text-3xl text-gray-800 leading-tight mt-7 ml-3">Dashboard</h1>
        <!--content-->
        <div class="grid grid-cols-3 gap-1 place-items-stretch">
            <div href="" class="hover:bg-gray-100 lg:m-4 shadow-md hover:shadow-lg rounded-lg bg-white w-auto">
                <!-- Card Image -->
                <img src="https://www.dmarge.com/wp-content/uploads/2020/01/class-or-cult.jpg" alt="fitness training" class="h-auto">
                <!-- Card Content -->
                <div class="p-4">
                    <h3 class="font-medium text-gray-600 text-lg my-2 uppercase">TPE10003 Fitness Training</h3>
                    <p class="text-justify">Provides basic fitness training every Monday morning</p>
                    <div class="mt-5">
                        <span class="rounded-full py-2 px-3 font-semibold bg-gray-200 text-gray-800 ml-2">On-Going</span>
                    </div>
                </div>
            </div>
            <div href="" class="hover:bg-gray-100 lg:m-4 shadow-md hover:shadow-lg rounded-lg bg-white w-auto">
                <!-- Card Image -->
                <img src="https://s3.amazonaws.com/wp.bizlibrary.com/wp-content/uploads/2017/04/17155500/presentation-skills.jpg" alt="presentation training" class="h-auto">
                <!-- Card Content -->
                <div class="p-4">
                    <h3 class="font-medium text-gray-600 text-lg my-2 uppercase">TPA20020 Presentation Training</h3>
                    <p class="text-justify">Provides basic professional presentation training every Tuesday Afternoon</p>
                    <div class="mt-5">
                        <span class="rounded-full py-2 px-3 font-semibold bg-gray-200 text-gray-800 ml-2">On-Going</span>
                    </div>
                </div>
            </div>
            <div href="" class="hover:bg-gray-100 lg:m-4 shadow-md hover:shadow-lg rounded-lg bg-white w-auto">
                <!-- Card Image -->
                <img src="https://s3.amazonaws.com/wp.bizlibrary.com/wp-content/uploads/2017/04/17155500/presentation-skills.jpg" alt="presentation training" class="h-auto">
                <!-- Card Content -->
                <div class="p-4">
                    <h3 class="font-medium text-gray-600 text-lg my-2 uppercase">TPA20020 Presentation Training</h3>
                    <p class="text-justify">Provides basic professional presentation training every Tuesday Afternoon</p>
                    <div class="mt-5">
                        <span class="rounded-full py-2 px-3 font-semibold bg-gray-200 text-gray-800 ml-2">On-Going</span>
                    </div>
                </div>
            </div>
            <div href="" class="hover:bg-gray-100 lg:m-4 shadow-md hover:shadow-lg rounded-lg bg-white w-auto">
                <!-- Card Image -->
                <img src="https://s3.amazonaws.com/wp.bizlibrary.com/wp-content/uploads/2017/04/17155500/presentation-skills.jpg" alt="presentation training" class="h-auto">
                <!-- Card Content -->
                <div class="p-4">
                    <h3 class="font-medium text-gray-600 text-lg my-2 uppercase">TPA20020 Presentation Training</h3>
                    <p class="text-justify">Provides basic professional presentation training every Tuesday Afternoon</p>
                    <div class="mt-5">
                        <span class="rounded-full py-2 px-3 font-semibold bg-gray-200 text-gray-800 ml-2">On-Going</span>
                    </div>
                </div>
            </div>
            <div href="" class="hover:bg-gray-100 lg:m-4 shadow-md hover:shadow-lg rounded-lg bg-white w-auto">
                <!-- Card Image -->
                <img src="https://s3.amazonaws.com/wp.bizlibrary.com/wp-content/uploads/2017/04/17155500/presentation-skills.jpg" alt="presentation training" class="h-auto">
                <!-- Card Content -->
                <div class="p-4">
                    <h3 class="font-medium text-gray-600 text-lg my-2 uppercase">TPA20020 Presentation Training</h3>
                    <p class="text-justify">Provides basic professional presentation training every Tuesday Afternoon</p>
                    <div class="mt-5">
                        <span class="rounded-full py-2 px-3 font-semibold bg-gray-200 text-gray-800 ml-2">On-Going</span>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>

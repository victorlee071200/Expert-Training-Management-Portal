<x-app-layout title="Program">
    <div>
        <div class="bg-white sm:rounded-lg">
            {{-- put your content here --}}
            <div class="grid md:grid-cols-3">
                <!-- content wrapper-->
                <div class="flex md:justify-end">
                    <nav class="text-right">
                        <div class="flex justify-between items-center">
                            <h1 class="font-bold uppercase p-4 border-b border-gray-100">
                                <a href="/" class="hover:text-gray-700">Training Module Page</a>
                            </h1>
                            <div class="px-4 cursor-pointer md:hidden">
                                <svg class="w-6" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                            </div>
                        </div>
                        <ul class="text-sm mt-6 hidden md:block">
                            <li class="text-gray-700 font-bold py-1">
                                <a href="#" class="px-4 flex justify-end border-r-4 border-primary">
                                    <span>Latest</span>
                                </a>
                            </li>
                            <li class="py-1">
                                <a href="#" class="px-4 flex justify-end border-r-4 border-white">
                                    <span>Management</span>
                                </a>
                            </li>
                            <li class="py-1">
                                <a href="#" class="px-4 flex justify-end border-r-4 border-white">
                                    <span>Software</span>
                                </a>
                            </li>
                            <li class="py-1">
                                <a href="#" class="px-4 flex justify-end border-r-4 border-white">
                                    <span>Creative</span>
                                </a>
                            </li>
                            <li class="py-1">
                                <a href="#" class="px-4 flex justify-end border-r-4 border-white">
                                    <span>Jobs</span>
                                </a>
                            </li>
                            <li class="py-1">
                                <a href="#" class="px-4 flex justify-end border-r-4 border-white">
                                    <span>Communication</span>
                                </a>
                            </li>
                            <li class="py-1">
                                <a href="#" class="px-4 flex justify-end border-r-4 border-white">
                                    <span>Fitness</span>
                                </a>
                            </li>
                            <li class="py-1">
                                <a href="#" class="px-4 flex justify-end border-r-4 border-white">
                                    <span>Skills</span>
                                </a>
                            </li>
                            <li class="py-1">
                                <a href="#" class="px-4 flex justify-end border-r-4 border-white">
                                    <span>Lifestyle</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!--end nav-->

                <main class="px-16 py-6 bg-gray-100 md:col-span-2">
                    <header>
                        <h2 class="text-gray-700 text-6xl font-semibold">Training Programmes</h2>
                    </header>

                    <!--Search bar-->
                    <div class="w-auto h-11 bg-white flex border border-black border-width-2">
                        <!--Search Input-->
                        <input type="search" name="search" id="search" placeholder="Search for Training Program" class="border-none w-full"/>
                        <!--Search icon button-->
                        <button type="button" class="hover:bg-gray-100 py-2 px-5 border-l border-black">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6">
                                <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                    </div>
                                      
                    <div>
                        <h4 class="font-bold mt-12 pb-2 border-b border-gray-200">Latest Programmes</h4>

                        @foreach($approvedprograms as $program)
                        <a href="program/{{$program->id}}">
                        <div class="mt-8 grid lg:grid-cols-3 gap-10">
                            <!--cards go here-->
                            <div class="card hover:shadow-lg">
                                <img src="{{ asset('storage/program_thumbnails/'.$program->thumbnail_path)}}" alt="train1" class="w-full h-32 sm:h-48 object-cover">
                                <div class="m-4">
                                    <span class="font-bold">{{$program->code}} {{$program->name}}</span>
                                </div>
                                <div class="badge">
                                    <svg class="w-5 inline-block" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    <span>Price: ${{$program->price}}</span>
                                </div>
                            </div>
                        </div>
                        </a>
                        @endforeach

                        <h4 class="font-bold mt-12 pb-2 border-b border-gray-200">Most Popular</h4>

                        <div class="mt-8 grid lg:grid-cols-3 gap-10">
                            <!--cards go here-->
                            <div class="card hover:shadow-lg">
                                <img src="img/train1.jpg" alt="train1" class="w-full h-32 sm:h-48 object-cover">
                                <div class="m-4">
                                    <span class="font-bold">Training Programme 1</span>
                                </div>
                                <div class="badge">
                                    <svg class="w-5 inline-block" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    <span>Price: RM??</span>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-center">
                            <div
                                class="btn bg-secondary-100 text-secondary-200 hover:shadow-inner transform hover:scale-125 hover:bg-opacity-50 transition ease-out duration-300">
                                Load more</div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
</x-app-layout>

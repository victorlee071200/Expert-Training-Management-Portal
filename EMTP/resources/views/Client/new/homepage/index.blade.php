@extends('layouts.app')

@section('content')

    <div class="bg-cover bg-right-top md:bg-right-top h-auto sm:h-3/4 text-white py-24 px-10" style="background-image: url(https://i.ibb.co/8gbzPDJ/home-banner.jpg)">
        <div class="ml-5 md:ml-24 xl:ml-40 2xl:ml-60 bg-opacity-70 bg-gray-300 py-10 px-5 md:mr-40 lg:mr-60">
            <p class="font-bold text-sm uppercase text-black">Services</p>
            <p class="text-3xl md:text-4xl font-bold text-black mb-1">Training Programs</p>
            <p class="text-2xl md:text-3xl mb-10 leading-none text-black">Train for your future</p>
            <a href="#" class="bg-purple-800 py-4 px-8 text-white font-bold uppercase text-xs rounded hover:bg-gray-200 hover:text-gray-800">Learn more</a>
        </div>
    </div>

    <div class="bg-white">
        <section class="bg-white">
            <div class="max-w-5xl px-6 py-16 mx-auto">
                <div class="items-center md:flex md:space-x-6">
                    <div class="md:w-1/2">
                        <h3 class="text-2xl font-semibold text-gray-800">Provide Better Lives <br> Giving Opportunities</h3>
                        <p class="max-w-md mt-4 text-gray-600">EMTP is a training provider which provides in-house training
                            for companies or employees within Sarawak.</p>
                        <a href="/client/aboutus" class="block mt-8 text-indigo-700 underline">Learn More</a>
                    </div>

                    <div class="mt-8 md:mt-0 md:w-1/2">
                        <div class="flex items-center justify-center">
                            <div class="max-w-md">
                                <img class="object-cover object-center w-full rounded-md shadow" style="height: 500px;"
                                    src="https://images.unsplash.com/photo-1618346136472-090de27fe8b4?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=673&q=80">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-gray-800 text-white">
            <div class="max-w-5xl px-6 py-16 mx-auto space-y-8 md:flex md:items-center md:space-y-0">
                <div class="md:w-2/3">
                    <div class="hidden md:flex md:items-center md:space-x-10">
                        <img class="object-cover object-center rounded-md shadow w-72 h-72"
                            src="https://images.unsplash.com/photo-1614030126544-b79b92e29e98?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80">
                        <img class="object-cover object-center w-64 rounded-md shadow h-96"
                            src="https://images.unsplash.com/photo-1618506469810-282bef2b30b3?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80">
                    </div>
                    <h2 class="text-3xl font-semibold text-gray-800 md:mt-6">Lorem ipsum dolor </h2>
                    <p class="max-w-lg mt-4 ">
                        Duis aute irure dolor in reprehenderit in voluptate velit esse illum
                        dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                        officia
                        deserunt mollit anim id est laborum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                        non proident, sunt in culpa qui officia
                        deserunt mollit anim id est laborum.
                    </p>
                </div>
                <div class="md:w-1/3">
                    <img class="object-cover object-center w-full rounded-md shadow" style="height: 700px;"
                        src="https://images.unsplash.com/photo-1593352216840-1aee13f45818?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80">
                </div>
            </div>
        </section>

        <section class="bg-white">
            <div class="max-w-5xl px-6 py-16 mx-auto">
                <div class="items-center md:flex md:space-x-6">
                    <div class="md:w-1/2">
                        <div class="flex items-center justify-center">
                            <div class="max-w-md">
                                <img class="object-cover object-center w-full rounded-md shadow" style="height: 500px;"
                                    src="https://images.unsplash.com/photo-1616874535244-73aea5daadb9?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80">
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 md:mt-0 md:w-1/2">
                        <h3 class="text-2xl font-semibold text-gray-800">Lorem ipsum dolor sit <br> amet, consectetur</h3>
                        <p class="max-w-md mt-4 text-gray-600">
                            provide hands-on solutions through practical information sharing to
                            help solve day to day business challenges by developing human capitals that meets the company’s needs..
                        </p>
                        <a href="/client/program" class="block mt-8 text-indigo-700 underline">Learn More</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

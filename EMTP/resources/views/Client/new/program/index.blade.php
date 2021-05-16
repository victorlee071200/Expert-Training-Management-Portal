@extends('layouts.app')

@section('content')
    <style>
        .bg-image {
          background:url(https://images.unsplash.com/photo-1596079890744-c1a0462d0975?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1351&q=80);
          background-size:cover;
          background-repeat:no-repeat;
        }

        body {background:rgb(240, 240, 240) !important;}

      </style>
      <!-- section end -->

      <div class="section bg-image flex overflow-hidden h-screen text-gray-800">
        <div class="hero bg-gray-200 text-center grid md:grid-cols-2 border w-4/6 m-auto p-8 bg-opacity-90 rounded-lg">
          <img class="icon m-auto rounded-lg" src="https://images.unsplash.com/photo-1585336261022-680e295ce3fe?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="" />
          <div class="text m-auto text-lg md:ml-5 p-5 md:text-left">
            <div class="head text-3xl mb-3 font-semibold">Why Us ?</div>
            <div class="desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta minus excepturi facilis eveniet consequatur doloremque rerum pariatur, velit nemo debitis libero, iusto a sapiente veniam dolor culpa quibusdam sed laudantium.</div>
          </div>
        </div>
      </div>
      <!-- section end -->

<body class="antialiased md:bg-gray-100">

    <!--Parent div-->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
        <!--First card-->
        @foreach ($programs as $program)
        <div class="md:p-8 p-2 bg-white m-10">
            <!--Banner image-->
            <img class="rounded-lg w-full h-2/5" src = "{{ asset('storage/program_thumbnails/'.$program->thumbnail_path)}}">

            <div class="m-2">
                <!--Tag-->
                <p class="text-indigo-500 font-semibold text-base mt-2">{{ $program->code }}</p>
            </div>

            <div class="m-2">
                <!--Title-->
                <h1 class="font-semibold text-gray-900 leading-none text-xl mt-1 capitalize truncate">
                    {{ $program->name }}
                </h1>
            </div>

            <div class="m-2">
                <!--Description-->
                <div class="max-w-full">
                <p class="text-base font-medium tracking-wide text-gray-600 mt-1">
                {{ $program->description }}
                </p>
            </div>
            </div>

            <div class="m-2">
                <div class="flex items-center space-x-2 mt-20">
                    <button class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white transition bg-indigo-500 rounded shadow ripple hover:shadow-lg hover:bg-indigo-600 focus:outline-none">
                    <a href="{{ route('client.program.show', $program->id) }}">View More</a>
                    </button>
                </div>
            </div>
        </div>
        @endforeach


    </div>


    <div
      class="container mx-auto mt-20 grid grid-cols-1 gap-8 md:grid-cols-2 xl:grid-cols-3"
    >
        @foreach ($programs as $program)
        <div>
            <div class="rounded-lg overflow-hidden">
            <div class="relative overflow-hidden pb-60">
                <img class="absolute h-full w-full object-cover object-center" src = "{{ asset('storage/program_thumbnails/'.$program->thumbnail_path)}}">
            </div>
            <div class="relative bg-blue-200">
                <div class="py-10 px-8">
                <h3 class="text-2xl font-bold">{{ $program->name }}</h3>
                <div class="text-gray-600 text-sm font-medium flex mb-4 mt-2">
                    <a
                    href="#"
                    class="hover:text-black transition duration-300 ease-in-out"
                    >{{ $program->code }}</a
                    >
                </div>
                <p class="leading-7">
                    {{$program->description}}
                </p>
                <div class="mt-10 flex justify-between items-center">
                    <div class="w-6">

                    </div>
                    <a
                    href="/client/program/{{ $program->id }}"
                    class="flex items-center"
                    >
                    <p class="mr-4">Find out more</p>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="14.125"
                        height="13.358"
                        viewBox="0 0 14.125 13.358"
                    >
                        <g transform="translate(-3 -3.293)">
                        <path
                            id="Path_7"
                            data-name="Path 7"
                            d="M14.189,10.739H3V9.2H14.189L9.361,4.378l1.085-1.085,6.679,6.679-6.679,6.679L9.361,15.566Z"
                            fill="#1d1d1d"
                            fill-rule="evenodd"
                        ></path>
                        </g>
                    </svg>
                    </a>
                </div>
                </div>
            </div>
            </div>
        </div>
        @endforeach
    </div>
</body>
@endsection


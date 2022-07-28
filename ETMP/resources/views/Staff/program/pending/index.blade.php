@extends('layouts.admin')



@section('container')

    <div class="flex flex-col items-start justify-between pb-6 space-y-4 border-b lg:items-center lg:space-y-0 lg:flex-row">
        <h1 class="text-2xl font-semibold whitespace-nowrap">
            Dashboard | Program
        </h1>

        <div class="space-y-8 mb-6">
            <a href="{{ route('staff.program.index') }}" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-blue-500 rounded shadow ripple hover:shadow-lg hover:bg-indigo-600 focus:outline-none">
            Back
            </a>
        </div>
        {{-- <div class="space-y-8 mb-6">
            <a href="/admin/create/staff" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-indigo-500 rounded shadow ripple hover:shadow-lg hover:bg-indigo-600 focus:outline-none">
            Create
            </a>
        </div> --}}
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <section class="text-gray-700 body-font overflow-hidden bg-white">
                <div class="container px-5 py-24 mx-auto">
                <div class="lg:w-4/5 mx-auto flex flex-wrap">
                    <img alt="ecommerce" class="lg:w-1/2 w-full object-cover object-center rounded border border-gray-200" src = "{{ asset('storage/program_thumbnails/'.$program->thumbnail_path)}}" width="500" height="600">
                    <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                    <div class="m-6">
                        <h2 class="text-sm title-font text-gray-500 tracking-widest">Name</h2>
                        <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{$program->name}}</h1>
                    </div>

                    <div class="m-6">
                        <h2 class="text-sm title-font text-gray-500 tracking-widest">Option</h2>
                        <h1 class="text-gray-900 text-2xl title-font font-medium mb-1">{{$program->option}}</h1>
                    </div>

                    <div class="m-6">
                        <h2 class="text-sm title-font text-gray-500 tracking-widest">Type</h2>
                        <h1 class="text-gray-900 text-2xl title-font font-medium mb-1">{{$program->type}}</h1>
                    </div>

                    <div class="m-6">
                        <h2 class="text-xs title-font text-gray-500 tracking-widest">Description</h2>
                        <p class="leading-relaxed">{{ $program->description }}</p>
                    </div>

                    <div class="m-6">
                        <h2 class="text-xs title-font text-gray-500 tracking-widest">Price</h2>
                        <div class="flex">

                        <span class="title-font font-medium text-2xl text-gray-900">${{ $program->price }}</span>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </section>
            </div>
            </div>
        </div>
    </div>


@endsection





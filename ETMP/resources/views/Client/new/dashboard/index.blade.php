@extends('layouts.app')

@section('content')

    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg min-h-screen">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight px-32 py-5">
            {{ __('Dashboard') }}
        </h2>
        <!--Card list container-->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-1 mx-2">
            @foreach($registeredprograms as $indexKey => $program)
                <!--card container-->
                <div class="hover:bg-gray-100 lg:m-4 shadow-md hover:shadow-lg rounded-lg bg-white w-auto">
                    <!-- Card Image -->
                    <a class="hover:bg-blue-700" href="/client/dashboard/{{$program->program_id}}/detail">
                    <img src = "{{ asset('assets/program_thumbnails/'.$program_details[$indexKey]->thumbnail_path)}}" alt="fitness training" class="h-auto">
                    <!-- Card Content -->
                    <div class="p-4">
                        <h3 class="font-medium text-gray-600 text-lg my-2 uppercase">{{$program_details[$indexKey]->name}}</h3>
                        <p class="text-justify">{{substr($program_details[$indexKey]->description,0,100)}}...</p>
                        <div class="mt-5">
                            <span class="rounded-full py-2 px-3 font-semibold bg-gray-200 text-gray-800 ml-2">{{$program->status}}</span>
                        </div>
                    </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection

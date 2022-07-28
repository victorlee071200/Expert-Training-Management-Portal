@extends('layouts.admin')

@section('container')

<div class="bg-white sm:rounded-lg flex">
    <!-- side nav -->
    <div class="bg-gray-300 text-gray-800 hidden md:flex h-auto">
        <ul>
            <li>
                <a href="{{ route('staff.program-detail', $assignedprograms->program_id) }}" class="hover:bg-white hover:text-indigo-600 px-7 md:px-16 lg:px-20 h-16 flex justify-center items-center w-auto">Details</a>
            </li>
            <li>
                <a href="{{ route('staff.program-announcement', $assignedprograms->program_id) }}" class="hover:bg-white hover:text-indigo-600 px-7 md:px-16 lg:px-20 h-16 flex justify-center items-center w-auto">Announcement</a>
            </li>
            <li>
                <a href="{{ route('staff.program-material', $assignedprograms->program_id) }}" class="hover:bg-white hover:text-indigo-600 px-7 md:px-16 lg:px-20 bg-white text-indigo-600 h-16 flex justify-center items-center w-auto">Materials</a>
            </li>
            <li>
                <a href="{{ route('staff.program-feedback', $assignedprograms->program_id) }}" class="hover:bg-white hover:text-indigo-600 px-7 md:px-16 lg:px-20 h-16 flex justify-center items-center w-auto">Feedback</a>
            </li>
        </ul>
    </div>
    <div class="block w-full min-h-screen">
        <div class="mb-5 text-3xl font-bold text-gray-800 py-4 px-4 border-b border-gray-100 grid grid-cols-2">
            <h2 class="">
                {{$trainingMaterial->title}}
            </h2>
        </div>
        <div class="p-3 mt-2 mx-2">
            {{$trainingMaterial->content}}
        </div>
    </div>
</div>

@endsection

@extends('layouts.admin')

@section('container')

<div class="bg-white sm:rounded-lg flex">
    <div class="block w-full min-h-screen">
        <div class="mb-5 ml-3 text-3xl font-bold text-gray-800 py-4 px-4 border-b border-gray-100">
            <h2 class="">
                {{$announcement->title}}
            </h2>
            <p class="text-xs text-gray-400">Date created: {{$announcement->created_at}}</p>
            <p class="text-xs text-gray-400">Date updated: {{$announcement->updated_at}}</p>
        </div>
        <div class="px-5 py-2 mt-2 mx-2">
            {{$announcement->content}}
        </div>
        <div class="mt-5 mx-7">
            <a href="{{ route('admin.program-announcement', $program_details->id) }}">
                <button class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white transition bg-indigo-500 rounded shadow ripple hover:shadow-lg hover:bg-indigo-600 focus:outline-none">
                    Back
                </button>
            </a>
        </div>
    </div>
</div>

@endsection

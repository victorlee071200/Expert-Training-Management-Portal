@extends('layouts.admin')

@section('container')

<div class="bg-white sm:rounded-lg flex">
    <div class="block w-full min-h-screen">
        <div class="mb-5 text-3xl font-bold text-gray-800 py-4 px-4 border-b border-gray-100 grid grid-cols-2">
            <h2 class="">
                {{$announcement->title}}
            </h2>
        </div>
        <div class="p-3 mt-2 mx-2">
            {{$announcement->content}}
        </div>
    </div>
</div>

@endsection

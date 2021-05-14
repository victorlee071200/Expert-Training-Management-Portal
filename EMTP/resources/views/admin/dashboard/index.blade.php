@extends('layouts.admin')

@push('css')

@endpush

@section('container')

<div class="flex flex-col items-start justify-between pb-6 space-y-4 border-b lg:items-center lg:space-y-0 lg:flex-row">
    <h1 class="text-2xl font-semibold whitespace-nowrap">
        Welcome to your dashboard
    </h1>


  </div>

  <!-- Start Content Card -->
  <div class="grid grid-cols-1 gap-5 mt-6 sm:grid-cols-2 lg:grid-cols-4">
    <div class="p-4 transition-shadow border rounded-lg shadow-sm hover:shadow-lg">
        <div class="flex items-start justify-between">
            <div class="flex flex-col space-y-2">
                <span class="">Members</span>
                <span class="text-lg font-semibold">{{ $userCount }}</span>
            </div>
            <div class="p-10 bg-gray-200 rounded-md"></div>
        </div>
    </div>

    <div class="p-4 transition-shadow border rounded-lg shadow-sm hover:shadow-lg">
        <div class="flex items-start justify-between">
            <div class="flex flex-col space-y-2">
                <span class="">Programs</span>
                <span class="text-lg font-semibold">{{ $programCount }}</span>
            </div>
            <div class="p-10 bg-gray-200 rounded-md"></div>
        </div>
    </div>

    <div class="p-4 transition-shadow border rounded-lg shadow-sm hover:shadow-lg">
        <div class="flex items-start justify-between">
            <div class="flex flex-col space-y-2">
                <span class="">Total Sales</span>
                <span class="text-lg font-semibold">{{$currency}}{{$salesTotalSum}}</span>
            </div>
            <div class="p-10 bg-gray-200 rounded-md"></div>
        </div>
    </div>

    <div class="p-4 transition-shadow border rounded-lg shadow-sm hover:shadow-lg">
        <div class="flex items-start justify-between">
            <div class="flex flex-col space-y-2">
                <span class="">Total Orders</span>
                <span class="text-lg font-semibold">{{$orderSum}}</span>
            </div>
            <div class="p-10 bg-gray-200 rounded-md"></div>
        </div>
    </div>
  </div>


<h3 class="mt-6 text-xl">
    Dashboard
</h3>
<div class="p-3 mx-2">
    <table class="w-full">
        @foreach($program_details as $indexKey => $programs)
            <tr class="grid-cols-1 rounded shadow-sm m-2 hover:bg-gray-50">
                <th class="w-auto py-5 px-2 m-0">
                    <a href="{{ route('admin.program-announcement', $programs->id) }}">
                        <h2 class="text-left pl-10">{{$programs->code}} {{$programs->name}}</h2>
                    </a>
                </th>
                <th class="w-4">
                    <a href="">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                    </a>
                </th>
                <th class="w-4">
                    <form method="POST" action="">
                        @method('DELETE')
                        @csrf
                        <button id="submit" name="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </form>
                </th>
            </tr>
        @endforeach
    </table>
</div>
@endsection


@push('js')

@endpush


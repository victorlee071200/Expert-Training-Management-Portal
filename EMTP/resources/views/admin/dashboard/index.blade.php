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
@endsection


@push('js')

@endpush


@extends('layouts.admin')

@section('content-header-title')
  View | Support

@endsection

@section('table-title')
    Something
@endsection

@section('top-content-card')
<template x-for="i in 4" :key="i">
    <div class="p-4 transition-shadow border rounded-lg shadow-sm hover:shadow-lg">
    <div class="flex items-start justify-between">
        <div class="flex flex-col space-y-2">
        <span class="">Total Users</span>
        <span class="text-lg font-semibold">100,221</span>
        </div>
        <div class="p-10 bg-gray-200 rounded-md"></div>
    </div>
    <div>
        <span class="inline-block px-2 text-sm text-white bg-green-300 rounded">14%</span>
        <span>from 2019</span>
    </div>
    </div>
</template>
@endsection


@section('container')

<table class="min-w-full overflow-x-scroll divide-y divide-gray-200">
    <thead class="">
        <tr>
            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase">User</th>
            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase">Department</th>
            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase">Created At</th>
            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase">Updated At</th>
            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase">Action</th>
          </tr>
    </thead>
    <tbody class="divide-y divide-gray-200">
        @foreach ($clients as $client)
            <tr class="transition-all hover:shadow-lg">
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-medium">{{$client->name}}</div>
                    <div class="text-sm">{{ $client->email }}</div>

                    {{-- <div class="flex items-center">
                        <div class="flex-shrink-0 w-10 h-10">
                            <img class="w-10 h-10 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt=""/>
                        </div>

                    </div> --}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm">{{ $client->department }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">

                    <span class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">{{ $client->created_at }}</span>

                </td>
                <td class="px-6 py-4 text-sm whitespace-nowrap">
                    <span class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">{{ $client->updated_at }}</span>

                </td>




                <td class="px-6 py-4 text-sm whitespace-nowrap">
                    <a href="{{ route('admin.management.show', $client->id) }}" class="text-indigo-600 hover:text-indigo-900">View More</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection



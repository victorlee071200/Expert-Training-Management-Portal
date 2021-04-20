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
        <span class="text-gray-400">Total Users</span>
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
    <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">User</th>
            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Information</th>
            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Priority</th>
            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Status</th>
            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Assign To</th>
            <th scope="col" class="relative px-6 py-3"><span class="sr-only">Edit</span></th>
          </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($tickets as $ticket)
            <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 w-10 h-10">
                            <img class="w-10 h-10 rounded-full" src="https://avatars0.githubusercontent.com/u/57622665?s=460&u=8f581f4c4acd4c18c33a87b3e6476112325e8b38&v=4" alt=""/>
                        </div>
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">{{$ticket->name}}</div>
                            <div class="text-sm text-gray-500">{{ $ticket->email }}</div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ $ticket->subject }}</div>
                    <div class="text-sm text-gray-500">{{ $ticket->description }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">

                    @if ($ticket->priority == 'Low')
                        <span class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">{{ $ticket->priority }}</span>

                    @elseif ($ticket->priority == 'Medium')
                        <span class="inline-flex px-2 text-xs font-semibold leading-5 text-yellow-800 bg-yellow-100 rounded-full">{{ $ticket->priority }}</span>
                    @else
                        <span class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">{{ $ticket->priority }}</span>
                    @endif
                </td>
                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                    @if ($ticket->status == 'Open')
                        <span class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">{{ $ticket->status }}</span>

                    @else
                        <span class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">{{ $ticket->status }}</span>
                    @endif
                </td>

                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ $ticket->department }}</div>
                    <div class="text-sm text-gray-500">{{ $ticket->assign_to }}</div>
                </td>


                <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                    <a href="/admin/support/{{ $ticket->id }}" class="text-indigo-600 hover:text-indigo-900">View More</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection



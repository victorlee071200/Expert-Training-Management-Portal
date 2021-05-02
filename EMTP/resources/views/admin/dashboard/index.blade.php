@extends('layouts.admin')

@section('content-header-title')
  View | Dashboard

@endsection

@section('table-title')
    Something
@endsection

@section('table-head')
<tr>
  <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Title</th>
  <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Description</th>
  <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Priority</th>
  <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Status</th>
  <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Assign</th>
  <th scope="col" class="relative px-6 py-3"><span class="sr-only">Edit</span></th>
</tr>

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

@section('table-body')
<template x-for="i in 10" :key="i">
    <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
        <td class="px-6 py-4 whitespace-nowrap">
        <div class="flex items-center">
            <div class="flex-shrink-0 w-10 h-10">
            <img
                class="w-10 h-10 rounded-full"
                src="https://avatars0.githubusercontent.com/u/57622665?s=460&u=8f581f4c4acd4c18c33a87b3e6476112325e8b38&v=4"
                alt=""
            />
            </div>
            <div class="ml-4">
            <div class="text-sm font-medium text-gray-900">Ahmed Kamel</div>
            <div class="text-sm text-gray-500">ahmed.kamel@example.com</div>
            </div>
        </div>
        </td>
        <td class="px-6 py-4 whitespace-nowrap">
        <div class="text-sm text-gray-900">Regional Paradigm Technician</div>
        <div class="text-sm text-gray-500">Optimization</div>
        </td>
        <td class="px-6 py-4 whitespace-nowrap">
        <span
            class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full"
        >
            Active
        </span>
        </td>
        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">Admin</td>
        <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
        <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
        </td>
    </tr>
</template>

@endsection

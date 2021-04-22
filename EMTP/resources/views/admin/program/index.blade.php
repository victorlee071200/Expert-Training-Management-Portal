@extends('layouts.admin')



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


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="m-10">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                      {{ __('Pending Program List') }}
                    </h2>
                    <div class="bg-white shadow-md rounded my-6">
                        <table class="min-w-max w-full table-auto">
                            <thead>
                                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">Name</th>
                                    <th class="py-3 px-6 text-left">Type</th>
                                    <th class="py-3 px-6 text-center">Status</th>
                                    <th class="py-3 px-6 text-center">Option</th>
                                    <th class="py-3 px-6 text-center">Created Date</th>
                                    <th class="py-3 px-6 text-center">Actions</th>
                                </tr>
                            </thead>
                            @foreach($pendingprograms as $program)
                            <tbody class="text-gray-600 text-sm font-light ">
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="py-3 px-6 text-left whitespace-nowrap">
                                        <div class="flex items-center">
                                            <span class="font-medium " href="/admin/view/program/{{$program->id}}">{{$program->name}}</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center ">
                                            <span class="bg-blue-200 text-blue-600 py-1 px-3 rounded-full text-xs">{{ $program->type }}</span>
                                        </div>
                                    </td>
                                    {{-- <td class="py-3 px-6 text-center">
                                        <div class="flex items-center justify-center">
                                            <img class="w-6 h-6 rounded-full border-gray-200 border transform hover:scale-125" src="https://randomuser.me/api/portraits/men/1.jpg"/>
                                            <img class="w-6 h-6 rounded-full border-gray-200 border -m-1 transform hover:scale-125" src="https://randomuser.me/api/portraits/women/2.jpg"/>
                                            <img class="w-6 h-6 rounded-full border-gray-200 border -m-1 transform hover:scale-125" src="https://randomuser.me/api/portraits/men/3.jpg"/>
                                        </div>
                                    </td> --}}
                                    <td class="py-3 px-6 text-center">
                                        <span class="bg-yellow-200 text-yellow-600 py-1 px-3 rounded-full text-xs">{{ $program->status }}</span>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <span class="bg-pink-200 text-pink-600 py-1 px-3 rounded-full text-xs">{{ $program->option }}</span>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <span class="bg-indigo-200 text-indigo-600 py-1 px-3 rounded-full text-xs">{{ $program->created_at }}</span>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex item-center justify-center">
                                            <a class="font-medium " href="/admin/view/program/{{$program->id}}">
                                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                </div>
                                            </a>
                                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </div>
                                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>

                <div class="m-10">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                      {{ __('Approved Program List') }}
                    </h2>

                    <div class="bg-white shadow-md rounded my-6">
                        <table class="min-w-max w-full table-auto">
                            <thead>
                                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">Name</th>
                                    <th class="py-3 px-6 text-left">Type</th>
                                    <th class="py-3 px-6 text-center">Status</th>
                                    <th class="py-3 px-6 text-center">Option</th>
                                    <th class="py-3 px-6 text-center">Created Date</th>
                                    <th class="py-3 px-6 text-center">Actions</th>
                                </tr>
                            </thead>
                            @foreach($approvedprograms as $program)
                            <tbody class="text-gray-600 text-sm font-light">
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="py-3 px-6 text-left whitespace-nowrap">
                                        <div class="flex items-center">
                                            <span class="font-medium " href="/admin/view/program/{{$program->id}}">{{$program->name}}</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center ">
                                            <span class="bg-blue-200 text-blue-600 py-1 px-3 rounded-full text-xs">{{ $program->type }}</span>
                                        </div>
                                    </td>
                                    {{-- <td class="py-3 px-6 text-center">
                                        <div class="flex items-center justify-center">
                                            <img class="w-6 h-6 rounded-full border-gray-200 border transform hover:scale-125" src="https://randomuser.me/api/portraits/men/1.jpg"/>
                                            <img class="w-6 h-6 rounded-full border-gray-200 border -m-1 transform hover:scale-125" src="https://randomuser.me/api/portraits/women/2.jpg"/>
                                            <img class="w-6 h-6 rounded-full border-gray-200 border -m-1 transform hover:scale-125" src="https://randomuser.me/api/portraits/men/3.jpg"/>
                                        </div>
                                    </td> --}}
                                    <td class="py-3 px-6 text-center">
                                        <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">{{ $program->status }}</span>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <span class="bg-pink-200 text-pink-600 py-1 px-3 rounded-full text-xs">{{ $program->option }}</span>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <span class="bg-indigo-200 text-indigo-600 py-1 px-3 rounded-full text-xs">{{ $program->created_at }}</span>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex item-center justify-center">
                                            <a class="font-medium " href="/admin/view/approved/program/{{$program->id}}">
                                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                </div>
                                            </a>
                                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </div>
                                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                            @endforeach
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>


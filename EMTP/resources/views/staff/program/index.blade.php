@extends('layouts.admin')


@section('container')

<div class="flex flex-col items-start justify-between pb-6 space-y-4 border-b lg:items-center lg:space-y-0 lg:flex-row">
    <h1 class="text-2xl font-semibold whitespace-nowrap">
        Dashboard | Program
    </h1>


    <div class="space-y-8 mb-6">
        <a href="{{ route('staff.program.create') }}" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-indigo-500 rounded shadow ripple hover:shadow-lg hover:bg-indigo-600 focus:outline-none">
        Create
        </a>
    </div>
  </div>

  <!-- Start Content Card -->
  <div class="grid grid-cols-1 gap-5 mt-6 sm:grid-cols-2 lg:grid-cols-4">
    <template x-for="i in 4" :key="i">
        <div class="p-4 transition-shadow border rounded-lg shadow-sm hover:shadow-lg">
        <div class="flex items-start justify-between">
            <div class="flex flex-col space-y-2">
            <span class="">Total Uses</span>
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
</div>

<h3 class="mt-6 text-xl">
    Pending Program List
</h3>


<div class="flex flex-col mt-6">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
            <div class="overflow-hidden border-b border-gray-200 rounded-md shadow-md">

                <table class="min-w-full overflow-x-scroll divide-y divide-gray-200">
                    <thead class="">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase">Name/Code</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-center uppercase">Type</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-center uppercase">Length (days)</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-center uppercase">Price</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-center uppercase">Action</th>
                            </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($pending as $program)
                            <tr class="transition-all hover:shadow-lg">
                                <td class="px-6 py-4 whitespace-nowrap text-left">
                                    <div class="text-sm font-medium">{{$program->name}}</div>
                                    <div class="text-sm">{{ $program->code }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <div class="text-sm">{{ $program->type }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">

                                    <span class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">{{ $program->length }}</span>

                                </td>
                                <td class="px-6 py-4 text-sm whitespace-nowrap text-center">
                                    <span class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">{{ $program->price }}</span>

                                </td>

                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <a class="font-medium " href="{{ url('/staff/program/pending/'. $program->id) }}">
                                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </div>
                                        </a>
                                        <a class="font-medium " href="{{ url('/staff/program/pending/edit/'. $program->id) }}">
                                            <div class="w-4 mr-2 transform hover:text-yellow-500 hover:scale-110">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </div>
                                        </a>
                                        <button type="button" class="w-4 mr-2 transform hover:text-red-500 hover:scale-110"
                                         onclick="event.preventDefault();
                                         document.getElementById('delete-user-form-{{ $program->id }}').submit();
                                        ">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        </button>

                                        <form id="delete-user-form-{{ $program->id }}" action="{{ route('staff.program.destroy', $program->id) }}" method="POST" style="display: none">
                                            @csrf
                                            @method('DELETE')

                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<h3 class="mt-6 text-xl">
    In-Charge Program List
</h3>

<div class="flex flex-col mt-6">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
            <div class="overflow-hidden border-b border-gray-200 rounded-md shadow-md">

                <table class="min-w-full overflow-x-scroll divide-y divide-gray-200">
                    <thead class="">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase">Company</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-center uppercase">Program Code</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-center uppercase">Program Name</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-center uppercase">Status</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-center uppercase">Action</th>
                            </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($incharge as $index => $program)
                            <tr class="transition-all hover:shadow-lg">
                                <td class="px-6 py-4 whitespace-nowrap text-left">
                                    <div class="text-sm font-medium">{{$program->company_name}}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <div class="text-sm">{{ $inchargedetails[$index]->code }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">

                                    <span class="text-sm font-medium">{{ $inchargedetails[$index]->name }}</span>

                                </td>
                                <td class="px-6 py-4 text-sm whitespace-nowrap text-center">
                                    <span class="inline-flex px-2 text-xs font-semibold leading-5 bg-green-100 rounded-full">{{ $program->status }}</span>

                                </td>

                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <a class="font-medium " href="{{ url('/staff/program/approve/'. $program->id) }}">
                                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </div>
                                        </a>

                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<h3 class="mt-6 text-xl">
    Approved Program List
</h3>

<div class="flex flex-col mt-6">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
            <div class="overflow-hidden border-b border-gray-200 rounded-md shadow-md">

                <table class="min-w-full overflow-x-scroll divide-y divide-gray-200">
                    <thead class="">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase">Name/Code</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-center uppercase">Type</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-center uppercase">Length (days)</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-center uppercase">Price</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-center uppercase">Action</th>
                            </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($approved as $program)
                            <tr class="transition-all hover:shadow-lg">
                                <td class="px-6 py-4 whitespace-nowrap text-left">
                                    <div class="text-sm font-medium">{{$program->name}}</div>
                                    <div class="text-sm">{{ $program->code }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <div class="text-sm">{{ $program->type }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">

                                    <span class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">{{ $program->length  }}</span>

                                </td>
                                <td class="px-6 py-4 text-sm whitespace-nowrap text-center">
                                    <span class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">{{ $program->price }}</span>

                                </td>

                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <a class="font-medium " href="{{ url('/staff/program/approved/'. $program->id) }}">
                                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </div>
                                        </a>
                                        
                                        <a class="font-medium " href="{{ url('/staff/program/pending/edit/'. $program->id) }}">
                                            <div class="w-4 mr-2 transform hover:text-yellow-500 hover:scale-110">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </div>
                                        </a>

                                        <button type="button" class="w-4 mr-2 transform hover:text-red-500 hover:scale-110"
                                         onclick="event.preventDefault();
                                         document.getElementById('delete-user-form-{{ $program->id }}').submit();
                                        ">

                                        
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        </button>

                                        

                                        <form id="delete-user-form-{{ $program->id }}" action="{{ route('staff.program.destroy', $program->id) }}" method="POST" style="display: none">
                                            @csrf
                                            @method('DELETE')

                                        </form>

                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>




@endsection







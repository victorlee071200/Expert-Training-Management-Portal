<x-app-layout title="Registered Program List">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registered Program List') }}
        </h2>
    </x-slot>

    <div class="m-10">
        {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Registered Program List') }}
        </h2> --}}
        <div class="bg-white shadow-md rounded my-6">
            <table class="min-w-max w-full table-auto">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-center">Code</th>
                        <th class="py-3 px-6 text-center">Name</th>
                        <th class="py-3 px-6 text-center">Option</th>
                        <th class="py-3 px-6 text-center">Status</th>
                        <th class="py-3 px-6 text-center">Actions</th>
                    </tr>
                </thead>
                @foreach($registeredprograms as $indexKey => $program)
                <tbody class="text-gray-600 text-sm font-light ">
                    <tr class="border-b border-gray-200 hover:bg-gray-100">

                        <td class="py-3 px-6 text-center whitespace-nowrap">
                            <span class="font-medium " href="/admin/view/program/{{$program->id}}">{{ $programdetails[$indexKey]->code }}</span>
                        </td>

                        <td class="py-3 px-6 text-center">
                            <span>{{ $programdetails[$indexKey]->name }}</span>
                        </td>

                        <td class="py-3 px-6 text-center">
                            <span>{{ $program->option }}</span>
                        </td>

                        <td class="py-3 px-6 text-center">
                            <span class="bg-indigo-200 text-indigo-600 py-1 px-3 rounded-full text-xs">{{ $program->status}}</span>
                        </td>

                        <td class="py-3 px-6 text-center">
                            <div class="flex item-center justify-center">
                                <a class="font-medium" href="registered/{{$program->id}}/{{$programdetails[$indexKey]->id}}/detail">
                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </div>
                                </a>

                <table class="table table-striped">
                    <tbody>
                    @foreach($registeredprograms as $indexKey => $program)
                    <tr>
                        <td>
                            <a class="hover:bg-blue-700" href="registered/{{$program->id}}/{{$programdetails[$indexKey]->id}}">
                            <img src = "{{ asset('storage/program_thumbnails/'.$programdetails[$indexKey]->thumbnail_path)}}" width="500" height="600">
                            {{$programdetails[$indexKey]->name}}
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>


            </div>
        </div>
    </div>
  </x-app-layout>

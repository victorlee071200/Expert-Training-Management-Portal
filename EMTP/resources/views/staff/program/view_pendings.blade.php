<x-app-layout title="Client Programs List">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Client Programs List') }}
        </h2>
    </x-slot>
  
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h1>Client Programs List</h1>

                <table class="table table-striped">
                    <tbody>
                    @foreach($registeredprograms as $indexKey => $program)
                    <tr>
                        <td>
                            <a class="hover:bg-blue-700" href="pending/{{$program->id}}/{{$programdetails[$indexKey]->id}}">
                            <img src = "{{ asset('storage/program_thumbnails/'.$programdetails[$indexKey]->thumbnail_path)}}" width="500" height="600">
                            {{$programdetails[$indexKey]->name}} -
                            {{$program->company_name}}
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
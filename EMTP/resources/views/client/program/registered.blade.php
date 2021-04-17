<x-app-layout title="Registered Program List">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registered Program List') }}
        </h2>
    </x-slot>
  
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h1>Registered Program List</h1>

                <table class="table table-striped">
                    <tbody>
                    @foreach($registeredprograms as $indexKey => $program)
                    <tr>
                        <td><a class="hover:bg-blue-700" href="registeredprograms/{{$program->id}}/{{$programdetails[$indexKey]->id}}">{{$programdetails[$indexKey]->name}}</a> </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                
                
            </div>
        </div>
    </div>
  </x-app-layout>
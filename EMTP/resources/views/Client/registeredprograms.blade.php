@extends('layout')
@section('title', 'Client Registered Program')
@section('content')

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

{{-- <a href="cars/create">Add New Car</a> --}}

@endsection
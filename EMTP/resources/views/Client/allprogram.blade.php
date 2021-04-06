@extends('layout')
@section('title', 'Client View Program')
@section('content')

<h1>Program List</h1>

<table class="table table-striped">
    <tbody>
    @foreach($approvedprograms as $program)
    <tr>
        <td><a class="hover:bg-blue-700" href="programs/{{$program->id}}">{{$program->name}}</a> </td>
    </tr>
    @endforeach
    </tbody>
</table>

{{-- <a href="cars/create">Add New Car</a> --}}

@endsection
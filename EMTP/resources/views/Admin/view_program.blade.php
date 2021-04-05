@extends('layout')
@section('title', 'Admin View Program')
@section('content')

<h1>Pending Program List</h1>

<table class="table table-striped">
    <tbody>
    @foreach($pendingprograms as $program)
    <tr>
        <td><a class="hover:bg-blue-700" href="programs/{{$program->id}}">{{$program->name}}</a> </td>
    </tr>
    @endforeach
    </tbody>
</table>

<div class="my-8">
    <h1>Program List</h1>
    <table class="table table-striped">
    <tbody>
    @foreach($approvedprograms as $program)
    <tr>
        <td><a class="hover:bg-blue-700" href="programs/edit/{{$program->id}}">{{$program->name}}</a> </td>
    </tr>
    @endforeach
    </tbody>
    </table>
</div>

{{-- <a href="cars/create">Add New Car</a> --}}

@endsection
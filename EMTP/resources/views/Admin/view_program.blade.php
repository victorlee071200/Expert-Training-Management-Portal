@extends('layout')
@section('title', 'Admin View Program')
@section('content')

<h1>Program List</h1>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
        </tr>
    </thead>
    <tbody>
    @foreach($programs as $program)
    <tr>
        <td><a href="{{$program->id}}">{{$program->name}}</a> </td>
    </tr>
    @endforeach
    </tbody>
</table>
<hr>
{{-- <a href="cars/create">Add New Car</a> --}}

@endsection
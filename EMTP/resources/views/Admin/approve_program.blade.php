@extends('layout')
@section('title', 'This is our home')
@section('content')

<h1>Show Program</h1>

<div>
  <h1>Name: {{$program->name}}</h1>
</div>

<p>
  <strong>Type: {{$program->type}}</strong>
</p>

<p>
  <strong>Price: {{$program->price}}</strong>
</p>

<p>
  <strong>Option: {{$program->option}}</strong>
</p>

<p>
  <strong>Description: {{$program->description}}</strong>
</p>

{{-- <a href="{{$car->id}}/edit">Edit Car</a> --}}


@endsection
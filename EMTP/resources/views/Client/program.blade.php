@extends('layout')
@section('title', 'This is our home')
@section('content')
<h1>Register Program</h1>

<div>
  <h1>Program Name: {{$program->name}}</h1>
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

<a class="hover:bg-blue-700" href="{{$program->id}}/register">Register</a>

@endsection
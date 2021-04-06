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

<form class="form-horizontal" method="post">
  @csrf
  @method('put')
  <!-- Button -->
  <div class="form-group">
      <label class="col-md-4 control-label" for="submit"></label>
      <div class="col-md-4">
        <button id="submit" name="submit" class="btn btn-primary">Approve</button>
      </div>
  </div>
</form>

<!-- To-Do Reject -->
{{-- <form class="form-horizontal" method="post" action="Admin/progrms/{{$program->id}}">
  @csrf
  @method('put')
  <!-- Button -->
  <div class="form-group">
    <label class="col-md-4 control-label" for="submit"></label>
    <div class="col-md-4">
      <button id="submit" name="submit" class="btn btn-primary">Reject</button>
    </div>
  </div>
</form> --}}

@endsection
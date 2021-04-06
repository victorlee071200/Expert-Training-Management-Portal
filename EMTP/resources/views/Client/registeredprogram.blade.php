@extends('layout')
@section('title', 'This is our home')
@section('content')

<h1>Program Details</h1>

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

<h1 class="mt-8">Other Details</h1>

<p>Email: {{$registeredprogram->client_email}}</p>

<p>
<strong>Company Name: {{$registeredprogram->company_name}}</strong>
</p>

<p>
<strong>Venue: {{$registeredprogram->client_venue}}</strong>
</p>

<p>
<strong>Number of employees: {{$registeredprogram->no_of_employees}}</strong>
</p>

<p>
<strong>Payment Type: {{$registeredprogram->payment_type}}</strong>
</p>

<p>
    <strong>Payment Status: {{$registeredprogram->payment_status}}</strong>
</p>

<p>
    <strong>Start Date: {{$registeredprogram->start_date}}</strong>
</p>

<p>
    <strong>End Date: {{$registeredprogram->end_date}}</strong>
</p>

<p>
    <strong>Notes: {{$registeredprogram->client_notes}}</strong>
</p>

<p>
    <strong>Status: {{$registeredprogram->status}}</strong>
</p>
@endsection
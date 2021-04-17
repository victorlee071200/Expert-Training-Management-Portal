<x-app-layout title="Register Program Page">
  <h1>Register Program</h1>
  <h1>Program Name: {{$program->name}}</h1>
  <p><strong>Type: {{$program->type}}</strong></p>
  <p><strong>Price: {{$program->price}}</strong></p>
  <p><strong>Option: {{$program->option}}</strong></p>
  <p><strong>Description: {{$program->description}}</strong></p>
  <a class="hover:bg-blue-700" href="{{$program->id}}/register">Register</a>
</x-app-layout>
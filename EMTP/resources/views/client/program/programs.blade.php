<x-app-layout title="Register Program">
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Register Program') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
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
              
              
          </div>
      </div>
  </div>
</x-app-layout>
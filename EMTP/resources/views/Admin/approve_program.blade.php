<x-app-layout title="About Us">
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('About Us') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
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
              
          </div>
      </div>
  </div>
</x-app-layout>
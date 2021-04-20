<x-app-layout title="Registered Program Detail">
  <div class="bg-white sm:rounded-lg flex">
    <!-- side nav -->
    <div class="bg-gray-300 text-gray-700 shadow flex">
      <ul>
        <li class="hover:bg-white px-10">
          <a href="" class="h-16 px-6 flex justify-center items-center w-auto focus:text-orange-500 focus:bg-white">Details</a>
        </li>
        <li class="hover:bg-white px-10">
          <a href="." class="h-16 px-6 flex justify-center items-center w-auto focus:text-orange-500 focus:bg-white">Announcement</a>
        </li>
        <li class="hover:bg-white px-10">
          <a href="." class="h-16 px-6 flex justify-center items-center w-auto focus:text-orange-500 focus:bg-white">Materials</a>
        </li>
        <li class="hover:bg-white px-10">
          <a href="." class="h-16 px-6 flex justify-center items-center w-auto focus:text-orange-500 focus:bg-white">Feedback</a>
        </li>
      </ul>
    </div>
    <div class="text-gray-700 body-font bg-white px-5 py-5">
      <h2 class="text-4xl font-bold text-gray-800 border-b border-gray-100 w-auto">
        {{ __('Program Detail') }}
      </h2>
      <img alt="ecommerce" class="rounded border border-gray-200 m-10" src="{{ asset('storage/program_thumbnails/'.$program->thumbnail_path)}}" width="500" height="600">
      <div class="title-font text-2xl text-gray-900">
        <p>Code: {{$program->code}}</p>
        <p>Name: {{$program->name}}</p>
        <p>Option: {{$program->option}}</p>
        <p>Type: {{$program->type}}</p>
        <p>Description: {{ $program->description }}</p>
        <p>Price: ${{ $program->price }}</p>
        <p>Email: {{$registeredprogram->client_email}}</p>
        <p>Company Name: {{$registeredprogram->company_name}}</p>
        <p>Number of employees: {{$registeredprogram->no_of_employees}}</p>
        <p>Mode: {{$registeredprogram->option}}</p>
        <p>Payment Type: {{$registeredprogram->payment_type}}</p>
        <p>Payment Status: {{$registeredprogram->payment_status}}</p>
        <p>Start Date: {{$registeredprogram->start_date}}</p>
        <p>End Date: {{$registeredprogram->end_date}}</p>
        <p>Notes: {{$registeredprogram->client_notes}}</p>
        <p>Status: {{$registeredprogram->status}}</p>
      </div>
    </div>
  </div>
</x-app-layout>

{{-- <div class="m-6">
  <form class="form-horizontal" method="post">
    @csrf
    @method('put')
    <!-- Button -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="submit"></label>
        <div class="col-md-4">
          <button id="submit" name="submit" class="block tracking-widest uppercase text-center shadow bg-green-400 hover:bg-green-500 focus:shadow-outline focus:outline-none text-white text-xs py-3 px-10 rounded">Approve</button>
        </div>
    </div>
  </form>
</div> --}}
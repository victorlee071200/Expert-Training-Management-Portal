<x-app-layout title="Client Specific Registered Program - Detail">
  <div class="bg-white sm:rounded-lg flex">
    <!-- side nav -->
    <div class="bg-gray-300 text-gray-800 flex h-auto">
      <ul>
        <li>
          <a href="{{ route('client-program-detail', [$registeredprogram, $program]) }}" class="hover:bg-white hover:text-indigo-600 px-7 md:px-16 lg:px-20 bg-white text-indigo-600 h-16 flex justify-center items-center w-auto">Details</a>
        </li>
        <li>
          <a href="{{ route('client-program-announcement', [$registeredprogram, $program]) }}" class="hover:bg-white hover:text-indigo-600 px-7 md:px-16 lg:px-20 h-16 flex justify-center items-center w-auto">Announcement</a>
        </li>
        <li>
          <a href="{{ route('client-program-material', [$registeredprogram, $program]) }}" class="hover:bg-white hover:text-indigo-600 px-7 md:px-16 lg:px-20 h-16 flex justify-center items-center w-auto">Materials</a>
        </li>
        <li>
          <a href="{{ route('client-program-feedback', [$registeredprogram, $program]) }}" class="hover:bg-white hover:text-indigo-600 px-7 md:px h-16 lg:px-20 -16 flex justify-center items-center w-auto">Feedback</a>
        </li>
      </ul>
    </div>
    <div class="text-gray-700 body-font bg-white w-full">
      <h2 class="text-3xl font-bold text-gray-800 py-4 px-4 pb-2 border-b border-gray-100 w-auto">
        {{ __('Program Detail') }}
      </h2>
      <img alt="ecommerce" class="rounded border border-gray-200 m-10 h-auto" src="{{ asset('storage/program_thumbnails/'.$program->thumbnail_path)}}">
      <div class="title-font text-2xl text-gray-900 px-10"> 
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
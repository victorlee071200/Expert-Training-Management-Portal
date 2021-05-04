<x-app-layout title="Client Specific Registered Program - Detail">
  <div class="bg-white sm:rounded-lg flex">
    <!-- side nav -->
    <div class="bg-gray-300 text-gray-800 hidden md:flex h-auto">
      <ul>
        <li>
          <a href="{{ route('staff-program-detail', [$assignedprogram, $program]) }}" class="hover:bg-white hover:text-indigo-600 px-7 md:px-16 lg:px-20 bg-white text-indigo-600 h-16 flex justify-center items-center w-auto">Details</a>
        </li>
        <li>
          <a href="{{ route('staff-program-announcement', [$assignedprogram, $program]) }}" class="hover:bg-white hover:text-indigo-600 px-7 md:px-16 lg:px-20 h-16 flex justify-center items-center w-auto">Announcement</a>
        </li>
        <li>
          <a href="{{ route('staff-program-material', [$assignedprogram, $program]) }}" class="hover:bg-white hover:text-indigo-600 px-7 md:px-16 lg:px-20 h-16 flex justify-center items-center w-auto">Materials</a>
        </li>
        <li>
          <a href="{{ route('staff-program-feedback', [$assignedprogram, $program]) }}" class="hover:bg-white hover:text-indigo-600 px-7 md:px h-16 lg:px-20 -16 flex justify-center items-center w-auto">Feedback</a>
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

      @if ($registeredprogram->status == "to-be-confirmed")
      <div class="form-group md:flex md:items-center ml-10">
        <div class="md:w-1/3">
          <label class="col-md-4 control-label" for="submit"></label>
          <div class="col-md-4">
            <a href = "{{ url('/registered/' . $registeredprogram->id . '/confirm') }}">
            <button id="submit" name="submit" class="shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline bg-indigo-400 focus:outline-none text-gray-200 hover:bg-indigo-600 hover:text-white font-bold py-2 px-4 rounded" >Confirm</button>
            </a>
          </div>
        </div>
        <div class="md:w-2/3"></div>
      </div>
      @endif

    </div>
  </div>
</x-app-layout>

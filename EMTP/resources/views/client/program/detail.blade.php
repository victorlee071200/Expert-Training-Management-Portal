<x-app-layout title="Training Detail Page">
  <div class="h-screen flex bg-gray-200">
    <!-- container -->
    <aside class="flex flex-col items-center bg-white text-gray-700 shadow h-full">
      <!-- Side Nav Bar-->
      <ul>
        <!-- Items Section -->
        <li class="hover:bg-gray-100">
          <a href="." class="h-16 px-6 flex justify-center items-center w-full focus:text-orange-500">Announcement</a>
        </li>

        <li class="hover:bg-gray-100">
          <a href="." class="h-16 px-6 flex justify-center items-center w-full focus:text-orange-500">Details</a>
        </li>

        <li class="hover:bg-gray-100">
          <a href="." class="h-16 px-6 flex justify-center items-center w-full focus:text-orange-500">Materials</a>
        </li>

        <li class="hover:bg-gray-100">
          <a href="." class="h-16 px-6 flex justify-center items-center w-full focus:text-orange-500">Feedback</a>
        </li>
      </ul>
    </div>
    <div class="text-gray-700 body-font bg-white w-full min-h-screen">
      <h2 class="text-3xl font-bold text-gray-800 py-4 px-4 pb-2 border-b border-gray-100 w-auto">
        {{ __('Program Detail') }}
      </h2>
      <div class="title-font text-2xl text-gray-900 px-10 mt-5">
        <p class="text-3xl font-semibold">{{$program->code}} {{$program->name}} ({{$program->type}})</p>
        <p class="text-gray-600 text-base">Time Period: {{$registeredprogram->start_date}} - {{$registeredprogram->end_date}} Mode: {{$program->option}}</p>
        <img alt="ecommerce" class="rounded border border-gray-200 h-auto" src="{{ asset('storage/program_thumbnails/'.$program->thumbnail_path)}}">
        <p class="my-5">{{ $program->description }}</p>
        <p>Price: ${{ $program->price }}</p>
        <p class="text-3xl font-semibold mt-5">Contact</p>
        <p>Company Name: {{$registeredprogram->company_name}}</p>
        <p>Email: {{$registeredprogram->client_email}}</p>
        <p>Number of employees: {{$registeredprogram->no_of_employees}}</p>
        <p>Mode: {{$registeredprogram->option}}</p>
        <p>Payment Type: {{$registeredprogram->payment_type}}</p>
        <p>Payment Status: {{$registeredprogram->payment_status}}</p>
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

      <h1 class="mt-8">Other Details</h1>
      <p>Email: {{$registeredprogram->client_email}}</p>
      <p><strong>Company Name: {{$registeredprogram->company_name}}</strong></p>
      <p><strong>Venue: {{$registeredprogram->client_venue}}</strong></p>
      <p><strong>Number of employees: {{$registeredprogram->no_of_employees}}</strong></p>
      <p><strong>Payment Type: {{$registeredprogram->payment_type}}</strong></p>
      <p><strong>Payment Status: {{$registeredprogram->payment_status}}</strong></p>
      <p><strong>Start Date: {{$registeredprogram->start_date}}</strong></p>
      <p><strong>End Date: {{$registeredprogram->end_date}}</strong></p>
      <p><strong>Notes: {{$registeredprogram->client_notes}}</strong></p>
      <p><strong>Status: {{$registeredprogram->status}}</strong></p>
    </div>
  </div>
</x-app-layout>

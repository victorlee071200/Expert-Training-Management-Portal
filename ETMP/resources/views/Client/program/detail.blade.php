@extends('layouts.app')

@section('content')

<div class="bg-white sm:rounded-lg flex">
    <!-- side nav -->
    <div class="bg-gray-300 text-gray-800 hidden md:flex h-auto">
        <ul>
            <li>
                <a href="{{ route('client.program-detail', $registeredprograms->program_id) }}" class="hover:bg-white hover:text-indigo-600 bg-white text-indigo-600  px-7 md:px-16 lg:px-20 h-16 flex justify-center items-center w-auto">Details</a>
            </li>
            <li>
                <a href="{{ route('client.program-announcement', $registeredprograms->program_id) }}" class="hover:bg-white hover:text-indigo-600 px-7 md:px-16 lg:px-20 h-16 flex justify-center items-center w-auto">Announcement</a>
            </li>
            <li>
                <a href="{{ route('client.program-material', $registeredprograms->program_id) }}" class="hover:bg-white hover:text-indigo-600 px-7 md:px-16 lg:px-20 h-16 flex justify-center items-center w-auto">Materials</a>
            </li>
            <li>
                <a href="{{ route('client.program-feedback', $registeredprograms->program_id) }}" class="hover:bg-white hover:text-indigo-600 px-7 md:px-16 lg:px-20 h-16 flex justify-center items-center w-auto">Feedback</a>
            </li>
        </ul>
    </div>
    <div class="block w-full min-h-screen">
        <div class="mb-5">
            <h2 class="text-3xl font-bold text-gray-800 py-4 px-4 pb-2 border-b border-gray-100 w-auto">
                {{ __('Program Detail') }}
            </h2>
        </div>
        <div class="p-3 mx-2">
            <p class="text-3xl font-semibold">{{$program_details->code}} {{$program_details->name}} ({{$program_details->type}})</p>
            <p class="text-gray-600 text-base">Time Period: {{$registeredprograms->start_date}} - {{$registeredprograms->end_date}} Mode: {{$program_details->option}}</p>
            <img alt="ecommerce" class="rounded border border-gray-200 h-auto" src="{{ asset('assets/program_thumbnails/'.$program_details->thumbnail_path)}}">
            <p class="my-5">{{ $program_details->description }}</p>
            <p>Price: ${{ $program_details->price }}</p>
            <p class="text-3xl font-semibold mt-5">Contact</p>
            <p>Company Name: {{$registeredprograms->company_name}}</p>
            <p>Venue: {{$registeredprograms->client_venue}}</p>
            <p>Email: {{$registeredprograms->client_email}}</p>
            <p>Number of employees: {{$registeredprograms->no_of_employees}}</p>
            <p>Mode: {{$registeredprograms->option}}</p>
            <p>Payment Type: {{$registeredprograms->payment_type}}</p>
            <p>Payment Status: {{$registeredprograms->payment_status}}</p>
            <p>Notes: {{$registeredprograms->client_notes}}</p>
            <p>Status: {{$registeredprograms->status}}</p>

            @if ($registeredprograms->status == "to-be-confirmed")
                <div class="form-group md:flex md:items-center ml-10">
                    <div class="md:w-1/3">
                        <label class="col-md-4 control-label" for="submit"></label>
                        <div class="col-md-4">
                            <a href = "{{ url('/registered/' . $registeredprograms->id . '/confirm') }}">
                                <button id="submit" name="submit" class="shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline bg-indigo-400 focus:outline-none text-gray-200 hover:bg-indigo-600 hover:text-white font-bold py-2 px-4 rounded" >Confirm</button>
                            </a>
                        </div>
                    </div>
                    <div class="md:w-2/3"></div>
                </div>
            @endif
        </div>
    </div>
</div>

@endsection

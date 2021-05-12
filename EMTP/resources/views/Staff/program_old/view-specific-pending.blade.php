<x-app-layout title="View Specific Pending Program">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Staff | View Speficic Pending Program') }}
        </h2>
    </x-slot>
  
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

              <img alt="ecommerce" class="rounded border border-gray-200 m-10 h-auto" src="{{ asset('storage/program_thumbnails/'.$program->thumbnail_path)}}">
              <div class="title-font text-2xl text-gray-900 px-10"> 
                <p>Code: {{$program->code}}</p>
                <p>Name: {{$program->name}}</p>
                <p>Option: {{$program->option}}</p>
                <p>Type: {{$program->type}}</p>
                <p>Description: {{ $program->description }}</p>
                <p>Price: ${{ $program->price }}</p>
                <p>Email: {{$pendingprogram->client_email}}</p>
                <p>Company Name: {{$pendingprogram->company_name}}</p>
                <p>Number of employees: {{$pendingprogram->no_of_employees}}</p>
                <p>Mode: {{$pendingprogram->option}}</p>
                <p>Payment Type: {{$pendingprogram->payment_type}}</p>
                <p>Payment Status: {{$pendingprogram->payment_status}}</p>
                <p>Start Date: {{$pendingprogram->start_date}}</p>
                <p>End Date: {{$pendingprogram->end_date}}</p>
                <p>Notes: {{$pendingprogram->client_notes}}</p>
                <p>Status: {{$pendingprogram->status}}</p> 
              </div>

              <div class="m-5">
                <div class="col-md-4">
                  <button type="submit" id="submit" name="submit" >
                    <a href="{{ route('staff-approve-specific', [$pendingprogram->id,"0"]) }}" class="block tracking-widest uppercase text-center shadow bg-blue-400 hover:bg-blue-500 focus:shadow-outline focus:outline-none text-white text-xs py-3 px-10 rounded">
                      Approve
                    </a>
                  </button>
                </div>
              </div>

              </section>
              </div>              
            </div>
        </div>
    </div>
  </x-app-layout>

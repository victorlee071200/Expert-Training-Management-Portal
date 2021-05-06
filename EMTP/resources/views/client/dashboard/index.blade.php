<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
    <!--Card list container-->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-1 mx-2">
      @foreach($registeredprograms as $indexKey => $program)
        @if($program->status == "approved")
          <!--card container-->
          <div class="hover:bg-gray-100 lg:m-4 shadow-md hover:shadow-lg rounded-lg bg-white w-auto">
            <!-- Card Image -->
            <a class="hover:bg-blue-700" href="/client/view/registered/{{$program->id}}/{{$programdetails[$indexKey]->id}}/detail">
              <img src = "{{ asset('storage/program_thumbnails/'.$programdetails[$indexKey]->thumbnail_path)}}" alt="fitness training" class="h-auto">
              <!-- Card Content -->
              <div class="p-4">
                <h3 class="font-medium text-gray-600 text-lg my-2 uppercase">{{$programdetails[$indexKey]->name}}</h3>
                <p class="text-justify">{{$programdetails[$indexKey]->description}}</p>
                <div class="mt-5">
                  <span class="rounded-full py-2 px-3 font-semibold bg-gray-200 text-gray-800 ml-2">{{$program->status}}</span>
                </div>
              </div>
            </a>
          </div>
        @else
          <!--card container-->
          <div class="lg:m-4 shadow-md hover:shadow-lg rounded-lg bg-gray-50 w-auto">
            <!-- Card Image -->
            <a class="hover:bg-blue-700" href="/client/view/registered/{{$program->id}}/{{$programdetails[$indexKey]->id}}/detail">
            <img src = "{{ asset('storage/program_thumbnails/'.$programdetails[$indexKey]->thumbnail_path)}}" alt="fitness training" class="h-auto">
            <!-- Card Content -->
            <div class="p-4">
              <h3 class="font-medium text-gray-600 text-lg my-2 uppercase">{{$programdetails[$indexKey]->name}}</h3>
              <p class="text-justify">{{$programdetails[$indexKey]->description}}</p>
              <div class="mt-5">
                <span class="rounded-full py-2 px-3 font-semibold bg-gray-200 text-gray-800 ml-2">{{$program->status}}</span>
              </div>
            </div>
            </a>
          </div>
        @endif
      @endforeach
    </div>
  </div>
</x-app-layout>

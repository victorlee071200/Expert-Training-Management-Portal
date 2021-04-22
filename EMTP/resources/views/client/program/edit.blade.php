<x-app-layout title="Client Specific Registered Program - Edit">
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
      <div class="text-gray-700 body-font bg-white w-full" onload="calculateTotalPrice()">
        <h2 class="text-3xl font-bold text-gray-800 py-4 px-4 pb-2 border-b border-gray-100 w-auto">
          {{ __('Program Detail') }}
        </h2>
        <img alt="ecommerce" class="rounded border border-gray-200 m-10 h-auto" src="{{ asset('storage/program_thumbnails/'.$program->thumbnail_path)}}">
        <div class="title-font text-2xl text-gray-900 px-10"> 
          <p>Code: {{$program->code}}</p>
          <p>Name: {{$program->name}}</p>
          <p class="capitalize">Option: {{$program->option}}</p>
          <p>Type: {{$program->type}}</p>
          <p>Description: {{ $program->description }}</p>
          <p>Price: ${{ $program->price }}</p>
          <p>Email: {{$registeredprogram->client_email}}</p>
          <p>Company Name: {{$registeredprogram->company_name}}</p>
          <p id="total_price">Total Price: </p>
          <p>Payment Type: {{$registeredprogram->payment_type}}</p>
          <p>Payment Status: {{$registeredprogram->payment_status}}</p>
          <p>Notes: {{$registeredprogram->client_notes}}</p>
          <p>Status: {{$registeredprogram->status}}</p> 
        </div>

        <form class="px-10 mt-10" method="post" class="w-full max-w-lg" enctype="multipart/form-data">
            @csrf
      
            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="no_of_employees">
                  Number of employees
                </label>
                <input id="no_of_employees" name="no_of_employees" type="number" value="{{$registeredprogram->no_of_employees}}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" required autofocus autocomplete="no_of_employees">
              </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="option">
                  Option
                  </label>
                  <div class="relative">
                  <select onchange="myFunction()" id="option" name="option" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    @if ($program->option == "both")
                        <option value='online'>Online</option>
                        <option value='physical'>Physical</option>

                    @elseif ($program->option == "online") 
                        <option value='online'>Online</option>

                    @elseif ($program->option == "physical") 
                    <option value='physical'>Physical</option>

                    @endif
                  </select>
                            
                  </div>
              </div>
            </div>
            
            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="client_venue">
                  Venue
                </label>
                <x-jet-input id="client_venue" value="{{$registeredprogram->client_venue}}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" name="client_venue" required autofocus autocomplete="client_venue" />
              </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="start_date">
                  Start Date
                </label>
                <input id="start_date" name="start_date" type="date" value= "{{$registeredprogram->start_date}}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" required autofocus>
              </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="end_date">
                  End Date
                </label>
                <input id="end_date" name="end_date" type="date" value= "{{$registeredprogram->end_date}}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" required autofocus>
              </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="client_notes">
                  Notes
                </label>
                <textarea id="client_notes" name="client_notes" class="resize appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-48" required autofocus></textarea>

              </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="payment_type">
                  Payment Type
                </label>
                <div class="relative">
                  <select id="payment_type" name="payment_type" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                      <option value="credit/debit card">Credit/Debit Card</option>
                      <option value="online banking">Online Banking</option>
                      <option value="cash">Cash</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="form-group md:flex md:items-center">
              <div class="md:w-1/3">
                <label class="col-md-4 control-label" for="submit"></label>
                <div class="col-md-4">
                  <button id="submit" name="submit" class="shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline bg-indigo-400 focus:outline-none text-gray-200 hover:bg-indigo-600 hover:text-white font-bold py-2 px-4 rounded" >Edit</button>
                </div>
              </div>
              <div class="md:w-2/3"></div>
            </div>

          </form>
        </div>  

      </div>
    </div>
  </x-app-layout>
  
  <script>
    function calculateTotalPrice() {
      var text = document.getElementById("total_price");
      var totalprice = {{ $program->price }} * {{$registeredprogram->no_of_employees}};
        
      text.innerHTML = "Total Price: $" + totalprice;

      document.getElementById("client_notes").value = "{{$registeredprogram->client_notes}}";
    }

    function myFunction() {
      var option = document.getElementById("option").value;
      var venue = document.getElementById("client_venue");

      if (option == "online"){
        venue.disabled = true;
        venue.placeholder = "Online";
        venue.required = false;
        venue.value = "Online";
      }
  
      else if (option == "physical"){
        venue.disabled = false;
        venue.placeholder = "";
        venue.required = true;
        venue.value = "";
      }
    }

    window.onload = myFunction();
    window.onload = calculateTotalPrice();
  </script> 

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
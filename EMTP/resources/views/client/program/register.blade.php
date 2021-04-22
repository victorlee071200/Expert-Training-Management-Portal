<x-app-layout title="Client Register Program">
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Client | Register program') }}
      </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">        
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <div class="m-10">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              {{ __('Register Program') }}
            </h2>

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              {{$program->code}} {{$program->name}}
            </h2>

          </div>
          <div class="m-10">
            
            <form method="post" action="register" class="w-full max-w-lg" enctype="multipart/form-data">
              @csrf
        
              <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="no_of_employees">
                    Number of employees
                  </label>
                  <input id="no_of_employees" name="no_of_employees" type="number" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" required autofocus autocomplete="no_of_employees">
                </div>
              </div>

              <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="option">
                    Option
                    </label>
                    <div class="relative">
                    <select onchange="myFunction()" id="option" name="option" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                      @foreach ($options as $option)
                      <option value={{$option}}>{{$option}}</option>
                      @endforeach
                    </select>
                              
                    </div>
                </div>
              </div>
              
              <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="client_venue">
                    Venue
                  </label>
                  <x-jet-input id="client_venue" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" name="client_venue" required autofocus autocomplete="client_venue" />
                </div>
              </div>

              <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="start_date">
                    Start Date
                  </label>
                  <input id="start_date" name="start_date" type="date" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" required autofocus>
                </div>
              </div>

              <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="end_date">
                    End Date
                  </label>
                  <input id="end_date" name="end_date" type="date" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" required autofocus>
                </div>
              </div>

              <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="client_notes">
                    Notes
                  </label>
                  <textarea required id="client_notes" name="client_notes" type="text" class="resize appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-48" required autofocus autocomplete="description"></textarea>

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
                    <button id="submit" name="submit" class="shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline bg-indigo-400 focus:outline-none text-gray-200 hover:bg-indigo-600 hover:text-white font-bold py-2 px-4 rounded" >Submit</button>
                  </div>
                </div>
                <div class="md:w-2/3"></div>
              </div>

            </form>
          </div>            
        </div>
    </div>
</div>

</x-app-layout>

<script>

  function myFunction() {
    var option = document.getElementById("option").value;
    var venue = document.getElementById("client_venue");

    if (option == "Online"){
      venue.disabled = true;
      venue.placeholder = "Online";
      venue.required = false;
      venue.value = "Online";
    }

    else if (option == "Physical"){
      venue.disabled = false;
      venue.placeholder = "";
      venue.required = true;
      venue.value = "";
    }
  }

  window.onload = myFunction();
  </script>




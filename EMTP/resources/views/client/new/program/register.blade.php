@extends('layouts.app')

@section('content')

<div class="py-12">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="m-10">

        <h1 class="text-3xl">Register Program</h1>

        <div class="my-4 text-2xl">
          <h1>Program Name: {{$program->name}}</h1>
        </div>

        <form method="POST" action="/program/register" class="w-full max-w-lg">
          @csrf


          <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="price">
                Number of Employees <span class="text-red-600">*</span>
              </label>
              <input id="no_of_employees" name="no_of_employees" type="number" min=1 class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            </div>
          </div>

          <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="option">
                Option <span class="text-red-600">*</span>
                </label>
                <div class="relative">
                <select onchange="myFunction()" id="option" name="option" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                  @if ($program->option == "both")

                  <option value='online'>Online</option>
                  <option value='physical'>Physical</option>

                  @elseif($program->option == "online")
                  <option value='online'>Online</option>

                  @elseif($program->option == "physical")
                  <option value='physical'>Physical</option>

                  @endif
                </select>
                          
                </div>
            </div>
          </div>

          <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="type">
                Venue <span class="text-red-600">*</span>
              </label>
              <input id="client_venue" name="client_venue" type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            </div>
          </div>

          <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="price">
                Start Date <span class="text-red-600">*</span>
              </label>
              <input id="start_date" name="start_date" type="date" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            </div>
          </div>

          <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="price">
                End Date <span class="text-red-600">*</span>
              </label>
              <input id="end_date" name="end_date" type="date" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            </div>
          </div>

          <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="option">
                Payment Option <span class="text-red-600">*</span>
                </label>
                <div class="relative">
                <select id="payment_type" name="payment_type" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <option value="cash">Cash</option>
                    <option value="online banking">Online Banking</option>
                    <option value="credit/debit card">Credit/Debit Card</option>
                </select>

                </div>
            </div>
          </div>

          <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="description">
                  Notes <span class="text-red-600">*</span>
                </label>
                <input id="client_notes" name="client_notes" type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
              </div>
          </div>

          <input type="hidden" id="programid" name="programid" value={{$program->id}}>

          <div class="form-group">
              <label class="col-md-4 control-label" for="submit"></label>
              <div class="col-md-4">
                <button id="submit" name="submit" class="btn btn-primary">Submit</button>
              </div>
          </div>

        </form>

        </div>
      </div>
  </div>
</div>

<script>

  function myFunction() {
    var option = document.getElementById("option").value;
    var venue = document.getElementById("client_venue");

    if (option == "online"){
      venue.disabled = true;
      venue.placeholder = "online";
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
</script>

@endsection
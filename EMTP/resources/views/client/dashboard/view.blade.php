<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
    <!--Card list container-->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-1 place-items-stretch ">
      <!--card container-->
      <div href="program_detail" class="hover:bg-gray-100 lg:m-4 shadow-md hover:shadow-lg rounded-lg bg-white w-auto">
        <!-- Card Image -->
        <img src="https://www.dmarge.com/wp-content/uploads/2020/01/class-or-cult.jpg" alt="fitness training" class="h-auto">
        <!-- Card Content -->
        <div class="p-4">
          <h3 class="font-medium text-gray-600 text-lg my-2 uppercase">TPE10003 Fitness Training</h3>
          <p class="text-justify">Provides basic fitness training every Monday morning</p>
          <div class="mt-5">
            <span class="rounded-full py-2 px-3 font-semibold bg-gray-200 text-gray-800 ml-2">On-Going</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>

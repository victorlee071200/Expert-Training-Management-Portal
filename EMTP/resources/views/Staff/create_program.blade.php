<x-app-layout title="Staff | Create Program">
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Staff') }}
    </h2>
      
  </x-slot>

  <x-jet-validation-errors class="mb-4" />

  

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">        
          <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="m-10">
              <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Staff | Create Program') }}
              </h2>

            </div>
            <div class="m-10">
              
              <form method="post" class="w-full max-w-lg" action="create_program">
                @csrf

                
                {{-- <div class="flex flex-wrap -mx-3 mb-6">
                  <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                      First Name
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Jane">

                  </div>
                  <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                      Last Name
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Doe">
                  </div>
                </div> --}}
                <div class="flex flex-wrap -mx-3 mb-6">
                  <div class="w-full px-3">
                    <label class="block mb-2 text-sm text-gray-600 dark:text-gray-400" for="name">
                      Name
                    </label>
                    <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                  </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                  <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="type">
                      Type
                    </label>
                    <input id="type" name="type" type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" required autofocus autocomplete="type">
                  </div>
              </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                  <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="price">
                      Price
                    </label>
                    <input id="price" name="price" type="number" step="0.01" min=0 class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" required autofocus autocomplete="price">
                  </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                  <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="option">
                      Option
                      </label>
                      <div class="relative">
                      <select id="option" name="option" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                          <option value="online">Online Only</option>
                          <option value="physical">Physical Only</option>
                          <option value="both">Both</option>
                      </select>
          
                      </div>
                </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                  <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="description">
                      Description
                    </label>
                    <textarea required id="description" name="description" type="text" class="resize appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-48" required autofocus autocomplete="description"></textarea>

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
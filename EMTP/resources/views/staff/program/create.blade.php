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
                  {{ __('Create Program') }}
                </h2>
  
              </div>
              <div class="m-10">
                
                <form method="post" action="/staff/create/program" class="w-full max-w-lg" enctype="multipart/form-data">
                  @csrf
              
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
                        Name
                      </label>
                      <x-jet-input id="name" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    </div>
                  </div>

                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="code">
                        Code
                      </label>
                      <x-jet-input id="code" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" name="code" required autofocus autocomplete="name" />
                    </div>
                  </div>
  
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="type">
                        Type
                      </label>
                      <input id="type" name="type" type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" required autofocus autocomplete="code">
                    </div>
                 </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                  <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="length">
                      Length(Days)
                    </label>
                    <input id="length" name="length" type="number" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" required autofocus autocomplete="length">
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
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="thumbnail">
                        Thumbnail
                      </label>
                      <input type="file" id="thumbnail" name="thumbnail">
  
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
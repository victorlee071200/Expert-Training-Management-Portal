<x-app-layout title="About Us">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin | Approve or Reject') }}
        </h2>
    </x-slot>
  
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
              <section class="text-gray-700 body-font overflow-hidden bg-white">
                <div class="container px-5 py-24 mx-auto">
                  <div class="lg:w-4/5 mx-auto flex flex-wrap">
                    <img alt="ecommerce" class="lg:w-1/2 w-full object-cover object-center rounded border border-gray-200" src = "{{ asset('storage/program_thumbnails/'.$program->thumbnail_path)}}" width="500" height="600"> 
                    <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">

                      <div class="m-6">
                        <h2 class="text-sm title-font text-gray-500 tracking-widest">Code</h2>
                        <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{$program->code}}</h1>
                      </div>

                      <div class="m-6">
                        <h2 class="text-sm title-font text-gray-500 tracking-widest">Name</h2>
                        <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{$program->name}}</h1>
                      </div>

                      <div class="m-6">
                        <h2 class="text-sm title-font text-gray-500 tracking-widest">Option</h2>
                        <h1 class="text-gray-900 text-2xl title-font font-medium mb-1">{{$program->option}}</h1>
                      </div>

                      <div class="m-6">
                        <h2 class="text-sm title-font text-gray-500 tracking-widest">Type</h2>
                        <h1 class="text-gray-900 text-2xl title-font font-medium mb-1">{{$program->type}}</h1>
                      </div>

                      <div class="m-6">
                        <h2 class="text-xs title-font text-gray-500 tracking-widest">Description</h2>
                        <p class="leading-relaxed">{{ $program->description }}</p>
                      </div>

                      <div class="m-6">
                        <h2 class="text-xs title-font text-gray-500 tracking-widest">Price</h2>
                        <div class="flex">
                          
                          <span class="title-font font-medium text-2xl text-gray-900">${{ $program->price }}</span>
                        </div>
                      </div>                      

                      <div class="m-6">
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
                      </div>
                    </div>
                  </div>
                </div>
              </section>
              </div>     
            </div>
        </div>
    </div>
  </x-app-layout>
<x-app-layout title="About Us">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Client | View Speficic Available Programs') }}
        </h2>
    </x-slot>
  
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

              <section class="text-gray-700 body-font overflow-hidden bg-white">
                <div class="container px-5 py-24 mx-auto">
                  <div class="lg:w-4/5 mx-auto flex flex-wrap">
                    <img alt="ecommerce" class="lg:w-1/2 w-full object-cover object-center rounded border border-gray-200" src = "{{ asset('storage/program_thumbnails/'.$program->thumbnail_path)}}"> 
                    <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">

                      <div class="m-5">
                        <h2 class="text-sm title-font text-gray-500 tracking-widest">Code</h2>
                        <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{$program->code}}</h1>
                      </div>

                      <div class="m-5">
                        <h2 class="text-sm title-font text-gray-500 tracking-widest">Name</h2>
                        <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{$program->name}}</h1>
                      </div>

                      <div class="m-5">
                        <h2 class="text-sm title-font text-gray-500 tracking-widest">Option</h2>
                        <h1 class="text-gray-900 text-2xl title-font font-medium mb-1 capitalize">{{$program->option}}</h1>
                      </div>

                      <div class="m-5">
                        <h2 class="text-sm title-font text-gray-500 tracking-widest">Type</h2>
                        <h1 class="text-gray-900 text-2xl title-font font-medium mb-1">{{$program->type}}</h1>
                      </div>

                      <div class="m-5">
                        <h2 class="text-xs title-font text-gray-500 tracking-widest">Description</h2>
                        <p class="leading-relaxed">{{ $program->description }}</p>
                      </div>

                      <div class="m-5">
                        <h2 class="text-xs title-font text-gray-500 tracking-widest">Price</h2>
                        <div class="flex">
                          <span class="title-font font-medium text-2xl text-gray-900">${{ $program->price }}</span>
                        </div>
                      </div>                      

                      <h2 class="m-5 text-gray-900 text-2xl title-font font-medium mb-1" id=text></h2>

                      <div class="m-5">
                        <div class="col-md-4">
                          <button type="submit" id="submit" name="submit" >
                            <a href="{{$program->id}}/register" class="block tracking-widest uppercase text-center shadow bg-blue-400 hover:bg-blue-500 focus:shadow-outline focus:outline-none text-white text-xs py-3 px-10 rounded">
                              Register
                            </a>
                          </button>
                        </div>
                      </div>

                      <div class="m-5">
                        <div class="col-md-4">
                          <button hidden type="button" id="view" name="view" >
                            @if (!($clientprogram->isEmpty()))
                              <a href="/client/view/registered/{{$clientprogram[0]->id}}/{{$program->id}}/detail" class="block tracking-widest uppercase text-center shadow bg-blue-400 hover:bg-blue-500 focus:shadow-outline focus:outline-none text-white text-xs py-3 px-10 rounded">
                                View
                              </a>
                            @endif
                          </button>
                        </div>
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

  <script>
        function update() {
          var submitbutton = document.getElementById("submit");
          var viewbutton = document.getElementById("view");

          if ("{{$registered}}"){
            submit.hidden = true;
            viewbutton.hidden = false;
            document.getElementById("text").innerHTML = "Registered";
          } else {
            viewbutton.hidden = true;
          }
      
        }
        
        window.onload = update;
    </script>
@extends('layouts.admin')


@section('container')

<div class="flex flex-col items-start justify-between pb-6 space-y-4 border-b lg:items-center lg:space-y-0 lg:flex-row">
    <h1 class="text-2xl font-semibold whitespace-nowrap">
        User details
    </h1>
</div>

<div class="py-12">
    <div class="max-w-full mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <section class="text-gray-700 body-font overflow-hidden bg-white">
            <div class="container px-5 py-24 mx-auto">
              <div class="lg:w-4/5 mx-auto flex flex-wrap">
                {{-- <img alt="ecommerce" class="lg:w-1/2 w-full object-cover object-center rounded border border-gray-200" src = "{{ asset('storage/user_thumbnails/'.$user->thumbnail_path)}}" width="500" height="600"> --}}
                <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                  <div class="m-6">
                    <h2 class="text-sm title-font text-gray-500 tracking-widest">Name</h2>
                    <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{$user->name}}</h1>
                  </div>

                  <div class="m-6">
                    <h2 class="text-sm title-font text-gray-500 tracking-widest">Email</h2>
                    <h1 class="text-gray-900 text-2xl title-font font-medium mb-1">{{$user->email}}</h1>
                  </div>

                  <div class="m-6">
                    <h2 class="text-sm title-font text-gray-500 tracking-widest">Company Name</h2>
                    <h1 class="text-gray-900 text-2xl title-font font-medium mb-1">{{$user->company_name}}</h1>
                  </div>

                  <div class="m-6">
                    <h2 class="text-xs title-font text-gray-500 tracking-widest">Created At</h2>
                    <p class="leading-relaxed">{{ $user->created_at }}</p>
                  </div>

                  <div class="m-6">
                    <h2 class="text-xs title-font text-gray-500 tracking-widest">Updated At</h2>
                    <p class="leading-relaxed">{{ $user->updated_at }}</p>
                  </div>

                  <div class="m-6">
                    <h2 class="text-xs title-font text-gray-500 tracking-widest">Usertype</h2>
                    <div class="flex">

                      <span class="title-font font-medium text-2xl text-gray-900">{{ $user->usertype }}</span>
                    </div>
                  </div>

                  <div class="m-6">
                    <a href="/admin/view/user" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-blue-500 rounded shadow ripple hover:shadow-lg hover:bg-indigo-600 focus:outline-none">
                        Back
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </section>
          </div>
        </div>
    </div>
</div>




@endsection






@extends('layouts.admin')

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/node-waves@0.7.6/dist/waves.min.css" />
@endsection

@section('content-header-title')
  View | Support

@endsection

@section('table-title')
    Title
@endsection

{{-- @section('top-content-card')
<template x-for="i in 4" :key="i">
    <div class="p-4 transition-shadow border rounded-lg shadow-sm hover:shadow-lg">
    <div class="flex items-start justify-between">
        <div class="flex flex-col space-y-2">
        <span class="text-gray-400">Total Users</span>
        <span class="text-lg font-semibold">100,221</span>
        </div>
        <div class="p-10 bg-gray-200 rounded-md"></div>
    </div>
    <div>
        <span class="inline-block px-2 text-sm text-white bg-green-300 rounded">14%</span>
        <span>from 2019</span>
    </div>
    </div>
</template>
@endsection --}}


@section('container')

<section class="text-gray-700 body-font overflow-hidden bg-white">
    <div class="container px-5 py-24 mx-auto">
      <div class="lg:w-4/5 mx-auto flex flex-wrap">
        <img alt="ecommerce" class="lg:w-1/2 w-full object-cover object-center rounded border border-gray-200" src = "{{ asset('storage/ticket_thumbnails/'.$ticket->thumbnail_path)}}">
        <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
            <div class="m-6">
                <h2 class="text-sm title-font text-gray-500 tracking-widest">Client Name</h2>
                <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{$ticket->name}}</h1>
              </div>

              <div class="m-6">
                <h2 class="text-sm title-font text-gray-500 tracking-widest">Client Email</h2>
                <h1 class="text-gray-900 text-2xl title-font font-medium mb-1">{{$ticket->email}}</h1>
              </div>

              <div class="m-6">
                <h2 class="text-sm title-font text-gray-500 tracking-widest">Department</h2>
                <h1 class="text-gray-900 text-2xl title-font font-medium mb-1">{{$ticket->department}}</h1>
              </div>

              <div class="m-6">
                <h2 class="text-sm title-font text-gray-500 tracking-widest">Subject</h2>
                <h1 class="text-gray-900 text-2xl title-font font-medium mb-1">{{$ticket->subject}}</h1>
              </div>

              <div class="m-6">
                <h2 class="text-xs title-font text-gray-500 tracking-widest">Description</h2>
                <p class="leading-relaxed">{{ $ticket->description }}</p>
              </div>

              <div class="m-6">
                <h2 class="text-sm title-font text-gray-500 tracking-widest">Priority</h2>
                <div class="py-3">
                    @if ($ticket->priority == ('Low'))
                        <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-sm">{{ $ticket->priority }}</span>
                    @elseif($ticket->priority == ('Medium'))
                        <span class="bg-yellow-200 text-yellow-600 py-1 px-3 rounded-full text-sm">{{ $ticket->priority }}</span>
                    @else
                        <span class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-sm">{{ $ticket->priority }}</span>
                    @endif
                </div>

              </div>
          {{-- <div class="flex mb-4">
            <span class="flex items-center">
              <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
              </svg>
              <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
              </svg>
              <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
              </svg>
              <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
              </svg>
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
              </svg>
              <span class="text-gray-600 ml-3">4 Reviews</span>
            </span>
            <span class="flex ml-3 pl-3 py-2 border-l-2 border-gray-200">
              <a class="text-gray-500">
                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                </svg>
              </a>
              <a class="ml-2 text-gray-500">
                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
                </svg>
              </a>
              <a class="ml-2 text-gray-500">
                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
                </svg>
              </a>
            </span>
          </div> --}}


          {{-- <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-200 mb-5">
            <div class="flex">
              <span class="mr-3">Color</span>
              <button class="border-2 border-gray-300 rounded-full w-6 h-6 focus:outline-none"></button>
              <button class="border-2 border-gray-300 ml-1 bg-gray-700 rounded-full w-6 h-6 focus:outline-none"></button>
              <button class="border-2 border-gray-300 ml-1 bg-red-500 rounded-full w-6 h-6 focus:outline-none"></button>
            </div>
            <div class="flex ml-6 items-center">
              <span class="mr-3">Size</span>
              <div class="relative">
                <select class="rounded border appearance-none border-gray-400 py-2 focus:outline-none focus:border-red-500 text-base pl-3 pr-10">
                  <option>SM</option>
                  <option>M</option>
                  <option>L</option>
                  <option>XL</option>
                </select>
                <span class="absolute right-0 top-0 h-full w-10 text-center text-gray-600 pointer-events-none flex items-center justify-center">
                  <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4" viewBox="0 0 24 24">
                    <path d="M6 9l6 6 6-6"></path>
                  </svg>
                </span>
              </div>
            </div>

          </div> --}}

            <form class="form-horizontal" action="/admin/support/{{ $ticket->id }}" method="post">
            @csrf



                <div class="pb-5 border-b-2 border-gray-200">
                    <div class="m-6">
                        <h2 class="text-sm title-font text-gray-500 tracking-widest">Assign To</h2>
                        <div class="py-3">
                            <div class="relative">
                                <select name="assign_to" class="rounded border appearance-none border-gray-400 py-2 text-base pl-3 pr-10">
                                <option>Staff Name</option>
                                <option>M</option>
                                <option>L</option>
                                <option>XL</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex m-6">

                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="submit"></label>
                            <div class="col-md-4">
                                <button id="submit" name="submit" class="block tracking-widest uppercase text-center shadow bg-green-400 hover:bg-green-500 focus:shadow-outline focus:outline-none text-white text-xs py-3 px-10 rounded">Confirm</button>
                            </div>
                        </div>
                </div>
            </form>
        </div>
        </div>
      </div>
    </div>
  </section>

@endsection




@section('script')

<!-- http://fian.my.id/Waves/ -->
<script src="https://cdn.jsdelivr.net/npm/node-waves@0.7.6/dist/waves.min.js"></script>
<script type="text/javascript">
  Waves.attach('.ripple')
  Waves.init()
</script>

@endsection

@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
              <div class="m-10">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                  {{ $program->name }}
                </h2>



                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <section class="text-gray-700 body-font overflow-hidden bg-white">
                            <div class="container px-5 py-24 mx-auto">
                                <div class="lg:w-4/5 mx-auto flex flex-wrap">
                                    <img alt="ecommerce" class="lg:w-1/2 w-full object-cover object-center rounded border border-gray-200" src = "{{ asset('storage/program_thumbnails/'.$program->thumbnail_path)}}" width="500" height="600">
                                    <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
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

                                        <span class="title-font font-medium text-2xl text-gray-900">{{$currency}}{{App\Helpers\CurrencyHelper::getSetPriceFormat($program->price)}}</span>
                                        </div>
                                    </div>

                                    @if($userBoughtProgram)
                                        <div class="m-6">
                                            <p style="color:green;font-size:20px;"><strong>You have access to this course!</strong></p>
                                        </div>

                                    @else
                                    <div class="m-6">
                                        <div class="block tracking-widest uppercase text-center shadow bg-green-400 hover:bg-green-500 focus:shadow-outline focus:outline-none text-white text-xs py-3 px-10 rounded">
                                            {{-- <a href="{{ url('client/checkout/'. $program->slug) }}" onclick="showLoadSpinner();"><span class="spinner-border spinner-border-sm" id="spinnerOnBtn" role="status" aria-hidden="true" style="display:none;"></span> Buy Now <i class="fas fa-cart-plus"></i></a> --}}
                                            <a href="{{ url('/client/program/register/'. $program->id) }}">Register Now</a>
                                        </div>
                                    </div>

                                    @endif
                              
                                    </div>
                                </div>
                            </div>
                        </section>

                        {{-- Feedbacks --}}
                        <div class="ml-5">

                            <p class="text-3xl">Feedbacks</p>

                            @if (!($feedbacks->isEmpty()))

                            @foreach($feedbacks as $feedback)

                            <div class="flex mt-6">
                            <div class="flex-shrink-0 mr-3">
                                <img class="mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10" src = "{{ asset('storage/profile_pictures/'.$feedback->profile_thumbnail)}}" alt="">
                            </div>
                            <div class="flex-1 border rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
                                <strong>{{$feedback->client_name}}</strong> <span class="text-xs text-gray-400">{{$feedback->created_at}}</span>
                                <p class="text-sm">
                                {{$feedback->feedback}}
                                </p>

                                @if (!($feedback->image_path == ""))
                                <img width="300" height="300" src = "{{ asset('storage/feedback_images/'.$feedback->image_path)}}" alt="">
                                @endif

                            </div>
                            </div>

                            @endforeach

                            @else
                            <p class="text-xl mt-3">This program currently don't have any feedback</p>

                            @endif
                            
                        </div>

                        </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.admin')

@section('container')

<div class="flex flex-col items-start justify-between pb-6 space-y-4 border-b lg:items-center lg:space-y-0 lg:flex-row">
    <h1 class="text-2xl font-semibold whitespace-nowrap">
        Stripe Settings
    </h1>


</div>

  <div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
            <div class="overflow-hidden border-b border-gray-200 rounded-md shadow-md">
                <section class="text-gray-700 body-font overflow-hidden bg-white">
                    <section class="container px-5 py-24 mx-auto">
                        <div class="lg:w-full mx-auto flex flex-wrap">

                            <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                                {{-- @if(session('successMsg'))
                                    <div class="alert alert-success alert-dismissible fade show mt-1" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        <strong>{{ session('successMsg') }}</strong>
                                    </div>
                                @endif --}}
                                <form action="{{route('admin.stripe.update')}}" method="POST" class="divide-y divide-gray-200">
                                    @csrf
                                    @method('PUT')

                                    <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                                        <div class="flex items-center space-x-5">
                                          <div class="h-14 w-14 bg-yellow-200 rounded-full flex flex-shrink-0 justify-center items-center text-yellow-500 text-2xl font-mono">i</div>
                                          <div class="block pl-2 font-semibold text-xl self-start text-gray-700">
                                            <h2 class="leading-relaxed">Select Environment</h2>
                                            <p class="text-sm text-gray-500 font-normal leading-relaxed lg:w-3/5">Select if you want to use the payment method in test or live mode. For testing select "test", for live sales select "live".</p>
                                          </div>
                                        </div>
        
                                        <div class="m-6">
                                            <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg>
                                            <select name="stripe_environment" class="border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none" autocomplete="off">
                                                <option value="test" {{ (old("stripe_environment", $stripeSettings->stripe_environment) == "test" ? "selected":"")}}>test</option>
                                                <option value="live" {{ (old("stripe_environment", $stripeSettings->stripe_environment) == "live" ? "selected":"")}}>live</option>
                                            </select>
                                            <p style="color:red;">{{ $errors->first('stripe_environment') }}</p>
                                        </div>

                                        <hr>
        
                                        <div class="divide-y divide-gray-200">
                                            <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                                                <div class="flex flex-col">
                                                    <div class="m-2">
                                                        <label class="leading-loose">Test Publishable Key</label>
                                                        <p class="text-sm text-gray-500 font-normal leading-relaxed lg:w-4/5">Your test publishable key.</p>
                                                    </div>
            
                                                    <div class="m-2 lg:w-1/4">
                                                        <input type="text" name="stripe_test_publishable_key" id="title-text-input" value="{{old('stripe_test_publishable_key', $stripeSettings->stripe_test_publishable_key)}}" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                                                        <p style="color:red;">{{ $errors->first('stripe_test_publishable_key') }}</p>
                                                    </div>
                                                
                                                </div>

                                                <hr>
                                                
                                                <div class="flex flex-col">
                                                    <div class="m-2">
                                                        <label class="leading-loose">Test secret key</label>
                                                        <p class="text-sm text-gray-500 font-normal leading-relaxed lg:w-4/5">Your test secret key.</p>
                                                    </div>
            
                                                    <div class="m-2 lg:w-1/4">
                                                        <input type="text" name="stripe_test_secret_key" id="title-text-input" value="{{old('stripe_test_secret_key', $stripeSettings->stripe_test_secret_key)}}" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                                                        <p style="color:red;">{{ $errors->first('stripe_test_secret_key') }}</p>
                                                    </div>
                                                
                                                </div>

                                                <hr>
            
                                                <div class="flex flex-col">
                                                    <div class="m-2">
                                                        <label class="leading-loose">Live Publishable Key</label>
                                                        <p class="text-sm text-gray-500 font-normal leading-relaxed lg:w-4/5">Your live publishable key.</p>
                                                    </div>
            
                                                    <div class="m-2 lg:w-1/4">
                                                        <input type="text" name="stripe_live_publishable_key" id="title-text-input" value="{{old('stripe_live_publishable_key', $stripeSettings->stripe_live_publishable_key)}}" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                                                        <p style="color:red;">{{ $errors->first('stripe_live_publishable_key') }}</p>
                                                    </div>
                                                
                                                </div>

                                                <hr>
            
                                                <div class="flex flex-col">
                                                    <div class="m-2">
                                                        <label class="leading-loose">Live secret key</label>
                                                        <p class="text-sm text-gray-500 font-normal leading-relaxed lg:w-4/5">Your live secret key.</p>
                                                    </div>
            
                                                    <div class="m-2 lg:w-1/4">
                                                        <input type="text" name="stripe_live_secret_key" id="title-text-input" value="{{old('stripe_live_secret_key', $stripeSettings->stripe_live_secret_key)}}" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                                                        <p style="color:red;">{{ $errors->first('stripe_live_secret_key') }}</p>
                                                    </div>
                                                
                                                </div>
            
                                                <hr>
            
                                                <div class="lg:w-1/6">
                                                    <div class="col-sm-12">
                                                        <button type="submit" class="bg-blue-500 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none">Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </section>
            </div>
        </div>
    </div>
</div>
@endsection


@push('js')

@endpush




@extends('layouts.app')

@push("css")

@endpush

@section('content')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="m-10">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Checkout') }}
            </h2>

            </div>
            <div class="m-5">
                <section id="main-checkout">
                    <div class="container mx-auto sm:px-4">
                        @if(session("failureMsg"))
                        <div class="relative px-3 py-3 mb-4 border rounded bg-red-200 border-red-300 text-red-800 opacity-0 opacity-100 block mt-1" id="paymentErrorAlert" role="alert">
                            <strong>{{ session("failureMsg") }}</strong>
                        </div>
                        @endif
                        <div class="relative px-3 py-3 mb-4 border rounded bg-red-200 border-red-300 text-red-800 opacity-0 opacity-100 block mt-1" id="validationErrorAlert" role="alert" style="display:none;">
                            <strong id="validationErrorText"></strong>
                        </div>
                        <div class="flex flex-wrap ">

                            <div class="lg:w-1/2 pr-4 pl-4 customer-info">

                                <div class="step1">
                                    <h4 mt-4>Contact Information <span><button class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-green-500 text-white hover:bg-green-600" onclick="fillInDummyInfo()">Fill in dummy info</button></span></h4>
                                    <hr class="m-4">
                                </div>

                                <div class="flex flex-wrap -mr-1 -ml-1 m-2">
                                    <div class="relative flex-grow max-w-full flex-1 px-4">
                                        <label  for="first_name">First name <span style="color: red;">*</span></label>
                                        <input type="text" class="block appearance-none w-full py-1 px-2 m-2 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" id="first_name" name="first_name" aria-describedby="first_name" value="{{old('first_name')}}">
                                    </div>
                                    <div class="relative flex-grow max-w-full flex-1 px-4">
                                        <label for="last_name">Last name<span style="color: red;">*</span></label>
                                        <input type="text" class="block appearance-none w-full py-1 px-2 m-2 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" id="last_name" name="last_name" aria-describedby="last_name" value="{{old('last_name')}}">
                                    </div>
                                </div>
                                <div class="flex flex-wrap -mr-1 -ml-1 mt-4">
                                    <div class="relative flex-grow max-w-full flex-1 px-4">
                                        <label for="email_address">Email Address<span style="color: red;">*</span></label>
                                        <input type="email" name="email_address" class="block appearance-none w-full py-1 px-2 m-2 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" id="email_address" aria-describedby="email_address" value="{{old('email_address')}}">
                                    </div>
                                    <div class="relative flex-grow max-w-full flex-1 px-4">
                                        <label for="phone">Phone</label>
                                        <input type="text" name="phone" class="block appearance-none w-full py-1 px-2 m-2 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" id="phone" aria-describedby="phone" value="{{old('phone')}}">
                                    </div>
                                </div>

                                <div class="step2">
                                    <h4 class="mt-4">Billing Address</h4>
                                    <hr class="m-4">
                                </div>

                                <div class="flex flex-wrap -mr-1 -ml-1">
                                    <div class="relative flex-grow max-w-full flex-1 px-4">
                                        <label for="street">House number and street<span style="color: red;">*</span></label>
                                        <input type="text" class="block appearance-none w-full py-1 px-2 m-2 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" name="street" id="street" aria-describedby="street" value="{{old('street')}}">
                                    </div>
                                    <div class="relative flex-grow max-w-full flex-1 px-4">
                                        <label for="apartment">Apartment, suite, unit etc.</label>
                                        <input type="text" class="block appearance-none w-full py-1 px-2 m-2 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" name="apartment" id="apartment" aria-describedby="apartment" value="{{old('apartment')}}">
                                    </div>
                                </div>
                                <div class="mb-4 mt-4">
                                    <label for="city">City/Town<span style="color: red;">*</span></label>
                                    <input type="text" class="block appearance-none w-full py-1 px-2 m-2 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" name="city" id="city" aria-describedby="city" value="{{old('city')}}">
                                </div>

                                <div class="flex flex-wrap -mr-1 -ml-1">
                                    <div class="relative flex-grow max-w-full flex-1 px-4">
                                        <label for="country">Country<span style="color: red;">*</span></label>
                                        <select id="country" class="custom-select m-2 block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="country">
                                            @foreach($countries as $country)
                                                <option value="{{ $country->code }}" autocomplete="off" {{ ( old('country') == $country->code ? "selected":"" ) }} > {{ stripslashes($country->name) }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="relative flex-grow max-w-full flex-1 px-4">
                                        <label for="state">State/County<span style="color: red;">*</span></label>
                                        <select id="state" class="custom-select m-2 block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="state" autocomplete="off"></select>
                                    </div>
                                </div>
                                <div class="mb-4 mt-4">
                                    <label for="zip">Zip Code<span style="color: red;">*</span></label>
                                    <input type="text" class="m-2 block appearance-none w-1/2 py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" name="zip" id="zip" value="{{old('zip')}}">
                                </div>

                            </div> <!-- /.col-lg-6 -->

                            <!-- SECOND COLUMN -->
                            <div class="lg:w-1/2 pr-4 pl-4">

                                <div class="step3">
                                    <h4 mt-4>Checkout & Payment</h4>
                                    <hr class="m-4">
                                </div>
                                <div class="order-details">
                                    <div class="order-meta flex justify-between mb-4">
                                        <div>Product</div>
                                        <div>Total</div>
                                    </div>
                                    <div class="product-row flex justify-between mb-4">
                                        <div>
                                            {{$program->name}}
                                        </div>
                                        <div>
                                            {{$currency}}{{App\Helpers\CurrencyHelper::getSetPriceFormat($program->price)}}
                                        </div>
                                    </div>
                                    <div class="total flex justify-between">
                                        <div>Total</div>
                                        <div id="total" data-total="{{$program->price}}">{{$currency}}{{App\Helpers\CurrencyHelper::getSetPriceFormat($program->price)}}</div>
                                    </div>
                                </div>
                                <div class="payment-title mb-5 mt-4">
                                    <h4>Select a payment method</h4>
                                </div>

                                <div class="all-payment-methods-container">
                                    <div class="accordion" id="all-payment-methods">
                                        @if($braintreeEnabled)
                                            <div class="relative flex flex-col min-w-0 rounded break-words border bg-white border-1 border-gray-300">
                                                <div class="py-3 px-6 mb-0 bg-gray-200 border-b-1 border-gray-300 text-gray-900" id="headingOne">
                                                    <h2 class="mb-0">
                                                    <button class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline font-normal text-blue-700 bg-transparent block w-full text-left collapsed" type="button" data-toggle="collapse" onclick="checkRadioBtn(this)" data-target="#tm-braintree-div" aria-expanded="false" aria-controls="tm-braintree-div">
                                                    <div class="flex justify-between">
                                                        <div class="braintree-payment-div">
                                                            <input class="absolute mt-1 -ml-6" type="radio" name="paymentRadio" id="braintreePayment" value="">
                                                            <label class="text-gray-700 pl-6 mb-0" for="braintreePayment"> {{$brainTreeLabel}}</label>
                                                        </div>
                                                        <div class="tmsonic-braintree-image">
                                                            <img src="{{ asset("storage/frontend/images/braintree-cards.png") }}" alt="" class="max-w-full h-auto">
                                                        </div>
                                                    </div>
                                                    </button>
                                                    </h2>
                                                </div>
                                                <div id="tm-braintree-div" class="" aria-labelledby="headingOne" data-parent="#all-payment-methods">
                                                    <div class="flex-auto p-6">
                                                        <div class="wrapper">
                                                            <div class="checkout container mx-auto sm:px-4">
                                                                <section> <div class="bt-drop-in-wrapper">
                                                                    <div id="bt-dropin"></div>
                                                                </div>
                                                            </section>
                                                            <form action="{{route('braintree.payment')}}" id="payment-form-bt" method="POST">
                                                                @csrf
                                                                <input type="hidden" id="nonce_bt" name="nonce" />
                                                                <input type="hidden" id="first_name_bt" name="first_name" />
                                                                <input type="hidden" id="last_name_bt" name="last_name" />
                                                                <input type="hidden" id="phone_bt" name="phone" />
                                                                <input type="hidden" id="street_bt" name="street" />
                                                                <input type="hidden" id="apartment_bt" name="apartment" />
                                                                <input type="hidden" id="city_bt" name="city" />
                                                                <input type="hidden" id="country_bt" name="country" />
                                                                <input type="hidden" id="state_bt" name="state" />
                                                                <input type="hidden" id="zip_bt" name="zip" />
                                                                <input type="hidden" id="program_bt" name="program" />
                                                                <input type="hidden" id="total_bt" name="total" />
                                                                <button class="button inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline btn-payment block w-full" id="btPayStartBtn" form="payment-form-bt" type="submit">
                                                                    <span>Click to complete purchase</span>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                        @if($stripeEnabled)
                                            <div class="relative flex flex-col min-w-0 rounded break-words border bg-white border-1 border-gray-300">
                                                <div class="py-3 px-6 mb-0 bg-gray-200 border-b-1 border-gray-300 text-gray-900" id="headingTwo">
                                                    <h2 class="mb-0">
                                                    <button class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline font-normal text-blue-700 bg-transparent block w-full text-left" type="button" data-toggle="collapse" onclick="checkRadioBtn(this)" data-target="#tm-stripe-div" aria-expanded="true" aria-controls="tm-stripe-div">
                                                    <div class="flex justify-between">
                                                        <div class="stripe-payment-div">
                                                            <input class="absolute mt-1 -ml-6" type="radio" name="paymentRadio" id="stripePayment" value="">
                                                            <label class="text-gray-700 pl-6 mb-0" for="stripePayment"> Credit card by Stripe </label>
                                                        </div>
                                                        <div class="stripe-image">
                                                            <img src="{{ asset("storage/frontend/images/stripe-cards.png") }}" alt="" class="max-w-full h-auto">
                                                        </div>
                                                    </div>
                                                    </button>
                                                    </h2>
                                                </div>
                                                <div id="tm-stripe-div" class="" aria-labelledby="headingTwo" data-parent="#all-payment-methods">
                                                    <div class="flex-auto p-6">
                                                        <div class="wrapper">
                                                            <div class="checkout container mx-auto sm:px-4">
                                                                <section>
                                                                    <div class="tm-stripe-wrapper">
                                                                        <label for="stripe-card-element"></label>
                                                                        <div id="stripe-card-element">
                                                                        </div>
                                                                    </div>
                                                                </section>
                                                                <form action="{{route('client.checkout.fulfill.order')}}" id="payment-form-stripe" name="stripePayForm" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" id="first_name_stripe" name="first_name" />
                                                                    <input type="hidden" id="last_name_stripe" name="last_name" />
                                                                    <input type="hidden" id="phone_stripe" name="phone" />
                                                                    <input type="hidden" id="street_stripe" name="street" />
                                                                    <input type="hidden" id="apartment_stripe" name="apartment" />
                                                                    <input type="hidden" id="city_stripe" name="city" />
                                                                    <input type="hidden" id="country_stripe" name="country" />
                                                                    <input type="hidden" id="state_stripe" name="state" />
                                                                    <input type="hidden" id="zip_stripe" name="zip" />
                                                                    <input type="hidden" id="program_stripe" name="program" />
                                                                    <input type="hidden" id="transaction_stripe" name="transaction_id" />
                                                                    <input type="hidden" id="total_stripe" name="total" />
                                                                    <button class="button inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline btn-payment block w-full" id="payStartBtnStripe" form="payment-form-stripe" type="submit" ><span>Click to complete purchase</span> </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        @if($payPalSmartEnabled)
                                            <div class="relative flex flex-col min-w-0 rounded break-words border bg-white border-1 border-gray-300">
                                                <div class="py-3 px-6 mb-0 bg-gray-200 border-b-1 border-gray-300 text-gray-900" id="headingThree">
                                                    <h2 class="mb-0">
                                                    <button class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline font-normal text-blue-700 bg-transparent block w-full text-left" type="button" data-toggle="collapse" onclick="checkRadioBtn(this)" data-target="#tm-paypal-smart-div" aria-expanded="true" aria-controls="tm-paypal-smart-div">
                                                    <div class="flex justify-between">
                                                        <div class="paypal-smart-payment-div">
                                                            <input class="absolute mt-1 -ml-6" type="radio" name="paymentRadio" id="paypalSmartPayment" value="">
                                                            <label class="text-gray-700 pl-6 mb-0" for="paypalSmartPayment"> PayPal Smart Buttons </label>
                                                        </div>
                                                        <div class="paypal-image">
                                                            <img src="{{ asset("storage/frontend/images/paypal-logo.png") }}" alt="" class="max-w-full h-auto">
                                                        </div>
                                                    </div>
                                                    </button>
                                                    </h2>
                                                </div>


                                                <div id="tm-paypal-smart-div" class="" aria-labelledby="headingThree" data-parent="#all-payment-methods">
                                                    <div class="flex-auto p-6">
                                                        <div class="wrapper">
                                                            <div class="checkout container mx-auto sm:px-4">
                                                                <section>
                                                                    <div class="tm-paypal-smart-wrapper">
                                                                        <div id="tm-paypal-smart-placement">
                                                                        </div>
                                                                    </div>
                                                                </section>

                                                                <form action="{{route('client.checkout.fulfill.order')}}" id="payment-form-paypal-smart" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" id="first_name_paypal" name="first_name" />
                                                                    <input type="hidden" id="last_name_paypal" name="last_name" />
                                                                    <input type="hidden" id="phone_paypal" name="phone" />
                                                                    <input type="hidden" id="street_paypal" name="street" />
                                                                    <input type="hidden" id="apartment_paypal" name="apartment" />
                                                                    <input type="hidden" id="city_paypal" name="city" />
                                                                    <input type="hidden" id="country_paypal" name="country" />
                                                                    <input type="hidden" id="state_paypal" name="state" />
                                                                    <input type="hidden" id="zip_paypal" name="zip" />
                                                                    <input type="hidden" id="program_paypal" name="program" />
                                                                    <input type="hidden" id="transaction_paypal" name="transaction_id" />
                                                                    <input type="hidden" id="total_paypal" name="total" />
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif


                                    <div id="terms_privacy_div" class="mb-4 relative block mb-2 mt-4" style="border: 1px solid red">
                                        <input type="checkbox" class="absolute mt-1 -ml-6" id="terms_checkbox" autocomplete="off">
                                        <label class="text-gray-700 pl-6 mb-0" for="terms_checkbox">By placing this order I agree to the
                                            <a target="_blank" href="{{route('terms')}}">terms and conditions</a> and accept the <a target="_blank" href="{{route('privacy')}}">privacy policy</a>.
                                        </label>
                                    </div>
                                </div> <!-- /.payment-methods-container -->
                                <div class="flex justify-center">
                                    <div class="spinner-border text-teal-500" style="width: 3rem; height: 3rem; display: none;" id="payStartSpinner" role="status">
                                    </div>
                                </div>
                            </div> <!-- /.col-lg-6 -->

                        </div> <!-- /.row -->

                    </div> <!-- /.container -->

                    <!-- Processing Modal begins -->
                    <div class="modal opacity-0" id="processingModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <p>Your request is being processed. This may take a little time. Thank you for your patience!</p>
                                    <div class="flex justify-center">
                                        <div class="spinner-border text-green-500" style="width: 3rem; height: 3rem;" role="status">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Processing Modal ends -->

                </section>

            </div>
        </div>
    </div>
</div>



@endsection

@push("js")
    @include('js-for-views.checkout-js')
    @if($braintreeEnabled)
        @include('js-for-views.payment-gateway-js.braintree-js')
    @endif
    @if($stripeEnabled)
        @include('js-for-views.payment-gateway-js.stripe-js')
    @endif
    @if($payPalSmartEnabled)
        @include('js-for-views.payment-gateway-js.paypal-smart-js')
    @endif
@endpush

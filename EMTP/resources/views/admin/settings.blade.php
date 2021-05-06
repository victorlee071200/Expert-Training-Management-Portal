@extends('layouts.admin')

@section('container')

<div class="flex flex-col items-start justify-between pb-6 space-y-4 border-b lg:items-center lg:space-y-0 lg:flex-row">
    <h1 class="text-2xl font-semibold whitespace-nowrap">
        Payment Settings
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
                                <form action="{{route('admin.settings.update')}}" method="POST" class="divide-y divide-gray-200">
                                    @csrf
                                    @method('PUT')

                                    <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                                        <div class="flex items-center space-x-5">
                                          <div class="h-14 w-14 bg-yellow-200 rounded-full flex flex-shrink-0 justify-center items-center text-yellow-500 text-2xl font-mono">i</div>
                                          <div class="block pl-2 font-semibold text-xl self-start text-gray-700">
                                            <h2 class="leading-relaxed">Currency</h2>
                                            <p class="text-sm text-gray-500 font-normal leading-relaxed lg:w-3/5">Select currency type that will be used for prices on the front-end.</p>
                                          </div>
                                        </div>
        
                                        <div class="m-6">
                                            <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg>
                                            <select name="currency" class="border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none" autocomplete="off">
                                                @foreach($currencies as $currency)
                                                    <option value="{{ $currency->name }}" {{ (old("currency", $settings->currency) == $currency->name ? "selected":"") }}>
                                                        {{ __($currency->name) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <p style="color:red;">{{ $errors->first('currency') }}</p>
                                        </div>

                                        <hr>
        
                                        <div class="divide-y divide-gray-200">
                                            <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                                                <div class="flex flex-col">
                                                    <div class="m-2">
                                                        <label class="leading-loose">Use Integer Prices</label>
                                                        <p class="text-sm text-gray-500 font-normal leading-relaxed lg:w-4/5">Select "Yes" if you do not want to use decimals in the prices.</p>
                                                    </div>
            
                                                    <div class="m-6">
                                                        <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg>
                                                        <select name="use_integer_prices" class="border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none" autocomplete="off">
                                                            <option value="1" {{ (old("use_integer_prices", $settings->use_integer_prices) == "1" ? "selected":"") }}>
                                                                Yes
                                                            </option>
                                                            <option value="0" {{ (old("use_integer_prices", $settings->use_integer_prices) == "0" ? "selected":"") }}>
                                                                No
                                                            </option>
                                                        </select>
                                                        <p style="color:red;">{{ $errors->first('use_integer_prices') }}</p>
                                                    </div>
                                                
                                                </div>

                                                <hr>
                                                
                                                <div class="flex flex-col">
                                                    <div class="m-2">
                                                        <label class="leading-loose">Use Currency Symbol</label>
                                                        <p class="text-sm text-gray-500 font-normal leading-relaxed lg:w-4/5">Select "Yes" if you want to use the symbol of the selected currency on the frontend. Only applicable for the following currencies: USD, EUR, GBP.</p>
                                                    </div>
            
                                                    <div class="m-6">
                                                        <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg>
                                                        <select name="use_currency_symbol" class="border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none" autocomplete="off">
                                                            <option value="1" {{ (old("use_currency_symbol", $settings->use_currency_symbol) == "1" ? "selected":"") }}>
                                                                Yes
                                                            </option>
                                                            <option value="0" {{ (old("use_currency_symbol", $settings->use_currency_symbol) == "0" ? "selected":"") }}>
                                                                No
                                                            </option>
                                                        </select>
                                                        <p style="color:red;">{{ $errors->first('use_currency_symbol') }}</p>
                                                    </div>
                                                
                                                </div>

                                                <hr>
            
                                                <div class="flex flex-col">
                                                    <div class="m-2">
                                                        <label class="leading-loose">Use Comma for seperating decimals</label>
                                                        <p class="text-sm text-gray-500 font-normal leading-relaxed lg:w-4/5">Select "Yes" if you want to use the comma "," for separating decimals and the period "." as the thousand separator on the frontend.</p>
                                                    </div>
            
                                                    <div class="m-6">
                                                        <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg>
                                                        <select name="comma_is_decimal_separator" class="border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none" autocomplete="off">
                                                            <option value="1" {{ (old("comma_is_decimal_separator", $settings->comma_is_decimal_separator) == "1" ? "selected":"") }}>
                                                                Yes
                                                            </option>
                                                            <option value="0" {{ (old("comma_is_decimal_separator", $settings->comma_is_decimal_separator) == "0" ? "selected":"") }}>
                                                                No
                                                            </option>
                                                        </select>
                                                        <p style="color:red;">{{ $errors->first('comma_is_decimal_separator') }}</p>
                                                    </div>
                                                
                                                </div>

                                                <hr>

                                                <h1 class="text-2xl font-semibold whitespace-nowrap">
                                                    Payment Gateway Settings
                                                </h1>

                                                <div class="flex flex-col">
                                                    <div class="m-2">
                                                        <label class="leading-loose">Enable Braintree</label>
                                                        <p class="text-sm text-gray-500 font-normal leading-relaxed lg:w-4/5">Select "No" if you do not want to enable payment with Braintree.</p>
                                                    </div>
            
                                                    <div class="m-6">
                                                        <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg>
                                                        <select name="enable_braintree" class="border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none" autocomplete="off">
                                                            <option value="1" {{ (old("enable_braintree", $settings->enable_braintree) == "1" ? "selected":"") }}>
                                                                Yes
                                                            </option>
                                                            <option value="0" {{ (old("enable_braintree", $settings->enable_braintree) == "0" ? "selected":"") }}>
                                                                No
                                                            </option>
                                                        </select>
                                                        <p style="color:red;">{{ $errors->first('enable_braintree') }}</p>
                                                    </div>
                                                
                                                </div>

                                                <hr>

                                                <div class="flex flex-col">
                                                    <div class="m-2">
                                                        <label class="leading-loose">Enable PayPal within Braintree</label>
                                                        <p class="text-sm text-gray-500 font-normal leading-relaxed lg:w-4/5">Select "No" if you do not want to enable payment with PayPal within Braintree. If you enable this option, you cannot enable the PayPal Smart Buttons.</p>
                                                    </div>
            
                                                    <div class="m-6">
                                                        <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg>
                                                        <select name="enable_paypal_in_bt" class="border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none" autocomplete="off">
                                                            <option value="1" {{ (old("enable_paypal_in_bt", $settings->enable_paypal_in_bt) == "1" ? "selected":"") }}>
                                                                Yes
                                                            </option>
                                                            <option value="0" {{ (old("enable_paypal_in_bt", $settings->enable_paypal_in_bt) == "0" ? "selected":"") }}>
                                                                No
                                                            </option>
                                                        </select>
                                                        <p style="color:red;">{{ $errors->first('enable_paypal_in_bt') }}</p>
                                                    </div>
                                                
                                                </div>

                                                <hr>

                                                <div class="flex flex-col">
                                                    <div class="m-2">
                                                        <label class="leading-loose">Enable Stripe</label>
                                                        <p class="text-sm text-gray-500 font-normal leading-relaxed lg:w-4/5">Select "No" if you do not want to enable payment with Stripe.</p>
                                                    </div>
            
                                                    <div class="m-6">
                                                        <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg>
                                                        <select name="enable_stripe" class="border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none" autocomplete="off">
                                                            <option value="1" {{ (old("enable_stripe", $settings->enable_stripe) == "1" ? "selected":"") }}>
                                                                Yes
                                                            </option>
                                                            <option value="0" {{ (old("enable_stripe", $settings->enable_stripe) == "0" ? "selected":"") }}>
                                                                No
                                                            </option>
                                                        </select>
                                                        <p style="color:red;">{{ $errors->first('enable_stripe') }}</p>
                                                    </div>
                                                
                                                </div>

                                                <hr>

                                                <div class="flex flex-col">
                                                    <div class="m-2">
                                                        <label class="leading-loose">Enable PayPal Smart Buttons</label>
                                                        <p class="text-sm text-gray-500 font-normal leading-relaxed lg:w-4/5">Select "No" if you do not want to enable PayPal Smart Buttons. If you enable Braintree and PayPal within it, you cannot enable the PayPal Smart Buttons.</p>
                                                    </div>
            
                                                    <div class="m-6">
                                                        <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg>
                                                        <select name="enable_paypal_smart" class="border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none" autocomplete="off">
                                                            <option value="1" {{ (old("enable_paypal_smart", $settings->enable_paypal_smart) == "1" ? "selected":"") }}>
                                                                Yes
                                                            </option>
                                                            <option value="0" {{ (old("enable_paypal_smart", $settings->enable_paypal_smart) == "0" ? "selected":"") }}>
                                                                No
                                                            </option>
                                                        </select>
                                                        <p style="color:red;">{{ $errors->first('enable_paypal_smart') }}</p>
                                                    </div>
                                                </div>

                                                <hr>

                                                <div class="flex flex-col">
                                                    <div class="m-2">
                                                        <label class="leading-loose">Enable Paying with Card Smart Button</label>
                                                        <p class="text-sm text-gray-500 font-normal leading-relaxed lg:w-4/5">Select "No" if you do not want to enable paying with card smart button.</p>
                                                    </div>
            
                                                    <div class="m-6">
                                                        <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg>
                                                        <select name="enable_pp_smart_card" class="border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none" autocomplete="off">
                                                            <option value="1" {{ (old("enable_pp_smart_card", $settings->enable_pp_smart_card) == "1" ? "selected":"") }}>
                                                                Yes
                                                            </option>
                                                            <option value="0" {{ (old("enable_pp_smart_card", $settings->enable_pp_smart_card) == "0" ? "selected":"") }}>
                                                                No
                                                            </option>
                                                        </select>
                                                        <p style="color:red;">{{ $errors->first('enable_pp_smart_card') }}</p>
                                                    </div>
                                                </div>

                                                <hr>

                                                <div class="flex flex-col">
                                                    <div class="m-2">
                                                        <label class="leading-loose">Enable Paying with Credit Smart Button</label>
                                                        <p class="text-sm text-gray-500 font-normal leading-relaxed lg:w-4/5">Select "No" if you do not want to enable paying with credit smart button.</p>
                                                    </div>
            
                                                    <div class="m-6">
                                                        <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg>
                                                        <select name="enable_pp_smart_credit" class="border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none" autocomplete="off">
                                                            <option value="1" {{ (old("enable_pp_smart_credit", $settings->enable_pp_smart_credit) == "1" ? "selected":"") }}>
                                                                Yes
                                                            </option>
                                                            <option value="0" {{ (old("enable_pp_smart_credit", $settings->enable_pp_smart_credit) == "0" ? "selected":"") }}>
                                                                No
                                                            </option>
                                                        </select>
                                                        <p style="color:red;">{{ $errors->first('enable_pp_smart_credit') }}</p>
                                                    </div>
                                                </div>

                                                <hr>

                                                <div class="flex flex-col">
                                                    <div class="m-2">
                                                        <label class="leading-loose">Enable Paying with Bancontact Smart Button</label>
                                                        <p class="text-sm text-gray-500 font-normal leading-relaxed lg:w-4/5">Select "No" if you do not want to enable paying with Bancontact smart button.</p>
                                                    </div>
            
                                                    <div class="m-6">
                                                        <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg>
                                                        <select name="enable_pp_smart_bancontact" class="border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none" autocomplete="off">
                                                            <option value="1" {{ (old("enable_pp_smart_bancontact", $settings->enable_pp_smart_bancontact) == "1" ? "selected":"") }}>
                                                                Yes
                                                            </option>
                                                            <option value="0" {{ (old("enable_pp_smart_bancontact", $settings->enable_pp_smart_bancontact) == "0" ? "selected":"") }}>
                                                                No
                                                            </option>
                                                        </select>
                                                        <p style="color:red;">{{ $errors->first('enable_pp_smart_bancontact') }}</p>
                                                    </div>
                                                </div>

                                                <hr>

                                                <div class="flex flex-col">
                                                    <div class="m-2">
                                                        <label class="leading-loose">Enable Paying with Blink Smart Button</label>
                                                        <p class="text-sm text-gray-500 font-normal leading-relaxed lg:w-4/5">Select "No" if you do not want to enable paying with Blik smart button.</p>
                                                    </div>
            
                                                    <div class="m-6">
                                                        <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg>
                                                        <select name="enable_pp_smart_blik" class="border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none" autocomplete="off">
                                                            <option value="1" {{ (old("enable_pp_smart_blik", $settings->enable_pp_smart_blik) == "1" ? "selected":"") }}>
                                                                Yes
                                                            </option>
                                                            <option value="0" {{ (old("enable_pp_smart_blik", $settings->enable_pp_smart_blik) == "0" ? "selected":"") }}>
                                                                No
                                                            </option>
                                                        </select>
                                                        <p style="color:red;">{{ $errors->first('enable_pp_smart_blik') }}</p>
                                                    </div>
                                                </div>

                                                <hr>

                                                <div class="flex flex-col">
                                                    <div class="m-2">
                                                        <label class="leading-loose">Enable Paying with EPS Smart Button</label>
                                                        <p class="text-sm text-gray-500 font-normal leading-relaxed lg:w-4/5">Select "No" if you do not want to enable paying with EPS smart button.</p>
                                                    </div>
            
                                                    <div class="m-6">
                                                        <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg>
                                                        <select name="enable_pp_smart_eps" class="border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none" autocomplete="off">
                                                            <option value="1" {{ (old("enable_pp_smart_eps", $settings->enable_pp_smart_eps) == "1" ? "selected":"") }}>
                                                                Yes
                                                            </option>
                                                            <option value="0" {{ (old("enable_pp_smart_eps", $settings->enable_pp_smart_eps) == "0" ? "selected":"") }}>
                                                                No
                                                            </option>
                                                        </select>
                                                        <p style="color:red;">{{ $errors->first('enable_pp_smart_eps') }}</p>
                                                    </div>
                                                </div>

                                                <hr>

                                                <div class="flex flex-col">
                                                    <div class="m-2">
                                                        <label class="leading-loose">Enable Paying with Giropay Smart Button</label>
                                                        <p class="text-sm text-gray-500 font-normal leading-relaxed lg:w-4/5">Select "No" if you do not want to enable paying with Giropay smart button.</p>
                                                    </div>
            
                                                    <div class="m-6">
                                                        <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg>
                                                        <select name="enable_pp_smart_giropay" class="border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none" autocomplete="off">
                                                            <option value="1" {{ (old("enable_pp_smart_giropay", $settings->enable_pp_smart_giropay) == "1" ? "selected":"") }}>
                                                                Yes
                                                            </option>
                                                            <option value="0" {{ (old("enable_pp_smart_giropay", $settings->enable_pp_smart_giropay) == "0" ? "selected":"") }}>
                                                                No
                                                            </option>
                                                        </select>
                                                        <p style="color:red;">{{ $errors->first('enable_pp_smart_giropay') }}</p>
                                                    </div>
                                                </div>

                                                <hr>

                                                <div class="flex flex-col">
                                                    <div class="m-2">
                                                        <label class="leading-loose">Enable Paying with Ideal Smart Button</label>
                                                        <p class="text-sm text-gray-500 font-normal leading-relaxed lg:w-4/5">Select "No" if you do not want to enable paying with iDeal smart button.</p>
                                                    </div>
            
                                                    <div class="m-6">
                                                        <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg>
                                                        <select name="enable_pp_smart_ideal" class="border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none" autocomplete="off">
                                                            <option value="1" {{ (old("enable_pp_smart_ideal", $settings->enable_pp_smart_ideal) == "1" ? "selected":"") }}>
                                                                Yes
                                                            </option>
                                                            <option value="0" {{ (old("enable_pp_smart_ideal", $settings->enable_pp_smart_ideal) == "0" ? "selected":"") }}>
                                                                No
                                                            </option>
                                                        </select>
                                                        <p style="color:red;">{{ $errors->first('enable_pp_smart_ideal') }}</p>
                                                    </div>
                                                </div>

                                                <hr>

                                                <div class="flex flex-col">
                                                    <div class="m-2">
                                                        <label class="leading-loose">Enable Paying with Mercadopago Smart Button</label>
                                                        <p class="text-sm text-gray-500 font-normal leading-relaxed lg:w-4/5">Select "No" if you do not want to enable paying with Mercadopago smart button.</p>
                                                    </div>
            
                                                    <div class="m-6">
                                                        <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg>
                                                        <select name="enable_pp_smart_mercadopago" class="border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none" autocomplete="off">
                                                            <option value="1" {{ (old("enable_pp_smart_mercadopago", $settings->enable_pp_smart_mercadopago) == "1" ? "selected":"") }}>
                                                                Yes
                                                            </option>
                                                            <option value="0" {{ (old("enable_pp_smart_mercadopago", $settings->enable_pp_smart_mercadopago) == "0" ? "selected":"") }}>
                                                                No
                                                            </option>
                                                        </select>
                                                        <p style="color:red;">{{ $errors->first('enable_pp_smart_mercadopago') }}</p>
                                                    </div>
                                                </div>

                                                <hr>

                                                <div class="flex flex-col">
                                                    <div class="m-2">
                                                        <label class="leading-loose">Enable Paying with MyBank Smart Button</label>
                                                        <p class="text-sm text-gray-500 font-normal leading-relaxed lg:w-4/5">Select "No" if you do not want to enable paying with MyBank smart button.</p>
                                                    </div>
            
                                                    <div class="m-6">
                                                        <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg>
                                                        <select name="enable_pp_smart_mybank" class="border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none" autocomplete="off">
                                                            <option value="1" {{ (old("enable_pp_smart_mybank", $settings->enable_pp_smart_mybank) == "1" ? "selected":"") }}>
                                                                Yes
                                                            </option>
                                                            <option value="0" {{ (old("enable_pp_smart_mybank", $settings->enable_pp_smart_mybank) == "0" ? "selected":"") }}>
                                                                No
                                                            </option>
                                                        </select>
                                                        <p style="color:red;">{{ $errors->first('enable_pp_smart_mybank') }}</p>
                                                    </div>
                                                </div>

                                                <hr>

                                                <div class="flex flex-col">
                                                    <div class="m-2">
                                                        <label class="leading-loose">Enable Paying with P24 Smart Button</label>
                                                        <p class="text-sm text-gray-500 font-normal leading-relaxed lg:w-4/5">Select "No" if you do not want to enable paying with P24 smart button.</p>
                                                    </div>
            
                                                    <div class="m-6">
                                                        <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg>
                                                        <select name="enable_pp_smart_p24" class="border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none" autocomplete="off">
                                                            <option value="1" {{ (old("enable_pp_smart_p24", $settings->enable_pp_smart_p24) == "1" ? "selected":"") }}>
                                                                Yes
                                                            </option>
                                                            <option value="0" {{ (old("enable_pp_smart_p24", $settings->enable_pp_smart_p24) == "0" ? "selected":"") }}>
                                                                No
                                                            </option>
                                                        </select>
                                                        <p style="color:red;">{{ $errors->first('enable_pp_smart_p24') }}</p>
                                                    </div>
                                                </div>

                                                <hr>

                                                <div class="flex flex-col">
                                                    <div class="m-2">
                                                        <label class="leading-loose">Enable Paying with Sepa Smart Button</label>
                                                        <p class="text-sm text-gray-500 font-normal leading-relaxed lg:w-4/5">Select "No" if you do not want to enable paying with Sepa smart button.</p>
                                                    </div>
            
                                                    <div class="m-6">
                                                        <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg>
                                                        <select name="enable_pp_smart_sepa" class="border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none" autocomplete="off">
                                                            <option value="1" {{ (old("enable_pp_smart_sepa", $settings->enable_pp_smart_sepa) == "1" ? "selected":"") }}>
                                                                Yes
                                                            </option>
                                                            <option value="0" {{ (old("enable_pp_smart_sepa", $settings->enable_pp_smart_sepa) == "0" ? "selected":"") }}>
                                                                No
                                                            </option>
                                                        </select>
                                                        <p style="color:red;">{{ $errors->first('enable_pp_smart_sepa') }}</p>
                                                    </div>
                                                </div>

                                                <hr>

                                                <div class="flex flex-col">
                                                    <div class="m-2">
                                                        <label class="leading-loose">Enable Paying with Sofort Smart Button</label>
                                                        <p class="text-sm text-gray-500 font-normal leading-relaxed lg:w-4/5">Select "No" if you do not want to enable paying with Sofort smart button.</p>
                                                    </div>
            
                                                    <div class="m-6">
                                                        <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg>
                                                        <select name="enable_pp_smart_sofort" class="border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none" autocomplete="off">
                                                            <option value="1" {{ (old("enable_pp_smart_sofort", $settings->enable_pp_smart_sofort) == "1" ? "selected":"") }}>
                                                                Yes
                                                            </option>
                                                            <option value="0" {{ (old("enable_pp_smart_sofort", $settings->enable_pp_smart_sofort) == "0" ? "selected":"") }}>
                                                                No
                                                            </option>
                                                        </select>
                                                        <p style="color:red;">{{ $errors->first('enable_pp_smart_sofort') }}</p>
                                                    </div>
                                                </div>

                                                <hr>

                                                <div class="flex flex-col">
                                                    <div class="m-2">
                                                        <label class="leading-loose">Enable Paying with Venmo Smart Button</label>
                                                        <p class="text-sm text-gray-500 font-normal leading-relaxed lg:w-4/5">Select "No" if you do not want to enable paying with Venmo smart button.</p>
                                                    </div>
            
                                                    <div class="m-6">
                                                        <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg>
                                                        <select name="enable_pp_smart_venmo" class="border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none" autocomplete="off">
                                                            <option value="1" {{ (old("enable_pp_smart_venmo", $settings->enable_pp_smart_venmo) == "1" ? "selected":"") }}>
                                                                Yes
                                                            </option>
                                                            <option value="0" {{ (old("enable_pp_smart_venmo", $settings->enable_pp_smart_venmo) == "0" ? "selected":"") }}>
                                                                No
                                                            </option>
                                                        </select>
                                                        <p style="color:red;">{{ $errors->first('enable_pp_smart_venmo') }}</p>
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




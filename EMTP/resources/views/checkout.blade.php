@extends('layouts.app')
@section('title', 'Checkout')

@push("css")

@endpush

@section('content')
<section id="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h1>Checkout</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="main-checkout">
    <div class="container">
        @if(session("failureMsg"))
        <div class="alert alert-danger fade show mt-1" id="paymentErrorAlert" role="alert">
            <strong>{{ session("failureMsg") }}</strong>
        </div>
        @endif
        <div class="alert alert-danger fade show mt-1" id="validationErrorAlert" role="alert" style="display:none;">
            <strong id="validationErrorText"></strong>
        </div>
        <div class="row">

            <div class="col-lg-6 customer-info">

                <div class="step1">
                    <h4>Contact Information <span><button class="btn btn-success" onclick="fillInDummyInfo()">Fill in dummy info</button></span></h4>
                    <hr>
                </div>

                <div class="form-row">
                    <div class="col">
                        <label for="first_name">First name <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="first_name" name="first_name" aria-describedby="first_name" value="{{old('first_name')}}">
                    </div>
                    <div class="col">
                        <label for="last_name">Last name<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="last_name" name="last_name" aria-describedby="last_name" value="{{old('last_name')}}">
                    </div>
                </div>
                <div class="form-row mt-4">
                    <div class="col">
                        <label for="email_address">Email Address<span style="color: red;">*</span></label>
                        <input type="email" name="email_address" class="form-control" id="email_address" aria-describedby="email_address" value="{{old('email_address')}}">
                    </div>
                    <div class="col">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" class="form-control" id="phone" aria-describedby="phone" value="{{old('phone')}}">
                    </div>
                </div>

                <div class="step2">
                    <h4>Billing Address</h4>
                    <hr>
                </div>

                <div class="form-row">
                    <div class="col">
                        <label for="street">House number and street<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="street" id="street" aria-describedby="street" value="{{old('street')}}">
                    </div>
                    <div class="col">
                        <label for="apartment">Apartment, suite, unit etc.</label>
                        <input type="text" class="form-control" name="apartment" id="apartment" aria-describedby="apartment" value="{{old('apartment')}}">
                    </div>
                </div>
                <div class="form-group mt-4">
                    <label for="city">City/Town<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" name="city" id="city" aria-describedby="city" value="{{old('city')}}">
                </div>

                <div class="form-row">
                    <div class="col">
                        <label for="country">Country<span style="color: red;">*</span></label>
                        <select id="country" class="custom-select" name="country">
                            @foreach($countries as $country)
                                <option value="{{ $country->code }}" autocomplete="off" {{ ( old('country') == $country->code ? "selected":"" ) }} > {{ stripslashes($country->name) }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="state">State/County<span style="color: red;">*</span></label>
                        <select id="state" class="custom-select" name="state" autocomplete="off"></select>
                    </div>
                </div>
                <div class="form-group mt-4">
                    <label for="zip">Zip Code<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" name="zip" id="zip" value="{{old('zip')}}">
                </div>

            </div> <!-- /.col-lg-6 -->

            <!-- SECOND COLUMN -->
            <div class="col-lg-6">

                <div class="step3">
                    <h4>Checkout & Payment</h4>
                    <hr>
                </div>
                <div class="order-details">
                    <div class="order-meta d-flex justify-content-between">
                        <div>Product</div>
                        <div>Total</div>
                    </div>
                    <div class="product-row d-flex justify-content-between">
                        <div>
                            {{$program->name}}
                        </div>
                        <div>
                            {{$currency}}{{App\Helpers\CurrencyHelper::getSetPriceFormat($program->price)}}
                        </div>
                    </div>
                    <div class="total d-flex justify-content-between">
                        <div>Total</div>
                        <div id="total" data-total="{{$program->price}}">{{$currency}}{{App\Helpers\CurrencyHelper::getSetPriceFormat($program->price)}}</div>
                    </div>
                </div>
                <div class="payment-title mb-1 mt-4">
                    <h4>Select a payment method</h4>
                </div>

                <div class="all-payment-methods-container">
                    <div class="accordion" id="all-payment-methods">
                        @if($braintreeEnabled)
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" onclick="checkRadioBtn(this)" data-target="#tm-braintree-div" aria-expanded="false" aria-controls="tm-braintree-div">
                                    <div class="d-flex justify-content-between">
                                        <div class="braintree-payment-div">
                                            <input class="form-check-input" type="radio" name="paymentRadio" id="braintreePayment" value="">
                                            <label class="form-check-label" for="braintreePayment"> {{$brainTreeLabel}}</label>
                                        </div>
                                        <div class="tmsonic-braintree-image">
                                            <img src="{{ asset("public/assets/frontend/images/braintree-cards.png") }}" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                    </button>
                                    </h2>
                                </div>
                                <div id="tm-braintree-div" class="collapse" aria-labelledby="headingOne" data-parent="#all-payment-methods">
                                    <div class="card-body">
                                        <div class="wrapper">
                                            <div class="checkout container">
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
                                                <button class="button btn btn-payment btn-block" id="btPayStartBtn" form="payment-form-bt" type="submit">
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
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" onclick="checkRadioBtn(this)" data-target="#tm-stripe-div" aria-expanded="true" aria-controls="tm-stripe-div">
                                    <div class="d-flex justify-content-between">
                                        <div class="stripe-payment-div">
                                            <input class="form-check-input" type="radio" name="paymentRadio" id="stripePayment" value="">
                                            <label class="form-check-label" for="stripePayment"> Credit card by Stripe </label>
                                        </div>
                                        <div class="stripe-image">
                                            <img src="{{ asset("public/assets/frontend/images/stripe-cards.png") }}" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                    </button>
                                    </h2>
                                </div>
                                <div id="tm-stripe-div" class="collapse" aria-labelledby="headingTwo" data-parent="#all-payment-methods">
                                    <div class="card-body">
                                        <div class="wrapper">
                                            <div class="checkout container">
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
                                                    <button class="button btn btn-payment btn-block" id="payStartBtnStripe" form="payment-form-stripe" type="submit" ><span>Click to complete purchase</span> </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($payPalSmartEnabled)
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" onclick="checkRadioBtn(this)" data-target="#tm-paypal-smart-div" aria-expanded="true" aria-controls="tm-paypal-smart-div">
                                    <div class="d-flex justify-content-between">
                                        <div class="paypal-smart-payment-div">
                                            <input class="form-check-input" type="radio" name="paymentRadio" id="paypalSmartPayment" value="">
                                            <label class="form-check-label" for="paypalSmartPayment"> PayPal Smart Buttons </label>
                                        </div>
                                        <div class="paypal-image">
                                            <img src="{{ asset("public/assets/frontend/images/paypal-logo.png") }}" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                    </button>
                                    </h2>
                                </div>
                                <div id="tm-paypal-smart-div" class="collapse" aria-labelledby="headingThree" data-parent="#all-payment-methods">
                                    <div class="card-body">
                                        <div class="wrapper">
                                            <div class="checkout container">
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


                    <div id="terms_privacy_div" class="form-group form-check mt-4" style="border: 1px solid red">
                        <input type="checkbox" class="form-check-input" id="terms_checkbox" autocomplete="off">
                        <label class="form-check-label" for="terms_checkbox">By placing this order I agree to the
                            <a target="_blank" href="{{route('terms')}}">terms and conditions</a> and accept the <a target="_blank" href="{{route('privacy')}}">privacy policy</a>.
                        </label>
                    </div>
                </div> <!-- /.payment-methods-container -->
                <div class="d-flex justify-content-center">
                    <div class="spinner-border text-info" style="width: 3rem; height: 3rem; display: none;" id="payStartSpinner" role="status">
                    </div>
                </div>
            </div> <!-- /.col-lg-6 -->

        </div> <!-- /.row -->

    </div> <!-- /.container -->

    <!-- Processing Modal begins -->
    <div class="modal fade" id="processingModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <p>Your request is being processed. This may take a little time. Thank you for your patience!</p>
                    <div class="d-flex justify-content-center">
                        <div class="spinner-border text-success" style="width: 3rem; height: 3rem;" role="status">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Processing Modal ends -->

</section>

@endsection

@push("js")
    <script>
        var chosenCurrency = @json($currencyTextRaw);

        $( document ).ready(function() {
            var userState = "{{ old('state') }}";
            loadStates(userState);

            var emailAddress = @json($email);
            setEmailInputField(emailAddress);
        });

        $("#country").change(function() {
            loadStates("");
        });

        $("#terms_checkbox").change(function() {
            if(this.checked)
            {
                $("#terms_privacy_div").css('border', 'solid 1px green');
            }
            else
            {
                $("#terms_privacy_div").css('border', 'solid 1px red');
            }
        });

        function setEmailInputField(userEmail)
        {
            $("#email_address").val(userEmail);
            $("#email_address").prop("readonly", true);
        }

        function checkRadioBtn(parentButton)
        {
            var childRadioButton = $(parentButton).find(".form-check-input");
            $($(childRadioButton)[0]).prop("checked", true);
        }

        function fillInDummyInfo()
        {
            $("#first_name").val("John");
            $("#last_name").val("Ruth");
            $("#phone").val("987654321");
            $("#country").val("US").change();
            loadStates("WY");
            $("#street").val("Haberdashery 1");
            $("#apartment").val("A");
            $("#city").val("Red Rock");
            $("#zip").val("12345");
        }

        function checkTermsAcceptance()
        {
            if( $("#terms_checkbox").prop("checked") == false )
            {
                showErrorAndScrollUp("The terms and conditions and the privacy policy must be accepted before payment.");
                return false;
            }

            return true;
        }

        function showErrorAndScrollUp(errorText)
        {
            $("#paymentErrorAlert").hide();
            $("#validationErrorText").html(errorText);
            $("#validationErrorAlert").show();
            resetFieldsAfterPayFail();
            window.scrollTo(0, 0);
        }

        function appendBasicData(emptyForm)
        {
            emptyForm.append("_token", "{{ csrf_token() }}");
            emptyForm.append("total", $('#total').attr("data-total"));
            emptyForm.append("first_name", $('#first_name').val());
            emptyForm.append("last_name", $('#last_name').val());
            emptyForm.append("phone", $('#phone').val());
            emptyForm.append("street", $('#street').val());
            emptyForm.append("apartment", $('#apartment').val());
            emptyForm.append("city", $('#city').val());
            emptyForm.append("country", $('#country').val());
            emptyForm.append("state", $('#state').val());
            emptyForm.append("zip", $('#zip').val());
            emptyForm.append("currency", "{{$currencyTextRaw}}");
        }

        function appendPaymentData(completeFormData, gatewayKey)
        {
            var inputNames = ["first_name", "last_name", "phone", "street", "apartment",
                            "city", "country", "state", "zip", "total"];

            inputNames.forEach(function(item) {
                $("#" + item + gatewayKey).val(completeFormData.get(item));
            });
        }

        function changeFieldsAfterPayStart()
        {
            $("#validationErrorAlert").hide();
            $("#validationErrorText").html("");
            $("#paymentErrorAlert").hide();
            $("#payStartSpinner").show();

            $("#total").prop("disabled", true);

            $("#first_name").prop("disabled", true);
            $("#last_name").prop("disabled", true);
            $("#email_address").prop("disabled", true);
            $("#phone").prop("disabled", true);
            $("#street").prop("disabled", true);
            $("#apartment").prop("disabled", true);
            $("#city").prop("disabled", true);
            $("#country").prop("disabled", true);
            $("#state").prop("disabled", true);
            $("#zip").prop("disabled", true);

            $("#terms_checkbox").prop("disabled", true);

            if( $("#btPayStartBtn").length )
            {
                $("#btPayStartBtn").prop("disabled", true);
            }

            if( $("#payStartBtnStripe").length )
            {
                $("#payStartBtnStripe").prop("disabled", true);
            }
        }

        function resetFieldsAfterPayFail()
        {
            $("#payStartSpinner").hide();

            $("#total").prop("disabled", false);

            $("#first_name").prop("disabled", false);
            $("#last_name").prop("disabled", false);
            $("#email_address").prop("disabled", false);
            $("#phone").prop("disabled", false);
            $("#street").prop("disabled", false);
            $("#apartment").prop("disabled", false);
            $("#city").prop("disabled", false);
            $("#country").prop("disabled", false);
            $("#state").prop("disabled", false);
            $("#zip").prop("disabled", false);

            $("#terms_checkbox").prop("disabled", false);

            if( $("#btPayStartBtn").length )
            {
                $("#btPayStartBtn").prop("disabled", false);
            }

            if( $("#payStartBtnStripe").length )
            {
                $("#payStartBtnStripe").prop("disabled", false);
            }
        }

        function beautifyJson(passedStr)
        {
            passedStr = passedStr.replace(/{/g, "");
            passedStr = passedStr.replace(/}/g, "");
            passedStr = passedStr.replace(/\[/g, "");
            passedStr = passedStr.replace(/]/g, "");
            passedStr = passedStr.replace(/,/g, "");
            passedStr = passedStr.replace(/"/g, "");
            passedStr = passedStr.replace(/:/g, ": ");
            passedStr = passedStr.replace(/\./g, ".</br>");

            return passedStr;
        }

        function loadStates(currentState)
        {
            var stateSelect = $('#state');
            stateSelect.empty();

            var countryVal = $('#country').val();
            var allCountries = @json($countries);
            var i = 0;
            var allCountriesLength = allCountries.length;
            var countryIndex = 0;
            for(i = 0; i < allCountriesLength; i++)
            {
                if(allCountries[i].code == countryVal)
                {
                    countryIndex = i;
                    break;
                }
            }

            var statesLength = allCountries[countryIndex].states_in_order.length;
            for(i = 0; i < statesLength; i++)
            {
                if(allCountries[countryIndex].states_in_order[i].state_code == currentState)
                {
                    stateSelect.append('<option value="' + allCountries[countryIndex].states_in_order[i].state_code + '" selected>' + allCountries[countryIndex].states_in_order[i].state_name + '</option>');
                }
                else
                {
                    stateSelect.append('<option value="' + allCountries[countryIndex].states_in_order[i].state_code + '">' + allCountries[countryIndex].states_in_order[i].state_name + '</option>');
                }
            }
        }
    </script>


    @if($braintreeEnabled)
        <script src="https://js.braintreegateway.com/web/dropin/1.25.0/js/dropin.min.js"></script>

        <script>
            var basicFormBt;
            var formBrainTree = document.querySelector('#payment-form-bt');
            var client_token = "{{ $btToken }}";
            var btInstance = {};
            braintree.dropin.create({
                authorization: client_token,
                selector: '#bt-dropin',
                dataCollector: {},
                threeDSecure: true,

                }, function (createErr, instance) {
                    if (createErr) {
                    console.log('Create Error', createErr);
                    return;
                }
                formBrainTree.addEventListener('submit', function (event) {
                    event.preventDefault();
                    var termsAreChecked = checkTermsAcceptance();
                    if(termsAreChecked == false)
                    {
                        return;
                    }
                    changeFieldsAfterPayStart();
                    basicFormBt = new FormData();
                    appendBasicData(basicFormBt);
                    btInstance = instance;
                    validateData();
                });
            });
            function validateData()
            {
                $.ajax({
                    url: "{{ url('checkout/validate') }}" + "/" + "{{$program->id}}" + "/" + "{{$program->slug}}",
                    method: "POST",
                    data: basicFormBt,
                    processData: false,
                    contentType: false,
                    success: function(result) {
                        if( result.hasOwnProperty("successful_validation") )
                        {
                            completeBraintreePayment();
                        }
                        else
                        {
                            var fieldErrors = JSON.stringify(result, null, 1);
                            fieldErrors = beautifyJson(fieldErrors);
                            showErrorAndScrollUp(fieldErrors);
                            return;
                        }
                    },
                    error: function(result) {
                        showErrorAndScrollUp("Unknown error during validation.");
                        return;
                    }
                });
            }
            function completeBraintreePayment()
            {
                var threeDSecureParameters = {
                    amount: basicFormBt.get("total"),
                    email: $("#email_address").val(),
                    billingAddress: {
                        givenName: basicFormBt.get("first_name"),
                        surname: basicFormBt.get("last_name"),
                        phoneNumber: basicFormBt.get("phone"),
                        streetAddress: basicFormBt.get("street"),
                        extendedAddress: basicFormBt.get("apartment"),
                        locality: basicFormBt.get("city"),
                        region: basicFormBt.get("state"),
                        postalCode: basicFormBt.get("zip"),
                        countryCodeAlpha2: basicFormBt.get("country")
                    }
                }
                btInstance.requestPaymentMethod({
                    threeDSecure: threeDSecureParameters
                }, function (err, payload) {
                    if (err)
                    {
                        showErrorAndScrollUp("Invalid payment method");
                        return;
                    }
                    document.querySelector('#nonce_bt').value = payload.nonce;
                    document.querySelector('#program_bt').value = "{{$program->id}}";
                    appendPaymentData(basicFormBt, "_bt");
                    $("#processingModal").modal('show');
                    formBrainTree.submit();
                });
            }
        </script>

    @endif
    @if($stripeEnabled)
        <script src="https://js.stripe.com/v3/"></script>

        <script>
            var stripePubKey = @json($stripePubKey);
            var stripe = Stripe(stripePubKey);
            var elements = stripe.elements();
            var stripeForm = document.querySelector("#payment-form-stripe");
            var paymentIntentId = "0";
            var serverErrorStripe = "server_error_occured_stripe";
            var basicFormStripe;
            var style = {
                base: {
                color: "#32325d",
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: "antialiased",
                fontSize: "16px",
                "::placeholder": {
                    color: "#aab7c4"
                }
                },
                invalid: {
                color: "#fa755a",
                iconColor: "#fa755a"
                }
            };

            var card = elements.create("card", { hidePostalCode: true, style: style });
            card.mount("#stripe-card-element");

            stripeForm.addEventListener("submit", function(event) {
                event.preventDefault();

                var termsAreChecked = checkTermsAcceptance();
                if(termsAreChecked == false)
                {
                    return;
                }
                changeFieldsAfterPayStart();
                basicFormStripe = new FormData();
                appendBasicData(basicFormStripe);
                validateDataStripe();
            });

            function validateDataStripe()
            {
                $.ajax({
                    url: "{{ url('checkout/validate') }}" + "/" + "{{$program->id}}" + "/" + "{{$program->slug}}",
                    method: "POST",
                    data: basicFormStripe,
                    processData: false,
                    contentType: false,
                    success: function(result) {
                        if( result.hasOwnProperty("successful_validation") )
                        {
                            completeStripePayment();
                        }
                        else
                        {
                            var fieldErrors = JSON.stringify(result, null, 1);
                            fieldErrors = beautifyJson(fieldErrors);
                            showErrorAndScrollUp(fieldErrors);
                            return;
                        }
                    },
                    error: function(result) {
                        showErrorAndScrollUp("Unknown error during validation.");
                        return;
                    }
                });
            }

            function completeStripePayment()
            {
                fetch("{{ url('payment/stripe') }}" + "/" + paymentIntentId, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-Token": "{{ csrf_token() }}",
                    },
                    body: JSON.stringify({
                        amount: basicFormStripe.get("total"),
                        currency: chosenCurrency,
                    }),
                }).then(function(res) {
                    if(!res.ok)
                    {
                        return serverErrorStripe;
                    }
                    else
                    {
                        return res.json();
                    }
                }).then(function(data){
                    if(data == serverErrorStripe)
                    {
                        showErrorAndScrollUp("Unknown error occured during Stripe payment");
                        return;
                    }
                    paymentIntentId = data.id;
                    stripe.confirmCardPayment(data.client_secret, {
                        payment_method: {
                            card: card,
                            billing_details: {
                                name: basicFormStripe.get("first_name") + " " + basicFormStripe.get("last_name"),
                                email: $("#email_address").val(),
                                address: {
                                    country: basicFormStripe.get("country"),
                                    state: basicFormStripe.get("state"),
                                    city: basicFormStripe.get("city"),
                                    line1: basicFormStripe.get("street"),
                                    line2: basicFormStripe.get("apartment"),
                                    postal_code: basicFormStripe.get("zip")
                                },
                            },
                        },
                    }).then(function(data){
                        if(data.error)
                        {
                            showErrorAndScrollUp(data.error.message);
                            return;
                        }
                        else if(data.paymentIntent)
                        {
                            document.querySelector('#program_stripe').value = "{{$program->id}}";
                            document.querySelector('#transaction_stripe').value = data.paymentIntent.id;
                            appendPaymentData(basicFormStripe, "_stripe");
                            $("#processingModal").modal('show');
                            stripeForm.submit();
                        }
                    });
                });
            }
        </script>

    @endif
    @if($payPalSmartEnabled)

        <script src="https://www.paypal.com/sdk/js?client-id=AS0aPvWjYbPpGok0CXhwd0Nlt4p86acdwqvhI7PJQX5pUEbH48acZMQj-QSL98FDSjOmXrfHgQoM66YB&currency=MYR"></script>

        <script>
            var serverErrorPaypal = "server_error_occured_paypal";
            var basicFormPaypal;

            paypal.Buttons({
                createOrder: function(data, actions)
                {
                    var paypalAmount = basicFormPaypal.get("total");
                    var adjustedAmount = adjustPaypalAmount(paypalAmount, chosenCurrency);
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                currency_code: chosenCurrency,
                                value: adjustedAmount
                            }
                        }],
                        application_context: {
                            shipping_preference: 'NO_SHIPPING'
                        }
                    });
                },

                onCancel: function (data) {
                    resetFieldsAfterPayFail();
                },

                onApprove: function(data, actions) {
                    return actions.order.capture().then(function(details) {
                        $("#processingModal").modal('show');
                        document.querySelector('#program_paypal').value = "{{$program->id}}";
                        document.querySelector('#transaction_paypal').value = details.purchase_units[0].payments.captures[0].id;
                        appendPaymentData(basicFormPaypal, "_paypal");
                        var paypalForm = document.querySelector("#payment-form-paypal-smart");
                        paypalForm.submit();
                    });
                },

                onClick: function(data, actions)
                {
                    var termsAreChecked = checkTermsAcceptance();
                    if(termsAreChecked == false)
                    {
                        return actions.reject();
                    }
                    changeFieldsAfterPayStart();
                    basicFormPaypal = new FormData();
                    appendBasicData(basicFormPaypal);
                    return fetch("{{ url('checkout/validate') }}" + "/" + "{{$program->id}}" + "/" + "{{$program->slug}}", {
                        method: "POST",
                        body: basicFormPaypal
                    }).then(function(res){
                        if(!res.ok)
                        {
                            return serverErrorPaypal;
                        }
                        else
                        {
                            return res.json();
                        }
                    }).then(function(data){
                        if(data == serverErrorPaypal)
                        {
                            showErrorAndScrollUp("Unknown error occured during PayPal Smart payment");
                            return actions.reject();
                        }
                        else if(data.successful_validation)
                        {
                            return actions.resolve();
                        }
                        else
                        {
                            var beautifiedError = beautifyJson(JSON.stringify(data));
                            showErrorAndScrollUp(beautifiedError);
                            return actions.reject();
                        }
                    });
                }
            }).render('#tm-paypal-smart-placement');

            function adjustPaypalAmount(amountForPaypal, paypalCurrency)
            {
                if( (paypalCurrency == "HUF") || (paypalCurrency == "JPY") || (paypalCurrency == "TWD") )
                {
                    return parseInt(amountForPaypal);
                }

                return amountForPaypal;
            }
        </script>

    @endif
@endpush

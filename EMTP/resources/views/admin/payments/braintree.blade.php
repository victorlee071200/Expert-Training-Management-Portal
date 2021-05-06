@extends('layouts.backend.admin-app')

@push('css')
<link rel="stylesheet" href="{{ asset('public/assets/backend/css/custom-admin.css') }}">
@endpush

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="card card-secondary" style="margin-top: 100px;">
                @if(session('successMsg'))
                    <div class="alert alert-success alert-dismissible fade show mt-1" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <strong>{{ session('successMsg') }}</strong>
                    </div>
                @endif
                <div class="card-header">
                    <h3 class="card-title">Braintree Settings</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <form action="{{route('admin.braintree.update')}}" method="POST" class="mt-2 mb-2">
                    @csrf
                    @method('PUT')

                        <div class="form-group row option-item">
                            <div class="col-6">
                                <p class="option-main-title">SELECT ENVIRONMENT</p>
                                <p class="option-description">Select if you want to use the payment method in sandbox or production mode. For testing select "Sandbox", for live sales select "production".</p>

                            </div>
                            <div class="col-6">
                                <select name="braintree_environment" class="form-control" autocomplete="off">
                                    <option value="sandbox" {{ (old("braintree_environment", $braintreeSettings->braintree_environment) == "sandbox" ? "selected":"")}}>Sandbox</option>
                                    <option value="production" {{ (old("braintree_environment", $braintreeSettings->braintree_environment) == "production" ? "selected":"")}}>Production</option>
                                </select>
                                <p style="color:red;">{{ $errors->first('braintree_environment') }}</p>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group row option-item">
                            <div class="col-6">
                                <p class="option-main-title">SANDBOX MERCHANT ID</p>
                                <p class="option-description">Your sandbox merchant ID is the unique identifier for your entire gateway sandbox (test) account.</p>

                            </div>
                            <div class="col-6">
                                <input class="form-control" type="text" name="braintree_sandbox_merchant_id" id="title-text-input" value="{{old('braintree_sandbox_merchant_id', $braintreeSettings->braintree_sandbox_merchant_id)}}">
                                <p style="color:red;">{{ $errors->first('braintree_sandbox_merchant_id') }}</p>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group row option-item">
                            <div class="col-6">
                                <p class="option-main-title">SANDBOX PUBLIC KEY</p>
                                <p class="option-description">This is your user-specific public identifier.</p>

                            </div>
                            <div class="col-6">
                                <input class="form-control" type="text" name="braintree_sandbox_public_key" id="title-text-input" value="{{old('braintree_sandbox_public_key', $braintreeSettings->braintree_sandbox_public_key)}}">
                                <p style="color:red;">{{ $errors->first('braintree_sandbox_public_key') }}</p>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group row option-item">
                            <div class="col-6">
                                <p class="option-main-title">SANDBOX PRIVATE KEY</p>
                                <p class="option-description">This is your user-specific private identifier. </p>

                            </div>
                            <div class="col-6">
                                <input class="form-control" type="text" name="braintree_sandbox_private_key" id="title-text-input" value="{{old('braintree_sandbox_private_key', $braintreeSettings->braintree_sandbox_private_key)}}">
                                <p style="color:red;">{{ $errors->first('braintree_sandbox_private_key') }}</p>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group row option-item">
                            <div class="col-6">
                                <p class="option-main-title">PRODUCTION MERCHANT ID</p>
                                <p class="option-description">Your production merchant ID is the unique identifier for your entire gateway production (live) account. </p>

                            </div>
                            <div class="col-6">
                                <input class="form-control" type="text" name="braintree_production_merchant_id" id="title-text-input" value="{{old('braintree_production_merchant_id', $braintreeSettings->braintree_production_merchant_id)}}">
                                <p style="color:red;">{{ $errors->first('braintree_production_merchant_id') }}</p>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group row option-item">
                            <div class="col-6">
                                <p class="option-main-title">PRODUCTION PUBLIC KEY</p>
                                <p class="option-description">This is your user-specific public identifier.</p>

                            </div>
                            <div class="col-6">
                                <input class="form-control" type="text" name="braintree_production_public_key" id="title-text-input" value="{{old('braintree_production_public_key', $braintreeSettings->braintree_production_public_key)}}">
                                <p style="color:red;">{{ $errors->first('braintree_production_public_key') }}</p>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group row option-item">
                            <div class="col-6">
                                <p class="option-main-title">PRODUCTION PRIVATE KEY</p>
                                <p class="option-description">This is your user-specific private identifier.</p>

                            </div>
                            <div class="col-6">
                                <input class="form-control" type="text" name="braintree_production_private_key" id="title-text-input" value="{{old('braintree_production_private_key', $braintreeSettings->braintree_production_private_key)}}">
                                <p style="color:red;">{{ $errors->first('braintree_production_private_key') }}</p>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group row mb-0 mt-4">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary mt-5">Save</button>
                            </div>
                        </div>

                    </form>

                </div>

            </div>

        </div><!--/. container-fluid -->
    </section> <!-- /.content -->

  </div><!-- /.content-wrapper -->

@endsection


@push('js')

@endpush

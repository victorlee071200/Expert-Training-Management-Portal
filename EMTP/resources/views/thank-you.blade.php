@extends('layouts.app')

@push("css")

@endpush

@section('content')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <section id="hero">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title">
                                <h1>Order Confirmation</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="thanks-content">

            <div class="container">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="check d-flex justify-content-center">
                            <i class="far fa-check-circle"></i>
                        </div>
                        <div class="description mt-5">
                            <h3>Thank you for your purchase!</h3>
                        <p> <a href="{{ route('client.dashboard.index') }}" class="btn btn-primary mt-5">Go to dashboard</a></p>
                        </div>
                    </div>
                </div>

            </div>
            </section>
        </div>
    </div>
</div>



@endsection


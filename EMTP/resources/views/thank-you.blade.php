@extends('layouts.app')

@push("css")

@endpush

@section('content')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            {{-- put your content here --}}
            <h1 class="text-3xl text-center font-bold mt-5">Payment Successful</h1>
            <div class="w-auto text-center grid grid-cols-1 md:grid-cols-2 m-5">
                <!--Go to Payment Method-->
                <a href="{{ route('client.dashboard.index') }}">
                    <button class="bg-white text-gray-800 font-bold text-center rounded border-2 border-blue-500 hover:border-blue-600 hover:bg-blue-500 hover:text-white shadow-md py-4 px-6 mx-2 my-2">
                        <span class="p-10">Go to Dashboard</span>
                    </button>
                </a>
                <!--Go to Booking Form-->
                <a href="/client/program">
                    <button class="bg-white text-gray-800 font-bold text-center rounded border-2 border-red-500 hover:border-red-600 hover:bg-red-500 hover:text-white shadow-md py-4 px-6 mx-2 my-2">
                        <span class="p-10">Continue Search</span>
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>



@endsection


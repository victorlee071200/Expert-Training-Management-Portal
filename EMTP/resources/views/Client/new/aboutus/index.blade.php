@extends('layouts.app')

@section('content')


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- start your content here --}}
                <h1>This is the EMTP Training Programme Module where we strive to give you the training you want to discover
                    and learn for yourself.
                    The company have been established for over a year. Although recent, we have achieved greatly in helping
                    customers to find the right
                    training programme for them and is well-known in Malaysia. Enstrusting your trust in us greatly
                    appreciated.
                </h1>
                <h2>Please click on the button below if you have further inquiries by filling in the form.</h2>
            </div>
        </div>
    </div>

    <button
        class="bg-blue hover:bg-blue-light text-black font-bold py-2 px-4 border-b-4 border-blue-dark hover:border-blue rounded">
        <a href="{{ route('client.help-questions') }}">Help</a>
    </button>



@endsection

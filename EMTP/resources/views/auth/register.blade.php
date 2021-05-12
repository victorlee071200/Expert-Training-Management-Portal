@extends('layouts.guest')

@section('content')

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>
            <a href="/">
                <svg class="w-16 h-16" viewbox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.395 44.428C4.557 40.198 0 32.632 0 24 0 10.745 10.745 0 24 0a23.891 23.891 0 0113.997 4.502c-.2 17.907-11.097 33.245-26.602 39.926z" fill="#6875F5"/>
                    <path d="M14.134 45.885A23.914 23.914 0 0024 48c13.255 0 24-10.745 24-24 0-3.516-.756-6.856-2.115-9.866-4.659 15.143-16.608 27.092-31.75 31.751z" fill="#6875F5"/>
                </svg>
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div class="text-center">
            <h1 class="my-3 text-3xl font-semibold text-gray-700 dark:text-gray-200">Create an Account</h1>
            <p class="text-gray-500 dark:text-gray-400">Register a new account</p>
        </div>
        <div class="m-7">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <!--Name field-->
                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Name</label>
                    <input id="name" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="e.g John" />
                </div>
                <!--email field-->
                <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Email Address</label>
                    <input id="email" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" type="email" name="email" :value="old('email')" required placeholder="your@email.com"/>
                </div>
                <!--password field-->
                <div class="mb-6">
                    <label for="password" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Password</label>
                    <input id="password" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" type="password" name="password" required autocomplete="new-password" placeholder="Your Password"/>
                </div>
                <!--password confirmation field-->
                <div class="mb-6">
                    <label for="password_confirmation" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Confirm Password</label>
                    <input id="password_confirmation" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Your Password"/>
                </div>

                <div class="flex items-center justify-end mb-6">
                    <button class="w-full px-3 py-4 text-white bg-indigo-500 rounded-md focus:bg-indigo-600 focus:outline-none text-center">
                        {{ __('Register') }}
                    </button>
                </div>
                <p class="text-sm text-center text-gray-400">Already Register? <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">{{ __('Sign In') }}</a></p>
            </form>
        </div>
        </div>

@endsection

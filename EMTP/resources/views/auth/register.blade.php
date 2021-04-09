<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <div class="max-w-md mx-auto my-10">
            <div class="text-center">
                <h1 class="my-3 text-3xl font-semibold text-gray-700 dark:text-gray-200">Sign Up</h1>
                <p class="text-gray-500 dark:text-gray-400">Register a new user</p>
            </div>
            <div class="m-7">
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Name') }}</label>
                        <input type="text" name="name" id="name" placeholder="Username" value="{{ old('name') }}"  autocomplete="name" required class=" @error('name') is-invalid @enderror w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />

                        {{-- @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror --}}
                    </div>
                    <div class="mb-6">
                        <label for="phone" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Phone') }}</label>
                        <input type="text" name="phone" id="phone" value="{{ old('phone') }}" placeholder="Phone Number" autocomplete="name" required class="@error('phone') is-invalid @enderror w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />

                        {{-- @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror --}}
                    </div>
                    <div class="mb-6">
                        <label for="email" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">{{ __('E-Mail Address') }}</label>
                        <input type="email" name="email" id="email" placeholder="your@email.com" autocomplete="email" value="{{ old('email') }}" required class="@error('email') is-invalid @enderror w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />

                        {{-- @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror --}}
                    </div>
                    <div class="mb-6">
                        <div class="flex justify-between mb-2">
                            <label for="password" class="text-sm text-gray-600 dark:text-gray-400">{{ __('Password') }}</label>
                        </div>
                        <input type="password" name="password" id="password" placeholder="Your Password" autocomplete="current-password" required class="@error('password') is-invalid @enderror w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />

                        {{-- @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror --}}
                    </div>

                    <div class="mb-6">
                        <label for="password-confirm" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Confirm Password') }}</label>
                        <input type="password" name="password_confirmation" id="password-confirm" required autocomplete="new-password" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                    </div>

                    <div class="mb-6">                      
                        <button type="submit" class="w-full px-3 py-4 text-white bg-indigo-500 rounded-md focus:bg-indigo-600 focus:outline-none">{{ __('Register') }}</button>
                    </div>
                    <p class="text-sm text-center text-gray-400">Have an account ? <a href="/login" class="text-indigo-400 focus:outline-none focus:underline focus:text-indigo-500 dark:focus:border-indigo-800">Sign In</a>.</p>
                </form>
            </div>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>

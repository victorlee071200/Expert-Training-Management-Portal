<x-guest-layout>
    <div class="min-w-screen min-h-screen bg-indigo-300 flex items-center p-5 lg:p-10 overflow-hidden relative">
        <div class="w-full max-w-6xl rounded bg-white shadow-xl p-10 lg:p-20 mx-auto text-gray-800 relative md:text-left">
            <div class="md:flex items-center -mx-10">
                <div class="w-full md:w-1/2 px-10 mb-10 md:mb-0">
                    <div class="relative">
                        <a href="/">
                            <svg class="w-full relative z-10" viewbox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.395 44.428C4.557 40.198 0 32.632 0 24 0 10.745 10.745 0 24 0a23.891 23.891 0 0113.997 4.502c-.2 17.907-11.097 33.245-26.602 39.926z" fill="#6875F5"/>
                                <path d="M14.134 45.885A23.914 23.914 0 0024 48c13.255 0 24-10.745 24-24 0-3.516-.756-6.856-2.115-9.866-4.659 15.143-16.608 27.092-31.75 31.751z" fill="#6875F5"/>
                            </svg>
                        </a>
                        
                        {{-- <img src="https://pngimg.com/uploads/raincoat/raincoat_PNG53.png" class="w-full relative z-10" alt=""> --}}
                        <div class="border-4 border-gray-300 absolute top-10 bottom-10 left-10 right-10 z-0"></div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 px-10">
                    <div class="mb-10">
                        <h2 class="text-3xl font-semibold text-gray-800 md:text-4xl">Verify <span class="text-indigo-600">Your Email Address</span></h2>
                        <div class="my-3 text-2xl font-semibold text-indigo-500 dark:text-gray-200">
                            {{ __('Thanks for signing up!') }}
                        </div>
                        <p class="mt-2 text-sm text-gray-500 md:text-base">Before getting started, could you verify your email address by clicking on the link we just emailed to you?<br> If you didn't receive the email, please check your <strong>"Spam"</strong> or <strong>"Bulk Email"</strong> folder. You can also click the resend button below to have another email sent to you.</p>
                        @if (session('status') == 'verification-link-sent')
                            <div class="mb-4 font-medium text-sm text-green-500">
                                <br>
                                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                            </div>
                        @endif
                    </div>
                    <div class="mt-4 flex items-center justify-between">
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf
            
                            <div>
                                <x-jet-button type="submit" class="px-4 py-3 text-sm rounded text-indigo-200 bg-indigo-500 hover:bg-indigo-700 hover:text-white">
                                    {{ __('Resend Verification Email') }}
                                </x-jet-button>
                            </div>
                        </form>
            
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
            
                            <button type="submit" class="underline text-sm text-indigo-600 hover:text-indigo-900">
                                {{ __('Log Out') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>
        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-500">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-jet-button type="submit" class="bg-indigo-500">
                        {{ __('Resend Verification Email') }}
                    </x-jet-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-indigo-600 hover:text-indigo-900">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </x-jet-authentication-card> --}}
</x-guest-layout>



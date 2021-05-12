<x-app-layout title="About Us">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('About Us') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- start your content here --}}
                <h1>This is the EMTP Training About Us</h1>
                <h2>Please click on the button below if you have further inquiries by filling in the form.</h2>
            </div>
        </div>
    </div>

    <button
        class="bg-blue hover:bg-blue-light text-black font-bold py-2 px-4 border-b-4 border-blue-dark hover:border-blue rounded">
        <a href="{{ route('client.help-questions') }}">Help</a>
    </button>
</x-app-layout>

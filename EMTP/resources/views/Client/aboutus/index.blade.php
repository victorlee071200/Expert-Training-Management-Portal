<x-app-layout title="About Us">
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
            {{ __('About Us') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h1>This is the EMTP Training Company</h1>
                <h2>For further inquiries, click the button below to fill in a form for any of your doubts.</h2>
            </div>
        </div>
    </div>

    <button
        class="bg-blue text-black font-bold py-2 px-4 border-b-4 hover:border-b-2 hover:border-t-2 border-blue-dark hover:border-blue rounded">
        <a href="help-questions">Help</a>
    </button>
</x-app-layout>

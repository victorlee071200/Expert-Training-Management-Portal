<x-app-layout>
    <x-slot name="header">
        <!--Search bar-->
        <div class="w-full h-11 bg-white flex border border-black border-width-2">
            <!--Search Input-->
            <input type="search" name="search" id="search" placeholder="Search for Training Program" class="border-none w-full"/>
            <!--Search icon button-->
            <button type="button" class="hover:bg-gray-100 py-2 px-5 border-l border-black">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6">
                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </button>
        </div>

        <!--Search result-->
        <div>
            <p>Search result</p>
        </div>
    </x-slot>
</x-app-layout>

@extends('layouts.admin')

@section('container')

<div class="bg-white sm:rounded-lg flex">
    <div class="block w-full min-h-screen">
        <form method="POST" action="{{ route('admin.program-announcement', $program_details->id) }}" class="w-auto m-5" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="w-auto mx-3 mb-6">
                <div class="px-3">
                    <label class="text-gray-700 text-xl font-bold mb-2" for="title">Title</label>
                    <input id="title" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 focus:outline-none focus:bg-white focus:border-gray-500" type="text" name="title" required autofocus autocomplete="name" />
                </div>
            </div>
            <div class="w-auto mx-3 mb-6">
                <div class="px-3">
                    <label class="text-gray-700 text-xl font-bold mb-2" for="title">Content</label>
                    <textarea id="content" class="h-96 appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 focus:outline-none focus:bg-white focus:border-gray-500" type="text" name="content" required autofocus autocomplete="name"></textarea>
                </div>
            </div>
            <div class="w-auto mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block text-gray-700 text-xl font-bold mb-2" for="option">
                        Status
                    </label>
                    <div class="relative">
                        <select id="state" name="state" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded focus:outline-none focus:bg-white focus:border-gray-500">
                            <option value="ACTIVE">Active</option>
                            <option value="INACTIVE">Inactive</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="mx-3 mb-6 px-3 text-right grid grid-cols-2">
                <a href="{{ route('admin.program-announcement', $program_details->id) }}" class="mr-5 w-auto text-center shadow focus:shadow-outline bg-red-400 focus:outline-none text-gray-200 hover:bg-red-600 hover:text-white font-bold py-2 px-4 rounded">
                    Back
                </a>
                <button id="submit" name="submit" class="w-auto shadow focus:shadow-outline bg-indigo-400 focus:outline-none text-gray-200 hover:bg-indigo-600 hover:text-white font-bold py-2 px-4 rounded" >
                    Create
                </button>
            </div>
        </form>
    </div>
</div>

@endsection

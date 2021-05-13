@extends('layouts.admin')

@section('container')

<div class="bg-white sm:rounded-lg flex">
    <div class="block w-full min-h-screen">
        <div class="mb-5">
            <h2 class="text-3xl font-bold text-gray-800 py-4 px-4 border-b border-gray-100 w-full">
                {{ __('Announcement ') }} - {{$program_details->code}} {{$program_details->name}}
            </h2>
        </div>
        <div class="p-3 mx-2">
            <table class="w-full">
                <tr class="grid-cols-1">
                    <td>
                        <button class="m-5 px-5 py-2 bg-green-400 rounded text-sm">
                            <a href="{{ route('admin.program-announcement-create', $program_details->id) }}">
                                Create Announcement
                            </a>
                        </button>
                    </td>
                </tr>
                @foreach($announcement as $indexKey => $announcements)
                    <tr class="grid-cols-1 rounded shadow-sm m-2 hover:bg-gray-50">
                        <th class="w-auto py-5 px-2 m-0">
                            <a href="{{ route('admin.program-specific-announcement', [$program_details->id, $announcements->id]) }}">
                                <h2 class="text-left pl-10">{{$announcements->title}}</h2>
                            </a>
                        </th>
                        <th class="w-4">
                            <a href="{{ route('admin.program-announcement-edit', [$program_details->id, $announcements->id]) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                            </a>
                        </th>
                        <th class="w-4">
                            <form method="POST" action="{{ route('admin.program-announcement-delete', [$program_details->id, $announcements->id]) }}">
                                @method('DELETE')
                                @csrf
                                <button id="submit" name="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </th>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

@endsection

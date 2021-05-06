@extends('layouts.backend.admin-app')

@push('css')

@endpush

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="card card-secondary" style="margin-top: 100px;">
                <div class="card-header">
                    <h3 class="card-title">Programs</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                @if(session('successMsg'))
                    <div class="alert alert-success alert-dismissible fade show mt-1" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <strong>{{ session('successMsg') }}</strong>
                    </div>
                @endif

                @if(session('failureMsg'))
                    <div class="alert alert-danger alert-dismissible fade show mt-1" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <strong>{{ session('failureMsg') }}</strong>
                    </div>
                @endif

                   <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($programs as $program)
                                    <tr>
                                        <td>{{$program->id}}</td>
                                        <td>{{$program->title}}</td>
                                        <td>{{Str::limit($program->description, 20, '...')}}</td>
                                        <td>{{$currency}}{{App\Helpers\CurrencyHelper::getSetPriceFormat($program->price)}}</td>
                                        <td>{{Carbon\Carbon::parse($program->created_at)->format('Y.m.d')}}</td>
                                        <td><a href="{{route('admin.programs.edit', $program->id)}}">Edit</a> - <a href="#" onclick="document.getElementById('delete-{{$program->id}}').submit(); return false;">Delete</a>
                                            <form action="{{route('admin.programs.destroy', $program->id)}}" id="delete-{{$program->id}}" method="POST" style="display:none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            - <a href="{{route('programs.show', $program->id)}}" target="_blank">View</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                   </div>
                   {{ $programs->links() }}
                </div>

            </div>

        </div><!--/. container-fluid -->
    </section> <!-- /.content -->

  </div><!-- /.content-wrapper -->

@endsection

@push('js')

@endpush


@extends('layouts.admin')

@push('css')

@endpush

@section('container')

<div class="flex flex-col items-start justify-between pb-6 space-y-4 border-b lg:items-center lg:space-y-0 lg:flex-row">
    <h1 class="text-2xl font-semibold whitespace-nowrap">
        Welcome to your dashboard
    </h1>


  </div>

  <div class="flex flex-col mt-6">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
            <div class="overflow-hidden border-b border-gray-200 rounded-md shadow-md">

                <table class="min-w-full overflow-x-scroll divide-y divide-gray-200">
                    <thead class="">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase">Title</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-center uppercase">Description</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-center uppercase">Price</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-center uppercase">Date</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-center uppercase">Actions</th>
                            </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        
                        @foreach ($programs as $program)
                            <tr class="transition-all hover:shadow-lg">
                                <td class="px-6 py-4 whitespace-nowrap text-left">
                                    <div class="text-sm font-medium">{{$program->id}}</div>
                                    <div class="text-sm">{{$program->title}}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <div class="text-sm">{{Str::limit($program->description, 20, '...')}}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">

                                    <span class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">{{$currency}}{{App\Helpers\CurrencyHelper::getSetPriceFormat($program->price)}}</span>

                                </td>
                                <td class="px-6 py-4 text-sm whitespace-nowrap text-center">
                                    <span class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">{{Carbon\Carbon::parse($program->created_at)->format('Y.m.d')}}</span>

                                </td>

                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <a class="font-medium " href="{{route('admin.programs.show', $program->id)}}">
                                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </div>
                                        </a>
                                        <a class="font-medium " href="{{route('admin.programs.edit', $program->id)}}">
                                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </div>
                                        </a>
                                        <button type="button" class="w-4 mr-2 transform hover:text-red-500 hover:scale-110"
                                         onclick="event.preventDefault();
                                         document.getElementById('delete-user-form-{{ $program->id }}').submit();
                                        ">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        </button>

                                        <form id="delete-user-form-{{ $program->id }}" action="{{route('admin.programs.destroy', $program->id)}}" method="POST" style="display: none">
                                            @csrf
                                            @method('DELETE')

                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<h3 class="mt-6 text-xl">
    Dashboard
</h3>
@endsection


@push('js')

@endpush



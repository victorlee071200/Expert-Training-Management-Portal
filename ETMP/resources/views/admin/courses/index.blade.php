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

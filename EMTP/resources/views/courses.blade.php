@extends('layouts.app')

@section('title', 'Programs')

@push("css")

@endpush

@section('content')
<section id="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h1>Programs</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="thanks-content">

<div class="container">

    <div class="row">
        <div class="col-sm-6 col-md-12 col-lg-12">
            @foreach($programs as $program)
                <div class="program-container mb-5">
                    <div class="media">
                        <div class="program-img">
                        <img src="{{ asset('public/uploads/images/' . $program->image) }}" class="img-fluid mr-3" alt="">
                        </div>
                        <div class="media-body">
                            <h2><a href="{{ route('admin.courses.show', $program->id) }}">{{$program->title}}</a></h2>
                                 <p>{{$program->description}}</p>
                            <div>
                                <a href="{{ route('admin.courses.show', $program->id) }}" class="btn btn-primary mt-3">Go to program <i class="fas fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
        <div class="program-pagination">
        {{$programs->links()}}
        </div>

        </div>
    </div>

</div>

</section>



@endsection

@push("js")

@endpush


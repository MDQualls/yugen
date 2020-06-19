@extends('layouts.admin')

@include('partials.admin.galleryheader')

@section('section_actions')
    <div class="col-md-3">
        <a href="{{ route('galleryadmin.create') }}" class="btn bg-brown btn-block text-white"><i class="fas fa-plus"></i> Add Gallery</a>
    </div>
    <div class="col-md-3">
        <a href="{{ route('dashboard') }}" class="btn btn-light btn-block"><i class="fas fa-arrow-left"></i> Back to Dashboard</a>
    </div>
@endsection('section_actions')

@section('content')

    @foreach($galleries as $gallery)
        <div class="col-md-4 col-sm-12">
            <div class="card">
                <div class="card-header">
                    Photo Gallery
                </div>
                <img class="card-img-top" src="https://via.placeholder.com/150" alt="Card image cap">
                <div class="card-body">
                    <div class="card-title">
                        <h4>{{$gallery->name}}</h4>
                    </div>
                    <div class="card-text">
                        {{$gallery->summary}}
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@extends('layouts.admin')

@include('partials.admin.galleryheader')


@section('section_actions')
    <div class="col-md-3">
        <a href="{{ route('dashboard') }}" class="btn btn-light btn-block"><i class="fas fa-arrow-left"></i> Back to
            Dashboard</a>
    </div>
@endsection('section_actions')

@section('content')
    <div class="col">
        <div class="card card-default">
            <div class="card-header">
                <h4>{{isset($gallery) ? 'Edit' : 'Create'}} Gallery</h4>
            </div>
            <div class="card-body">

                @include('partials.errors')

                <form
                    action="{{isset($gallery) ? route('galleryadmin.update', $gallery->id) : route('galleryadmin.store')}}"
                    method="POST" enctype="multipart/form-data">

                    @csrf
                    @if(isset($gallery))
                        @method('PUT')
                    @endif

                    <div class="form-group">
                        <label for="name">Name</label><span data-for="title" data-role="verification"
                                                            class="ml-2 text-danger"><i
                                class="fas fa-certificate"></i> Required.</span>
                        <input type="text" class="form-control" name="name"
                               value="{{ isset($gallery) ? $gallery->name : '' }}">
                    </div>

                    <div class="form-group">
                        <label for="name">Summary</label>
                        <input type="text" class="form-control" name="summary"
                               value="{{ isset($gallery) ? $gallery->summary : '' }}">
                    </div>

                    <div class="form-group">
                        <label for="name">Cover Image</label>
                        @if(isset($gallery))
                            <h4 class="mb-5">{{$gallery->cover_image}}</h4>
                        @endif

                        <span data-for="cover_image" data-role="verification" class="ml-2 text-danger">
                            <i class="fas fa-certificate"></i> Required.
                        </span>
                        <input type="file" class="form-control" name="cover_image" id="cover_image">
                    </div>

                    <div class="form-group">
                        <button class="btn btn-success bg-brown">
                            {{isset($gallery) ? 'Update' : 'Add'}} Gallery
                        </button>
                        <a href="{{route('galleryadmin.index')}}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

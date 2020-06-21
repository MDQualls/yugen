@extends('layouts.admin')

@include('partials.admin.galleryheader')

@section('section_actions')
    <div class="col-md-3">
        <a href="{{ route('galleryadmin.index') }}" class="btn btn-light btn-block"><i
                class="fas fa-arrow-left"></i>
            Back to Gallery</a>
    </div>
    <div class="col-md-3">
        <a href="{{ route('dashboard') }}" class="btn btn-light btn-block"><i class="fas fa-arrow-left"></i>
            Back to Dashboard</a>
    </div>
@endsection('section_actions')

@section('content')
    <form method="POST" action="{{route('galleryimage.store')}}" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="card">
            <div class="card-header">
                <h4>Add New Image</h4>
            </div>
            <div class="card-body">
                <p class="text-bold">
                    Select new image to add to the {{$gallery->name}} gallery
                </p>
                <div class="form-group">
                    <label for="name">Image</label>
                    <span class="ml-2 text-danger"><i class="fas fa-certificate"></i> Required.</span>
                    <input type="file" class="form-control" name="image" id="image" required>
                </div>
                <div class="form-group">
                    <label for="alt_text">Alt Text</label>
                    <span class="ml-2 text-danger"><i class="fas fa-certificate"></i> Required.</span>
                    <input type="text" class="form-control" name="alt_text" id="alt_text" required>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="cover_image" name="cover_image">
                    <label class="form-check-label ml-2" for="cover_image">Cover Image</label>
                </div>
            </div>
            <div class="card-footer">
                <input type="hidden" id="gallery_id" name="gallery_id" value="{{$gallery->id}}">
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="button" class="btn btn-secondary">Cancel</button>
            </div>
        </div>
    </form>
@endsection

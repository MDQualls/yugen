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
    <div class="col-md-12">

        @include('partials.errors')

        <form method="POST"  onsubmit="return validate_image_post_form()"
              action="{{isset($galleryimage) ? route('galleryimage.update', $galleryimage->id) : route('galleryimage.store')}}"
              enctype="multipart/form-data">
            @csrf
            @if(isset($galleryimage))
                @method('PUT')
            @endif
            <div class="card">
                <div class="card-header">
                    @if(isset($galleryimage))
                        <h4>Edit Image in the {{$gallery->name}} Gallery</h4>
                    @else
                        <h4>Add New Image to the {{$gallery->name}} Gallery</h4>
                    @endif
                </div>
                <div class="card-body">
                    <p class="text-bold">
                        @if(isset($galleryimage))
                            Update the alt text for this image.
                        @else
                            Select new image to add to the {{$gallery->name}} gallery
                        @endif
                    </p>
                    <div class="form-group">
                        <label for="name">Image</label>
                        @if(isset($galleryimage))
                            <h4 class="mb-5">{{$galleryimage->image}}</h4>
                        @else
                            <span data-for="image" data-role="verification" class="ml-2 text-danger"><i class="fas fa-certificate"></i> Required.</span>
                            <input type="file" class="form-control" name="image" id="image">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="alt_text">Alt Text</label>
                        <span data-for="alt_text" data-role="verification" class="ml-2 text-danger"><i class="fas fa-certificate"></i> Required.</span>
                        <input
                            type="text"
                            class="form-control"
                            name="alt_text"
                            id="alt_text"
                            value="{{isset($galleryimage) ? $galleryimage->alt_text : ''}}"
                        >
                    </div>
                    <div class="form-check">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            value="1"
                            id="cover_image"
                            name="cover_image"
                            @if(isset($galleryimage) && $galleryimage->cover_image)
                                checked
                            @endif
                        >
                        <label class="form-check-label ml-2" for="cover_image">Cover Image</label>
                    </div>
                </div>
                <div class="card-footer">
                    <input type="hidden" id="gallery_id" name="gallery_id" value="{{$gallery->id}}">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <a href="{{route('galleryimage.index', $gallery->id)}}" class="btn btn-secondary">Cancel</a>
                </div>
            </div>
        </form>
    </div>

    <div class="modal fade" id="verificationModal" tabindex="-1" role="dialog" aria-labelledby="verificationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-danger">
                <div class="modal-header">
                    <h4 class="modal-title text-white" id="verificationModalLabel">Validation Error</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-white">
                    A required field is blank.  Please review your entries in the required fields and try again.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function iterateRequiredFields()
        {
            var invalid = 0;

            $('span[data-role="verification"]').each(function () {
                var ele = $(this).attr('data-for');
                if ($("#" + ele).val().replace(/(<([^>]+)>)|(&[^\s]*);/ig,"").trim() === "") {
                    $('#verificationModal').modal('show');
                    invalid++;
                }
            });
            return invalid;
        }

        function validate_image_post_form() {
            invalid = iterateRequiredFields();
            return invalid === 0;
        }

    </script>
@endsection

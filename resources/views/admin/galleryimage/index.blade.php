@extends('layouts.admin')

@include('partials.admin.galleryheader')

@section('section_actions')
    <div class="col-md-3">
        <a href="{{ route('galleryadmin.index') }}" class="btn btn-light btn-block"><i class="fas fa-arrow-left"></i>
            Back to Galleries</a>
    </div>
    <div class="col-md-3">
        <a href="{{ route('dashboard') }}" class="btn btn-light btn-block"><i class="fas fa-arrow-left"></i>
            Back to Dashboard</a>
    </div>
@endsection('section_actions')

@section('content')
    <div class="col-md-12 card mb-5">
        <div class="card-body">
            <div class="card-title"><strong>Gallery: {{$gallery->name}}</strong></div>
            <div class="card-text">{{$gallery->summary}}</div>
        </div>
    </div>
    @foreach($images as $image)
        <div class="col-md-3 col-sm-12">
            <div class="card">
                <img class="card-img-top" src="https://via.placeholder.com/150" alt="Card image cap">
                <div class="card-body">
                    <div class="card-text">
                        {{$image->alt_text}}
                    </div>
                </div>
                <div class="card-footer text-center">
                    <a href="{{route('galleryiamgeadmin.edit', $image->id)}}" class="card-link">Edit</a>
                    <a href="#" onclick="handleGalleryImageDelete({{$image->id}})" class="card-link">Delete</a>
                </div>
            </div>
        </div>
    @endforeach
    <div class="col-md-3 col-sm-12">
        <div class="card">
            <div class="card-header">
                Add New Image
            </div>
            <div class="card-body">
                <div class="card-text text-center">
                    <a href="#" onclick="handleGalleryImageAdd()">
                        <i style="font-size: 20rem;color:green" class="fas fa-plus-square"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <form action="" method="post" id="deleteGalleryImageForm">
        @csrf
        @method('delete')
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteGalleryImageLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Delete Image</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-bold">
                            Are you sure you want to delete this gallery image?
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, go back</button>
                        <button type="submit" class="btn btn-danger">Yes, delete</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Add Modal -->
    <form action="" method="post" id="addGalleryImageForm">
        @csrf
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addGalleryImageLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Add New Image</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-bold">
                            Select new image to add to the {{$gallery->name}} gallery
                        </p>
                        <div class="form-group">
                            <label for="name">Image</label>
                            <span data-for="image" data-role="verification" class="ml-2 text-danger">
                                <i class="fas fa-certificate"></i> Required.
                            </span>
                            <input type="file" class="form-control" name="image" id="image" required>
                        </div>
                        <div class="form-group">
                            <label for="alt_text">Alt Text</label>
                            <span data-for="alt_text" data-role="verification" class="ml-2 text-danger">
                                <i class="fas fa-certificate"></i> Required.
                            </span>
                            <input type="text" class="form-control" name="alt_text" id="alt_text" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="gallery_id" name="gallery_id" value="{{$gallery->id}}">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, go back</button>
                        <button type="button" onclick="submitAddGalleryImageForm();" class="btn btn-success">Yes, submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    <script>
        function handleGalleryImageDelete(id) {
            var form = document.getElementById("deleteGalleryImageForm");
            form.action = '/galleryimageadmin/' + id;
            $('#deleteModal').modal('show');
        }

        function handleGalleryImageAdd() {
            var form = document.getElementById("addGalleryImageForm");
            form.action = "{!! route('galleryimageadmin.store') !!}";
            $('#addModal').modal('show');
        }

        function submitAddGalleryImageForm() {
            var form = document.getElementById("addGalleryImageForm");
            form.submit();
        }
    </script>
@endsection

@extends('layouts.admin')

@include('partials.admin.galleryheader')

@section('section_actions')
    <div class="col-md-3">
        <a href="{{ route('galleryadmin.create') }}" class="btn bg-brown btn-block text-white"><i
                class="fas fa-plus"></i> Add Gallery</a>
    </div>
    <div class="col-md-3">
        <a href="{{ route('dashboard') }}" class="btn btn-light btn-block"><i class="fas fa-arrow-left"></i> Back to
            Dashboard</a>
    </div>
@endsection('section_actions')

@section('content')
    @foreach($galleries as $gallery)
        <div class="col-md-3 col-sm-12 mb-5">
            <div class="card">
                <div class="card-header">
                    Photo Gallery
                </div>
                @foreach($gallery->images as $image)
                    @if($image->cover_image)
                        <img class="card-img-top" src="{{$image->image}}" alt="Card image cap">
                        @break
                    @endif
                @endforeach
                <div class="card-body">
                    <div class="card-title">
                        <h4>{{$gallery->name}}</h4>
                    </div>
                    <div class="card-text">
                        {{$gallery->summary}}
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <a href="{{route('galleryadmin.edit', $gallery->id)}}" class="card-link">Edit</a>
                    <a href="{{route('galleryimage.edit', $gallery->id)}}" class="card-link">Images</a>
                    <a href="#" onclick="handleGalleryDelete({{$gallery->id}})" class="card-link">Delete</a>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Modal -->
    <form action="" method="post" id="deleteGalleryForm">
        @csrf
        @method('delete')
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteGalleryLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Delete Gallery</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-bold">
                            Are you sure you want to delete this gallery?
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
@endsection

@section('scripts')
    <script>
        function handleGalleryDelete(id)
        {
            var form = document.getElementById("deleteGalleryForm");
            form.action = '/galleryadmin/' + id;
            $('#deleteModal').modal('show');
        }
    </script>
@endsection

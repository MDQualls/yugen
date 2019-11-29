@extends('layouts.admin')

@include('partials.admin.postheader')

@section('section_actions')
    <div class="col-md-3">
        <a href="{{ route('home') }}" class="btn btn-light btn-block"><i class="fas fa-arrow-left"></i> Back to Dashboard</a>
    </div>
@endsection('section_actions')

@section('content')
    <div class="col">
        <div class="card card-default">
            <div class="card-header">
                <h4>{{ isset($post) ? 'Edit' : 'Create' }} Post</h4>
            </div>

            <div class="card-body">

                @include('partials.errors')

                <form action="{{isset($post) ? route('post.update', $post->id) : route('post.store')}}" method="POST" enctype="multipart/form-data">

                    @csrf

                    @if(isset($post))
                        @method('PUT')
                    @endif

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{isset($post) ? $post->title : ''}}">
                    </div>

                    <div class="form-group">
                        <label for="summary">Summary of Post</label>
                        <textarea class="form-control" name="summary" id="summary" cols="5" rows="2">{{isset($post) ? $post->summary : ''}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="post_content">Post Content</label>
                        <textarea aria-multiline="true" name="post_content" id="post_content">{{isset($post) ? $post->post_content : ''}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="published_at">Published At</label>
                        <input type="text" class="form-control" name="published_at" id="published_at" value="{{isset($post) ? $post->published_at : ''}}">
                    </div>

                    @if(isset($post))
                        <div class="form-group mt-4">
                            @if($post->header_image == null)
                                <h4><i class="fas fa-angle-double-right"></i> No header image for this post</h4>
                            @else
                                <img src="{{asset("storage/$post->header_image")}}" alt="Post Header Image" class="img-fluid img-thumbnail">
                            @endif
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="header_image">Header Image</label>
                        <input type="file" class="form-control" name="header_image" id="header_image">
                    </div>

                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category" id="category" class="form-control">
                            <option value="">Select</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}"
                                        @if(isset($post))
                                        @if($category->id == $post->category_id)
                                        selected
                                    @endif
                                    @endif
                                >{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="tags">Tags</label>
                        <textarea class="form-control" name="tags" id="tags" cols="30" rows="2">{{isset($post) ? $post->getTagsAsString() : ''}}</textarea>
                    </div>


                    <div class="form-group">
                        <button class="btn btn-success" type="submit">
                            {{ isset($post) ? 'Edit' : 'Create' }} Post
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection

@section('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/15.0.0/classic/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="{{ asset('js/ckfinder.js') }}"></script>

    <script>
        flatpickr("#published_at", {});

        ClassicEditor
            .create( document.querySelector( '#post_content' ) , {
                ckfinder: {
                    uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
                },
                toolbar: [ 'ckfinder', 'imageUpload', '|', 'heading', '|', 'bold', 'italic', '|', 'undo', 'redo' ]
            })
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection

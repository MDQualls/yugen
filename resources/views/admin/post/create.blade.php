@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{asset('css/flatpickr.min.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">
@endsection

@include('partials.admin.postheader')

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
                <h4>{{ isset($post) ? 'Edit' : 'Create' }} Post</h4>
            </div>

            <div class="card-body">

                @include('partials.errors')

                <form id="blog_post_form" onsubmit="return validate_blog_post_form()"
                      action="{{isset($post) ? route('post.update', $post->id) : route('post.store')}}" method="POST"
                      enctype="multipart/form-data">

                    @csrf

                    @if(isset($post))
                        @method('PUT')
                    @endif

                    <div class="form-group">
                        <label for="title">Title</label> <span data-for="title" data-role="verification"
                                                               class="ml-2 text-danger"><i
                                class="fas fa-certificate"></i> Required.</span>
                        <input type="text" class="form-control" name="title" id="title"
                               value="{{isset($post) ? $post->title : ''}}">
                    </div>

                    <div class="form-group">
                        <label for="summary">Summary of Post (optional)</label>
                        <textarea class="form-control" name="summary" id="summary" cols="5"
                                  rows="1">{{isset($post) ? $post->summary : ''}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="post_content">Post Content</label> <span data-for="post_content" data-role="verification" class="ml-2 text-danger"><i
                                 class="fas fa-certificate"></i> Required.</span>
                        <textarea aria-multiline="true" name="post_content" id="post_content">{{isset($post) ? $post->post_content : ''}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="published_at">Published At</label> <span data-for="published_at" data-role="verification" class="ml-2 text-danger"><i
                                 class="fas fa-certificate"></i> Required.</span>
                        <input type="text" class="form-control" name="published_at" id="published_at"
                               value="{{isset($post) ? $post->published_at : ''}}">
                    </div>

                    @if(isset($post))
                        <div class="form-group mt-4">
                            @if($post->header_image == null)
                                <h4><i class="fas fa-angle-double-right"></i> No header image for this post</h4>
                            @else
                                <img src="{{asset("storage/$post->header_image")}}" alt="Post Header Image"
                                     class="img-fluid img-thumbnail">
                            @endif
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="header_image">Header Image</label>
                        <input type="file" class="form-control" name="header_image" id="header_image">
                    </div>

                    <div class="form-group">
                        <label for="category">Category</label> <span data-for="category" data-role="verification" class="ml-2 text-danger"><i
                                    class="fas fa-certificate"></i> Required.</span>
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
                        <textarea class="form-control" name="tags" id="tags" cols="30"
                                  rows="2">{{isset($post) ? $post->getTagsAsString() : ''}}</textarea>
                    </div>


                    <div class="form-group">
                        <button class="btn btn-success" type="submit">
                            {{ isset($post) ? 'Edit' : 'Create' }} Post
                        </button>
                        <a href="{{route('post.index')}}" class="btn btn-secondary ml-3"><i
                                class="fas fa-arrow-left"></i> Cancel </a>
                    </div>

                </form>
            </div>

        </div>
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
    <script src="{{asset('js/flatpickr.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script>

    <script>
        flatpickr("#published_at", {});

        $('#post_content').summernote({
            placeholder: 'Enter or paste your post content here.',
            tabsize: 2,
            height: 100
        });

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

        function validate_blog_post_form() {
            invalid = iterateRequiredFields();
            return invalid === 0;
        }

    </script>
@endsection

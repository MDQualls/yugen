@extends('layouts.admin')

@section('section_actions')
    <div class="col-md-3">
        <a href="{{ route('post-comments') }}" class="btn btn-light btn-block"><i class="fas fa-arrow-left"></i> Back to
            Comments</a>
    </div>
    <div class="col-md-3">
        <a href="{{ route('dashboard') }}" class="btn btn-light btn-block"><i class="fas fa-arrow-left"></i> Back to
            Dashboard</a>
    </div>
@endsection('section_actions')

@section('header_section')
    <header id="main-header" class="py-2 bg-wetasphalt text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1><i class="fas fa-comments"></i> Comments</h1>
                </div>
            </div>
        </div>
    </header>
@endsection('section_header')

@section('content')
    <div class="col">
        <div class="card card-default">
            <div class="card-header manage-comment-header">
                <h4>{{$title}} for post "{{$comment->post->title}}</h4>
                <button
                    onclick="handleCommentDelete({{$comment->id}})"
                    class="btn btn-sm btn-danger">Delete
                </button>
            </div>
            <div class="card-body">
                <div class="row" style="margin-top: 20px;">
                    <div class="col-md-8"><p class="lead">{{$comment->comment}}</p></div>
                    <div class="col-md-4">
                        by {{$comment->user->name}} on {{Carbon\Carbon::parse($comment->created_at)->format('m/d/Y')}}
                    </div>
                </div>
                <div class="row" style="margin-top: 20px;">
                    <div class="col">
                        @if($comment->replys->count())
                            <ul class="list-group">
                                <li class="list-group-item active">Replies posted to comment</li>
                                @foreach($comment->replys as $reply)
                                    <li class="list-group-item">
                                        <span
                                            class="manage-reply-span">{{$reply->comment}} <i>by {{$reply->user->name}}</i>
                                        </span>
                                        <span class="reply-delete-span"><button
                                                onclick="handleCommentDelete({{$reply->id}})"
                                                class="btn btn-sm btn-danger">Delete</button>
                                        </span>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <form action="" method="post" id="deleteCommentForm">
        @csrf
        @method('delete')
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deletePostLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Delete Comment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-bold">
                            Are you sure you want to delete this comment? If there are replies to this comment,
                            they will also be deleted. If this is a reply to a comment, only this reply will be deleted.
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
@endsection('content')

@section('scripts')
    <script>
        function handleCommentDelete(id) {
            var form = document.getElementById("deleteCommentForm");
            form.action = '/comments/' + id;
            $('#deleteModal').modal('show');
        }
    </script>
@endsection


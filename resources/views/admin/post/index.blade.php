@extends('layouts.admin')

@include('partials.admin.postheader')

@section('section_actions')
    <div class="col-md-3">
        <a href="{{ route('dashboard') }}" class="btn btn-light btn-block"><i class="fas fa-arrow-left"></i> Back to Dashboard</a>
    </div>
    <div class="col-md-3">
        <a href="{{ route('post.create') }}" class="btn btn-primary btn-block"><i class="fas fa-plus"></i> Add Post</a>
    </div>
@endsection('section_actions')

@section('content')
    <div class="col">
        <div class="card card-default">
            <div class="card-header">
                <h4>{{$title}}</h4>
            </div>
            <div class="card-body">
                @if($posts->count() == 0)
                    <h4>No posts in database</h4>
                @else
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Published at</th>
                                <th>Author</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$post->title}}</td>
                                <td>{{$post->category->name}}</td>
                                <td>{{Carbon\Carbon::parse($post->published_at)->format('m/d/Y')}}</td>
                                <td>{{$post->user->name}}</td>
                                <td>
                                    <a href="{{route('post.edit', $post->id)}}" class="btn btn-secondary btn-sm"><i class="fas fa-angle-double-right"></i> Details</a>
                                    @if($post->archived)
                                        <button onclick="handlePostRestore({{$post->id}})" class="btn btn-info btn-sm"><i class="fas fa-undo"></i> Restore</button>
                                        <button onclick="handlePostDelete({{$post->id}})" class="btn btn-danger btn-sm"><i class="fas fa-minus-circle"></i> Delete</button>
                                    @else
                                        @include('partials.admin.postarchive')
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <!-- Modal -->
                    <form action="" method="post" id="deletePostForm">
                        @csrf
                        @method('delete')
                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deletePostLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">Delete Post</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="text-bold">
                                            Are you sure you want to delete this post?
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


                    <form action="" method="post" id="restorePostForm">
                        @csrf
                        @method('put')
                        <div class="modal fade" id="restoreModal" tabindex="-1" role="dialog" aria-labelledby="restorePostLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">Restore Post</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="text-bold">
                                            Are you sure you want to restore this post?
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, go back</button>
                                        <button type="submit" class="btn btn-success">Yes, restore</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                @endif
            </div>
            <div class="card-footer">
                {{$posts->links() }}
            </div>
        </div>
    </div>
@endsection('content')


@section('scripts')
    <script>
        function handlePostDelete(id)
        {
            var form = document.getElementById("deletePostForm");
            form.action = '/post/' + id;
            $('#deleteModal').modal('show');
        }

        function handlePostRestore(id) {
            var form = document.getElementById("restorePostForm");
            form.action = '/restore/' + id;
            $('#restoreModal').modal('show');
        }
    </script>
@endsection

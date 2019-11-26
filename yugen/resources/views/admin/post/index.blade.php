@extends('layouts.admin')

@include('partials.admin.postheader')

@section('section_actions')
    <div class="col-md-3">
        <a href="{{ route('home') }}" class="btn btn-light btn-block"><i class="fas fa-arrow-left"></i> Back to Dashboard</a>
    </div>
    <div class="col-md-3">
        <a href="{{ route('post.create') }}" class="btn btn-primary btn-block"><i class="fas fa-plus"></i> Add Post</a>
    </div>
@endsection('section_actions')

@section('content')
    <div class="col">
        <div class="card card-default">
            <div class="card-header">
                <h4>Posts</h4>
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
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
            <div class="card-footer">
                {{$posts->links() }}
            </div>
        </div>
    </div>
@endsection('content')

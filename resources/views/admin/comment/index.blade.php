@extends('layouts.admin')

@section('section_actions')
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
            <div class="card-header">
                <h4>{{$title}}</h4>
            </div>
            <div class="card-body">
                @if($comments->count() == 0)
                    <h4>No comments in database</h4>
                @else
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Comment (click to manage)</th>
                            <th>Published</th>
                            <th>Author</th>
                            <th>Replies</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($comments as $comment)
                            <tr>
                                <td><a href="{{route('manage-comment', $comment->id)}}">{{$comment->comment}}</a></td>
                                <td>{{Carbon\Carbon::parse($comment->created_at)->format('m/d/Y')}}</td>
                                <td>{{$comment->user->name}}</td>
                                <td>{{$comment->replys->count()}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
            <div class="card-footer">
                {{$comments->links() }}
            </div>
        </div>
    </div>

@endsection('content')

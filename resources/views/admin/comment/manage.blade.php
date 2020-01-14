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
            <div class="card-header">
                <h4>{{$title}} for post "{{$comment->post->title}}</h4>
            </div>
            <div class="card-body">
                <div class="row" style="margin-top: 20px;">
                    <div class="col-md-8"><p class="lead">{{$comment->comment}}</p></div>
                    <div class="col-md-2">by {{$comment->user->name}}</div>
                    <div class="col-md-2">on {{Carbon\Carbon::parse($comment->created_at)->format('m/d/Y')}}</div>
                </div>
                <div class="row" style="margin-top: 20px;">
                    <div class="col">
                        @if($comment->replys->count())
                            <ul class="list-group">
                                <li class="list-group-item active">Replies posted to comment</li>
                                @foreach($comment->replys as $reply)
                                    <li class="list-group-item">{{$reply->comment}} <i>by {{$reply->user->name}}</i>
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
@endsection('content')

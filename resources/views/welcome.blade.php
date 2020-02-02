@extends('layouts.app')

@section('content')
    <header class="yugen-farm-welcome">

        <div class="welcome-text-box">
            <h1>Welcome to Yugen Farm.</h1>
            <h2>Permaculture and life in New Mexico.</h2>
            <a class="btn btn-outline-light" href="{{route('blog')}}">Blog Posts</a>
            <a class="btn btn-outline-light" href="{{route('about')}}">About</a>
        </div>
    </header>
@endsection

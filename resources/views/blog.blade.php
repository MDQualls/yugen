@extends('layouts.app')


@section('content')
    @include('partials.messages')

    <!-- home page hero unit -->

    <section class="hero-section">
        <div class="row ">
            <div class="hero">
                <div class="hero__content">
                    <h1 class="h1__title">{{$title}}</h1>
                    <p class="p__content--lead">{{$summary}}</p>
                </div>
                <div class="hero__image">
                    <img src="{{url("images/coburnRd5.jpg")}}" alt="any">
                </div>
            </div>
        </div>
    </section>

    <!-- blog post summaries -->
    <section class="blog-section">
        <div class="blog-pagination">
            {{ $posts->links() }}
        </div>
        @foreach($posts as $idx => $post)
            @if($loop->first || $loop->iteration % 3 == 0)
                <div class="row">
            @endif
                <div class="col-1-of-3">
                    @include('partials.summary', ['post' => $post])
                </div>
            @if($loop->iteration % 3 == 0 || $loop->last)
                </div>
            @endif
        @endforeach
        <div class="blog-pagination">
            {{ $posts->links() }}
        </div>
    </section>
@endsection

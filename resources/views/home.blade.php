@extends('layouts.app')


@section('content')
    @include('partials.messages')

    <!-- home page hero unit -->

    <section class="hero-section">
        <div class="row ">
            <div class="col-3-of-4">
                <div class="hero">
                    <div class="hero__image">
                        <img src="{{url("images/coburnRd1.jpg")}}" alt="any">
                    </div>
                    <div class="hero__content">
                        <h1 class="h1__title">Hello from Yugen Farm.</h1>
                        <p class="p__content--lead">We are a sustainable small-scale farm located in Oklahoma City. We hope
                            you enjoy our content.</p>
                        <div class="hero__content--explore">
                            <a href="{{route('blog')}}">Explore <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-1-of-4 home-right-col">
                <div class="home-right-col__ad-box">
                    <h3 class="h3__title">This Content Coming Soon!</h3>
                </div>
                <div class="home-right-col__email-box">
                    <h4 class="h4__title light-font">This Content Coming Soon!</h4>
                </div>
            </div>
        </div>
    </section>

    <!-- blog post summaries -->

    <section class="article-section">

            <div class="article-section__title">
                <i class="fas fa-angle-double-right"></i> Recent news from the farm
            </div>
            @foreach($posts as $idx => $post)
                @if($loop->first || $loop->iteration == 4)
                    <div class="row">
                        @endif
                        <div class="col-1-of-3">
                            @include('partials.summary', ['post' => $post])
                        </div>
                        @if($loop->iteration == 3 || $loop->last)
                    </div>
                @endif
            @endforeach
            <div class="article-section__title--bottom">
                <a href="{{route('blog')}}">Visit all the blog posts <i class="fas fa-angle-double-right"></i></a>
            </div>

    </section>

@endsection

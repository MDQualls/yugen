@extends('layouts.app')


@section('content')
    @include('partials.messages')

    <!-- home page hero unit -->
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous"
            src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v7.0&appId=269779617426299&autoLogAppEvents=1"
            nonce="3dtompgb"></script>
    <section class="hero-section">
        <div class="row ">
            <div class="col-3-of-4">
                <div class="hero">
                    <div class="hero__image">
                        <img src="{{url("images/coburnRd1.jpg")}}" alt="any">
                    </div>
                    <div class="hero__content">
                        <h1 class="h1__title">Hello from Yugen Farm.</h1>
                        <p class="p__content--lead">We are a sustainable small-scale farm located in Oklahoma City. We
                            hope
                            you enjoy our content.</p>
                        <div class="hero__content--explore">
                            <a href="{{route('blog')}}">Explore <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-1-of-4 home-right-col">
                <div class="fb-page"
                     data-href="https://www.facebook.com/Yugen-Farm-107191300998473/"
                     data-small-header="false"
                     data-adapt-container-width="true"
                     data-hide-cover="false"
                     data-show-facepile="false"
                     data-tabs="timeline"
                     data-height="400">
                    <blockquote cite="https://www.facebook.com/Yugen-Farm-107191300998473/"
                                class="fb-xfbml-parse-ignore"><a
                            href="https://www.facebook.com/Yugen-Farm-107191300998473/">Yugen Farm</a></blockquote>
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

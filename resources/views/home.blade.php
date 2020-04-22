@extends('layouts.app')


@section('content')
    @include('partials.messages')

    <!-- home page hero unit -->

    <section class="hero-section">
        <div class="row ">
            <div class="col-3-of-4">
                @include('partials.hero')
            </div>

            <div class="col-1-of-4 home-right-col">
                <div class="home-right-col__ad-box">

                </div>
                <div class="home-right-col__email-box">

                </div>
            </div>
        </div>
    </section>

    <!-- blog post summaries -->
    <section class="article-section">
        <div class="article-section__title">
            /// Recent news from the farm
        </div>
        <div class="row">
            <div class="col-1-of-3">
                @include('partials.summary')
            </div>
            <div class="col-1-of-3">
                @include('partials.summary')
            </div>
            <div class="col-1-of-3">
                @include('partials.summary')
            </div>
        </div>
        <div class="row">
            <div class="col-1-of-3">
                @include('partials.summary')
            </div>
            <div class="col-1-of-3">
                @include('partials.summary')
            </div>
            <div class="col-1-of-3">
                @include('partials.summary')
            </div>
        </div>
    </section>

    {{--            <div class="col-md-9">--}}
    {{--                @foreach($posts as $post)--}}
    {{--                    @include('partials.article', ['post' => $post, 'fullArticle' => $fullArticle])--}}
    {{--                @endforeach--}}
    {{--                {{$posts->links() }}--}}
    {{--            </div>--}}
    {{--            <div class="col-md-3 mb40">--}}
    {{--                @include('partials.categories', ['categories', $categories])--}}
    {{--            </div>--}}
@endsection

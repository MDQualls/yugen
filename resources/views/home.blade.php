@extends('layouts.app')


@section('content')
    <div class="page-titles-img title-space-lg bg-parallax parallax-overlay mb70" data-jarallax='{"speed": 0.2}' style="background-image: url('/images/LavenderBg01.jpg')">
        <div class="container">
            <div class="row">
                <div class=" col-md-8 ml-auto mr-auto">
                    <h1 class='text-uppercase'>Welcome to Yugen Farm</h1>

                </div>
            </div>
        </div>
    </div><!--page title end-->
    <div class="container mb30">
        <div class="row">

            <div class="col-md-9">
                @foreach($posts as $post)
                    @include('partials.article', ['post' => $post])
                @endforeach
            </div>
            <div class="col-md-3 mb40">
                <div class="mb40">
                    <h4 class="sidebar-title">Categories</h4>
                    <ul class="list-unstyled categories">
                        @foreach($categories as $category)
                            <li><a href="#">{{$category->name}} ({{$category->posts->count()}})</a> </li>
                        @endforeach
                    </ul>
                </div><!--/col-->
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')


@section('content')
    <div class="page-titles-img title-space-lg bg-parallax parallax-overlay mb70" data-jarallax='{"speed": 0.2}' style="background-image: url('/images/bg14.jpg')">
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
                    <form>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="search" aria-label="Email Id" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button type="button" class="input-group-text" id="basic-addon2">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div><!--/col-->
                <div class="mb40">
                    <h4 class="sidebar-title">Categories</h4>
                    <ul class="list-unstyled categories">
                        <li><a href="#">Branding</a></li>
                        <li><a href="#">Photography</a></li>
                        <li class="active"><a href="#">Wild</a>
                            <ul class="list-unstyled">
                                <li><a href="#">Nature</a></li>
                                <li><a href="#">Lorem</a></li>
                                <li><a href="#">Ipsum</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Branding</a></li>
                        <li><a href="#">Photography</a></li>
                        <li><a href="#">Wild</a></li>
                    </ul>
                </div><!--/col-->
            </div>
        </div>
    </div>
@endsection

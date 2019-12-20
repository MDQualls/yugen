@extends('layouts.app')


@section('content')
    @include('partials.pagetitle', ['title' => $title, 'tags' => $post->tags])
    <div class="container mb30">
        <div class="row">

            <div class="col-md-9">
                @include('partials.article', ['post' => $post, 'fullArticle' => $fullArticle])
            </div>
            <div class="col-md-3 mb40">
                @include('partials.categories', ['categories', $categories])
            </div>
        </div>
    </div>
@endsection

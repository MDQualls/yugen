@extends('layouts.app')


@section('content')
    @include('partials.pagetitle', ['title' => $title])
    <div class="container mb30">
        <div class="row">

            <div class="col-md-9">
                @foreach($category->posts as $post)
                    @include('partials.article', ['post' => $post, 'fullArticle' => $fullArticle])
                @endforeach
            </div>
            <div class="col-md-3 mb40">
                @include('partials.categories', ['categories', $categories])
            </div>
        </div>
    </div>
@endsection

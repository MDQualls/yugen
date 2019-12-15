@extends('layouts.app')


@section('content')
    @include('partials.pagetitle')
    <div class="container mb30">
        <div class="row">

            <div class="col-md-9">
                @foreach($posts as $post)
                    @include('partials.article', ['post' => $post, 'fullArticle' => $fullArticle])
                @endforeach
                {{$posts->links() }}
            </div>
            <div class="col-md-3 mb40">
                @include('partials.categories', ['categories', $categories])
            </div>
        </div>
    </div>
@endsection

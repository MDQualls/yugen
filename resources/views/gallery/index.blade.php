@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="card">
            <div class="card__header">
                Photo Galleries ~ From around the farm
            </div>

        </div>
    </div>
    <div class="gallery-section">
        @foreach($galleries as $key => $gallery)
            @if ($loop->first || $key % 3 == 0)
                <div class="row">
            @endif

                <div class="col-1-of-3 bottom-margin-rem2">
                    <div class='image-card'>
                        <div class='image-card__header'>
                            {{$gallery->name}} {{$key}}
                        </div>
                        <a href="{{route('gallery.show', $gallery->id)}}">
                            <img src='{{$gallery->cover_image}}' alt='{{$gallery->summary}}' class='img--fluid'>
                            <div class='image-card__overlay'>
                                <div class='image-card__detail'>
                                    <h4 class="h4__title">{{$gallery->name}}</h4>
                                    <span>{{$gallery->summary}}</span>
                                </div>
                            </div>
                        </a>
                        <div class='image-card__footer'>
                            {{Carbon\Carbon::parse($gallery->created_at)->format('m/d/Y')}}
                            <br>
                            {{$gallery->user->name}}
                        </div>
                    </div>
                </div>

            @if ($loop->last || $key % 3 == 0)
                </div>
            @endif
        @endforeach
    </div>
@endsection

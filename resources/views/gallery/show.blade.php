@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="card">
            <div class="card__header">
                {{$gallery->name}} ~ {{$gallery->summary}}
            </div>

        </div>
    </div>
    <div class="gallery-section">

            @foreach($gallery->images as $image)

                    @if($loop->first || $loop->iteration == 5)
                        <div class="row">
                            @endif
                            <div class="col-1-of-4">
                                <div class='image-card bottom-margin-rem2'>
                                    <a href="#">
                                        <img src='{{$image->image}}' alt='{{$image->alt_text}}' class='img--fluid'>
                                        <div class='image-card__overlay'>
                                            <div class='image-card__detail'>
                                                <span>{{$image->alt_text}}</span>
                                            </div>
                                        </div>
                                    </a>
                                    <div class='image-card__footer'>
                                        {{Carbon\Carbon::parse($image->published_at)->format('m/d/Y')}}
                                        <br>
                                        {{$image->gallery->user->name}}
                                    </div>
                                </div>
                            </div>
                            @if($loop->iteration ==4 || $loop->last)
                        </div>
                    @endif

            @endforeach


    </div>
@endsection

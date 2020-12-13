@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="card">
            <div class="card__header">
                TikTok on the Farm
            </div>

        </div>
    </div>
    <div class="gallery-section">
        @foreach($videos as $video)
            @if($loop->first || $loop->iteration % 3 == 0)
                <div class="row">
                    @endif
                    <div class="col-1-of-3 bottom-margin-rem2">
                        <div class='card card--dark'>
                            @if($video->title)
                                <div class='card__header'>
                                    {{$video->title}}
                                </div>
                            @endif
                            <div class="card__body">
                                {!! $video->html !!}
                            </div>
                        </div>
                    </div>
                    @if($loop->iteration % 3 == 0 || $loop->last)
                </div>
            @endif
        @endforeach
    </div>
@endsection

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
        <a id="gallery-section"></a>
        @foreach($gallery->images as $image)
            @if($loop->first || $loop->iteration % 4 == 0)
                <div class="row">
            @endif
                    <div class="col-1-of-4">
                        <div class='image-card bottom-margin-rem2'>
                            @if($agent->isMobile() || $agent->isTablet())
                                <img src='{{$image->image}}' alt='{{$image->alt_text}}' class='img--fluid'>
                                <div class='image-card__footer'>
                                    {{$image->alt_text}}
                                </div>
                            @else
                                <a onclick="setImagePopupSource('{{$image->image}}')" href="#popup">
                                    <img src='{{$image->image}}' alt='{{$image->alt_text}}' class='img--fluid'>
                                    <div class='image-card__overlay'>
                                        <div class='image-card__detail'>
                                            <span>{{$image->alt_text}}</span>
                                        </div>
                                    </div>
                                </a>
                                <div class='image-card__footer'>
                                    {{Carbon\Carbon::parse($image->created_at)->format('m/d/Y')}}
                                </div>
                            @endif
                        </div>
                    </div>
            @if($loop->iteration % 4 == 0 || $loop->last)
                </div>
            @endif
        @endforeach
    </div>

    <div class="popup" id="popup">
        <div class="popup__content">
            <img src="" alt="" class="popup__image" id="popup__image">
            <a href="#gallery-section" id="popup__close" class="popup__close">&times;</a>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function setImagePopupSource(source)  {
            $('#popup__image').attr('src', source);
            $("#popup").show();
        }

        document.getElementById('popup').onclick = function()
        {
            document.getElementById('popup').style.display = 'none';
        }
    </script>
@endsection

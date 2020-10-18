@extends('layouts.app')

@section('content')
    <div class="timeline-container">
        <div class="timeline">
            <div class="row example-centered">

                <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2">
                    <ul class="timeline timeline-centered">
                        @foreach($timeline as $entry)

                            <li class="timeline-item">
                                <div class="timeline-info">
                                    <span>2020</span>
                                </div>
                                <div class="timeline-marker"></div>
                                <div class="timeline-content">
                                    <h3 class="timeline-title">
                                        {{$entry->created_at}}
                                        <div><small>by {{$entry->user->name}}</small></div>
                                    </h3>
                                    <p>{{$entry->timeline_entry}}</p>
                                </div>
                            </li>

                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
@endsection('content')

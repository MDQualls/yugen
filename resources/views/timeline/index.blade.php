@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="card">
            <div class="card__body">
                <h1 class="h1__title">Our Timeline.</h1>
                <p class="p__content--lead">
                    We decided to add this simple timeline so that we can keep track and look back for posterity.
                    It will be interesting and instructional to see what we are spending our time and money on
                    over the years.
                </p>
            </div>
        </div>
    </div>
    <div class="timeline-container">
        <div class="row">

            @foreach($timeline as $yearIndex => $yearData)

                @if ($yearIndex <= $year)
                    @continue
                @endif

                <div class="card bottom-margin-rem2">
                    <div class="card__body text-center margin padding-point4rem">
                        <h3><a class="header-link" href="{{route('timeline', $yearIndex)}}">{{$yearIndex}}</a></h3>
                    </div>
                </div>
            @endforeach
            <ul class="timeline timeline-centered">
            @foreach($timeline as $yearIndex => $yearData)

                @if ($yearIndex != $year)
                    @continue
                @endif

                @foreach($yearData as $entry)

                    @if($entry['userName'] == 'HollyQ')
                        <li class="timeline-item timeline-item-odd">
                    @else
                        <li class="timeline-item timeline-item-even">
                    @endif

                        @if($loop->first)
                            <div class="card" style="padding-top: 1rem;">
                                <div class="timeline-info">
                                    <span>{{Carbon\Carbon::parse($entry['created_at'])->format('Y')}}</span>
                                </div>
                            </div>
                        @endif
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <h3 class="timeline-title">
                                {{Carbon\Carbon::parse($entry['created_at'])->format('m/d/Y g:i a')}}
                                <div><small>by {{$entry['userName']}}</small></div>
                            </h3>
                            <p>
                            {{$entry['timeline_entry']}}

                            @if($entry['timelineData'])
                                <ul class="data-type-list">
                                    @foreach($entry['timelineData'] as $data)
                                        <li>
                                            {{ $data->timelineType->timeline_type }} : {{ $data->data_entry }}
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                            </p>
                        </div>
                    </li>
                @endforeach
            @endforeach
            </ul>
            @foreach($timeline as $yearIndex => $yearData)

                @if ($yearIndex >= $year)
                    @continue
                @endif

                <div class="card bottom-margin-rem2">
                    <div class="card__body text-center margin padding-point4rem">
                        <h3><a class="header-link" href="{{route('timeline', $yearIndex)}}">{{$yearIndex}}</a></h3>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection('content')

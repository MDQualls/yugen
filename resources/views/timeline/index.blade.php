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
            <ul class="timeline timeline-centered">
                @php $year = Carbon\Carbon::parse(now())->format('Y') @endphp
                @foreach($timeline as $entry)

                    @if($entry->user->name == 'HollyQ')
                        <li class="timeline-item timeline-item-odd">
                    @else
                        <li class="timeline-item timeline-item-even">
                    @endif

                        @if($year != Carbon\Carbon::parse($entry->created_at)->format('Y') || $loop->first)
                            <div class="timeline-info">
                                <span>{{Carbon\Carbon::parse($entry->created_at)->format('Y')}}</span>
                            </div>
                        @endif
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <h3 class="timeline-title">
                                {{Carbon\Carbon::parse($entry->created_at)->format('m/d/Y g:i a')}}
                                <div><small>by {{$entry->user->name}}</small></div>
                            </h3>
                            <p>
                                {{$entry->timeline_entry}}

                                @if($entry->timelineData()->count() > 0)
                                    <ul class="data-type-list">
                                        @foreach($entry->timelineData as $data)
                                            <li>
                                                {{ $data->timelineType->timeline_type }} : {{ $data->data_entry }}
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </p>
                        </div>
                    </li>
                    @php $year = Carbon\Carbon::parse($entry->created_at)->format('Y') @endphp
                @endforeach
            </ul>
        </div>
    </div>
@endsection('content')

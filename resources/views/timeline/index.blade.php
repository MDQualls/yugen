@extends('layouts.app')

@section('content')
    <div class="timeline-container">
        <div class="timeline">

            @foreach($timeline as $entry)
                <div class="entry">
                    <div class="title">
                        <h3>{{Carbon\Carbon::parse($entry->created_at)->format('m/d/Y')}}</h3>
                        <p>by {{$entry->user->name }}</p>
                    </div>
                    <div class="body">
                        <p>{{$entry->timeline_entry}}</p>
                        @if($entry->timelineData->count())
                            <ul>
                                @foreach($entry->timelineData as $data)
                                    <li>{{$data->timelineType->timeline_type}} : {{$data->data_entry}}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection('content')

@extends('layouts.admin')

@section('header_section')
    <header id="main-header" class="py-2 bg-lavender">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1><i class="fas fa-stream"></i> Timeline</h1>
                </div>
            </div>
        </div>
    </header>
@endsection('header_section')

@section('section_actions')
    <div class="col-md-3">
        <a href="{{ route('admin-timelines') }}" class="btn btn-light btn-block"><i class="fas fa-arrow-left"></i>
            Back to Diary Timeline
        </a>
    </div>
    <div class="col-md-3">
        <a href="{{ route('dashboard') }}" class="btn btn-light btn-block"><i class="fas fa-arrow-left"></i> Back to
            Dashboard</a>
    </div>
@endsection('section_actions')

@section('content')
    <div class="col">
        <div class="card card-default">
            <div class="card-header">
                <h4>Diary Timeline Entry</h4>
            </div>
            <div class="card-body">
                <div class="list-group">
                    <a href="{{ route('admin-timelines-edit', $timeline->id) }}"
                       data-toggle="tooltip" data-placement="top" title="Click to edit"
                       class="list-group-item list-group-item-action bg-lavender">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Diary Entry <small>on {{ $timeline->updated_at }}</small></h5>
                            <small>by {{ $timeline->user->name }}</small>
                        </div>
                        <p class="mb-1">{{ $timeline->timeline_entry }}</p>


                        <ul class="list-group mt-4">
                            @foreach($timeline->timelineData as $item)
                                <li class="list-group-item">
                                    {{$item->timelineType->timeline_type}} :: {{$item->data_entry}}
                                </li>
                            @endforeach
                        </ul>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection('content')

@section('scripts')
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
        })
    </script>
@endsection

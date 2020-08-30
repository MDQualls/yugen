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
                <h4>Diary Timelines</h4>
            </div>
            <div class="card-body">
                <div class="list-group">
                    <a href="{{ route('admin-timelines-edit', $timeline->id) }}"
                       class="list-group-item list-group-item-action bg-lavender">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Diary Entry</h5>
                            <small>by {{ $timeline->user->name }}</small>
                        </div>
                        <p class="mb-1">{{ $timeline->timeline_entry }}</p>
                        <small>on {{ $timeline->updated_at }}</small>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection('content')

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
        <a href="{{ route('admin-timelines') }}" class="btn btn-light btn-block"><i class="fas fa-arrow-left"></i> Back to
            Diary Timeline</a>
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
                <h4>{{isset($timelineEntry) ? 'Edit' : 'Create'}} Timeline Entry</h4>
            </div>
            <div class="card-body">

                @include('partials.errors')

                <form
                    action="{{isset($timelineEntry) ? route('admin-timelines-update', $timelineEntry->id) : route('admin-timelines-store')}}"
                    method="POST">

                    @csrf
                    @if(isset($timelineEntry))
                        @method('PUT')
                    @endif

                    <div class="form-group">
                        <label for="timeline_entry">Entry for {{Carbon\Carbon::parse(now())->format('m/d/Y')}}</label>
                        <textarea style="font-size: 1.7rem;" required class="form-control" id="timeline_entry" name="timeline_entry">{{ isset($timelineEntry) ? $timelineEntry->timeline_entry : '' }}</textarea>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-success bg-lavender">
                            {{isset($timelineEntry) ? 'Update' : 'Add'}} Timeline Entry
                        </button>
                        &nbsp;<a href="{{route('admin-timelines-show', $timelineEntry->id)}}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection('content')

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
        <a href="{{ route('dashboard') }}" class="btn btn-light btn-block">
            <i class="fas fa-arrow-left"></i> Back to Dashboard
        </a>
    </div>
    <div class="col-md-3">
        <a href="{{ route('admin-timelines-create') }}" class="btn btn-success bg-lavender btn-block">
            <i class="fas fa-plus"></i> Add Timeline Entry
        </a>
    </div>
@endsection('section_actions')

@section('content')
    <div class="col">
        <div class="card card-default">
            <div class="card-header">
                <h4>Diary Timelines</h4>
            </div>
            <div class="card-body">
                @if($timelines->count() == 0)
                    <h4>No timelines in database</h4>
                @else
                    <table class="table">
                        <thead>
                        <th>Name</th>
                        <th>User</th>
                        <th>Date</th>
                        </thead>
                        <tbody>
                        @foreach($timelines as $timeline)
                            <tr>
                                <td>
                                    {{$timeline->timeline_entry}}
                                </td>
                                <td>
                                    {{$timeline->user->name}}
                                </td>
                                <td>
                                    {{Carbon\Carbon::parse($timeline->created_at)->format('F j, Y')}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="card-footer">
                        {{$timelines->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection('content')

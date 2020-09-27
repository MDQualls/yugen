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
        <a href="{{ route('admin-timelines') }}" class="btn btn-light btn-block"><i class="fas fa-arrow-left"></i> Back
            to
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
                <h4>Create Timeline Entry</h4>
            </div>
            <div class="card-body">

                @include('partials.errors')

                <form
                    action="{{route('admin-timelines-store')}}"
                    method="POST"
                >

                    @csrf

                    <div class="form-group">
                        <label for="timeline_entry">Entry for {{Carbon\Carbon::parse(now())->format('m/d/Y')}}</label>
                        <textarea style="font-size: 1.7rem;" required class="form-control" id="timeline_entry"
                                  name="timeline_entry"></textarea>
                    </div>

                    <div class="form-group">
                        <table id="datatype_table" class="table table-striped">
                            <tr>
                                <th>Data Type</th>
                                <th>Data Point</th>
                            </tr>
                            <tr>
                                <td>
                                    <select class="form-control" name="timeline_datatype_0" id="timeline_datatype_0">
                                        <option value="0">Select</option>
                                        @foreach($timelineDataTypes as $datatype)
                                            <option value="{{$datatype->id}}">{{$datatype->timeline_type}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input class="form-control" type="text" name="timeline_datapoint_0"
                                           id="timeline_datapoint_0">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <button id="add_another_data_point" class="btn btn-light btn-block">
                                        <i class="fas fa-share"></i> Add another data point
                                    </button>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="form-group mt-5">
                        <button type="submit" class="btn btn-success bg-lavender">
                            Add Timeline Entry
                        </button>

                        <button type="button" class="btn btn-success bg-lavender"
                                data-toggle="modal"
                                data-target="#dataTypeModal"
                                data-whatever="@mdo"
                        >
                            Add New Data Type
                        </button>

                        &nbsp;<a href="{{route('admin-timelines')}}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('admin.timeline.partials.type')

@endsection('content')

@section('scripts')
    <script src="{{ asset('js/timeline.js') }}"></script>
@endsection

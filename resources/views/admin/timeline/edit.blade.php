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
                <h4>Edit Timeline Entry</h4>
            </div>
            <div class="card-body">

                @include('partials.errors')

                <form
                    action="{{route('admin-timelines-update', $timelineEntry->id)}}"
                    method="POST"
                >
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="datatype_count" id="datatype_count"
                           value="{{$timelineEntry->timelineData->count()}}">

                    <div class="form-group">
                        <label for="timeline_entry">Entry for {{Carbon\Carbon::parse(now())->format('m/d/Y')}}</label>
                        <textarea style="font-size: 1.7rem;" required class="form-control" id="timeline_entry"
                                  name="timeline_entry">{{ $timelineEntry->timeline_entry }}</textarea>
                    </div>

                    <div class="form-group">
                        <table id="datatype_table" class="table table-striped">
                            <tr>
                                <th>Data Type</th>
                                <th>Data Point</th>
                            </tr>
                            @if($timelineEntry->timelineData->count())
                                @foreach($timelineEntry->timelineData as $key => $data)
                                    <tr>
                                        <td>
                                            <select class="form-control" name="timeline_datatype_{{$key}}"
                                                    id="timeline_datatype_{{$key}}">
                                                <option value="0">Select</option>
                                                @foreach($timelineDataTypes as $datatype)
                                                    <option value="{{$datatype->id}}"
                                                            @if($datatype->id == $data->timeline_type_id)
                                                            selected
                                                        @endif
                                                    >
                                                        {{$datatype->timeline_type}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input class="form-control"
                                                   type="text"
                                                   name="timeline_datapoint_{{$key}}"
                                                   id="timeline_datapoint_{{$key}}"
                                                   value="{{$data->data_entry}}"
                                            >
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td>
                                        <select class="form-control" name="timeline_datatype_0"
                                                id="timeline_datatype_0">
                                            <option value="0">Select</option>
                                            @foreach($timelineDataTypes as $datatype)
                                                <option value="{{$datatype->id}}">{{$datatype->timeline_type}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input class="form-control"
                                               type="text"
                                               name="timeline_datapoint_0"
                                               id="timeline_datapoint_0"
                                        >
                                    </td>
                                </tr>

                            @endif
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
                            Update Timeline Entry
                        </button>

                        <button type="button" class="btn btn-success bg-lavender"
                                data-toggle="modal"
                                data-target="#dataTypeModal"
                                data-whatever="@mdo"
                        >
                            Add New Data Type
                        </button>
                        <button id="deleteButton" name="deleteButton" class="btn btn-danger">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                        <a href="{{route('admin-timelines')}}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <form action="" method="post" id="deleteTimelineForm">
        @csrf
        @method('delete')
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
             aria-hidden="true">
            <input type="hidden" id="timelineId" name="timelineId" value="{{$timelineEntry->id}}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Delete Timeline Entry</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-bold">
                            Are you sure you want to delete this timeline entry?
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, go back</button>
                        <button type="submit" class="btn btn-danger">Yes, delete</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @include('admin.timeline.partials.type')
@endsection('content')

@section('scripts')
    <script src="{{ asset('js/timeline.js') }}"></script>

    <script>
        function handleDelete() {
            let form = document.getElementById("deleteTimelineForm");
            let id = document.getElementById("timelineId").value;
            form.action = '/admin/timelines/' + id + '/destroy';
            $('#deleteModal').modal('show');
        }

        $(document).on('click', '#deleteButton', function (e) {
            e.preventDefault();
            handleDelete();
        });
    </script>
@endsection

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
                <h4>{{isset($timelineEntry) ? 'Edit' : 'Create'}} Timeline Entry</h4>
            </div>
            <div class="card-body">

                @include('partials.errors')

                <form
                    action="{{isset($timelineEntry) ? route('admin-timelines-update', $timelineEntry->id) : route('admin-timelines-store')}}"
                    method="POST"
                >

                    @csrf
                    @if(isset($timelineEntry))
                        @method('PUT')
                    @endif

                    <div class="form-group">
                        <label for="timeline_entry">Entry for {{Carbon\Carbon::parse(now())->format('m/d/Y')}}</label>
                        <textarea style="font-size: 1.7rem;" required class="form-control" id="timeline_entry"
                                  name="timeline_entry">{{ isset($timelineEntry) ? $timelineEntry->timeline_entry : '' }}</textarea>
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
                            {{isset($timelineEntry) ? 'Update' : 'Add'}} Timeline Entry
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

    <!-- MODAL TO ADD NEW DATA TYPES -->
    <div class="modal fade" id="dataTypeModal" tabindex="-1" aria-labelledby="dataTypModalLabel" aria-hidden="true">
        <form id="timeline_type_form" name="timeline_type_form" method="POST"
              action="{{ route('timeline-type-store') }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="dataTypModalLabel">Add New Data Type</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="new_data_type" class="col-form-label">Data type:</label>
                            <input type="text" class="form-control" name="timeline_type" id="timeline_type" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Add data type</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection('content')

@section('scripts')
    <script>
        var i = 0;

        function increment() {
            i += 1;
        }

        function addElement() {
            var tr = document.createElement('tr');
            var td1 = document.createElement('td');
            var td2 = document.createElement('td');

            var selectElement = document.getElementById("timeline_datatype_0").cloneNode(true);

            var inputElement = document.createElement("input");
            inputElement.setAttribute("type", "text");
            inputElement.setAttribute("class", "form-control")

            increment();
            inputElement.setAttribute("Name", "timeline_datapoint_" + i);
            inputElement.setAttribute("id", "timeline_datapoint_" + i);
            selectElement.setAttribute("Name", "timeline_datatype_" + i);
            selectElement.setAttribute("id", "timeline_datatype_" + i);

            td1.appendChild(selectElement);
            td2.appendChild(inputElement);

            tr.appendChild(td1);
            tr.appendChild(td2);
            $("#datatype_table tr:last").prev().after(tr);
        }

        $(function () {
            $('#add_another_data_point').on('click', (e) => {
                e.preventDefault();
                addElement();
            });
        })
    </script>
@endsection

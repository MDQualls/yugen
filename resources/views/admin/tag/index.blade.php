@extends('layouts.admin')

@section('header_section')
    <header id="main-header" class="py-2 bg-purple text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1><i class="fas fa-tags"></i> Tags</h1>
                </div>
            </div>
        </div>
    </header>
@endsection('header_section')

@section('section_actions')
    <div class="col-md-3">
        <a href="{{ route('home') }}" class="btn btn-light btn-block"><i class="fas fa-arrow-left"></i> Back to
            Dashboard</a>
    </div>
@endsection('section_actions')

@section('content')
    <div class="col">
        <div class="card card-default">
            <div class="card-header">
                <h4>Tags</h4>
            </div>
            <div class="card-body">
                @if($tags->count() == 0)
                    <h4>No tags in database</h4>
                @else
                    <table class="table">
                        <thead>
                        <th>Name</th>
                        <th>Post Count</th>
                        {{--                        <th></th>--}}
                        </thead>
                        <tbody>
                        @foreach($tags as $tag)
                            <tr>
                                <td>
                                    {{$tag->name}}
                                </td>
                                <td>
                                    {{$tag->posts->count()}}
                                </td>
                                {{--                                <td>--}}
                                {{--                                    <a href="#" class="btn btn-secondary btn-sm"><i class="fas fa-angle-double-right"></i> Details</a>--}}
                                {{--                                </td>--}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="card-footer">
                        {{$tags->links() }}
                    </div>
                @endif


            <!-- Modal -->
                {{--                <form action="" method="post" id="deleteTagForm">--}}
                {{--                    @csrf--}}
                {{--                    @method('delete')--}}
                {{--                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">--}}
                {{--                        <div class="modal-dialog" role="document">--}}
                {{--                            <div class="modal-content">--}}
                {{--                                <div class="modal-header">--}}
                {{--                                    <h5 class="modal-title" id="deleteModalLabel">Delete Tag</h5>--}}
                {{--                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                {{--                                        <span aria-hidden="true">&times;</span>--}}
                {{--                                    </button>--}}
                {{--                                </div>--}}
                {{--                                <div class="modal-body">--}}
                {{--                                    <p class="text-bold">--}}
                {{--                                        Are you sure you want to delete this tag?--}}
                {{--                                    </p>--}}
                {{--                                </div>--}}
                {{--                                <div class="modal-footer">--}}
                {{--                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No, go back</button>--}}
                {{--                                    <button type="submit" class="btn btn-danger">Yes, delete</button>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </form>--}}

            </div>
        </div>
    </div>
@endsection('content')

{{--@section('scripts')--}}
{{--    <script>--}}
{{--        function handleDelete(id)--}}
{{--        {--}}
{{--            var form = document.getElementById("deleteTagForm");--}}
{{--            form.action = '/tag/' + id;--}}
{{--            $('#deleteModal').modal('show');--}}
{{--        }--}}
{{--    </script>--}}
{{--@endsection--}}

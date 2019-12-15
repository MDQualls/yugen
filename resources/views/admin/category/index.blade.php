@extends('layouts.admin')

@include('partials.admin.categoryheader')

@section('section_actions')
    <div class="col-md-3">
        <a href="{{ route('dashboard') }}" class="btn btn-light btn-block"><i class="fas fa-arrow-left"></i> Back to Dashboard</a>
    </div>
    <div class="col-md-3">
        <a href="{{ route('category.create') }}" class="btn btn-success btn-block"><i class="fas fa-plus"></i> Add Category</a>
    </div>
@endsection('section_actions')

@section('content')
    <div class="col">
        <div class="card card-default">
            <div class="card-header">
                <h4>Categories</h4>
            </div>
            <div class="card-body">
                @if($categories->count() == 0)
                    <h4>No categories in database</h4>
                @else
                    <table class="table">
                        <thead>
                        <th>Name</th>
                        <th>Post Count</th>
                        <th></th>
                        </thead>
                        <tbody>
                        @foreach($categories as $cat)
                            <tr>
                                <td>
                                    {{$cat->name}}
                                </td>
                                <td>
                                    {{$cat->posts->count()}}
                                </td>
                                <td>
                                    <a href="{{route('category.edit', $cat->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</a>
                                    <button onclick="handleDelete({{$cat->id}})" class="btn btn-warning"><i class="fas fa-trash"></i> Delete</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif

                <!-- Modal -->
                <form action="" method="post" id="deleteCategoryForm">
                    @csrf
                    @method('delete')
                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">Delete Category</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p class="text-bold">
                                        Are you sure you want to delete this category?
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

            </div>
        </div>
    </div>
@endsection('content')

@section('scripts')
    <script>
        function handleDelete(id)
        {
            var form = document.getElementById("deleteCategoryForm");
            form.action = '/category/' + id;
            $('#deleteModal').modal('show');
        }
    </script>
@endsection

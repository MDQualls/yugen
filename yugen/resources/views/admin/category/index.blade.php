@extends('layouts.admin')

@section('section_title')
    Categories
@endsection('section_title')

@section('content')
    <div class="col">
        <div class="card card-default">
            <div class="card-header">Categories</div>
            <div class="card-body">
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
                                <a href="{{route('categories.edit', $cat->id)}}" class="btn btn-info btn-sm">Edit</a>
                                <button onclick="handleDelete({{$cat->id}})" class="btn btn-warning btn-sm">delete</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

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

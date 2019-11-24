@extends('layouts.admin')

@section('header_section')
    <header id="main-header" class="py-2 bg-primary text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1><i class="fas fa-cog"></i> Dashboard</h1>
                </div>
            </div>
        </div>
    </header>
@endsection('section_header')

@section('section_actions')
    <div class="col-md-3">
        <a href="{{ route('post.create') }}" class="btn btn-primary btn-block"><i class="fas fa-plus"></i> Add Post</a>
    </div>
    <div class="col-md-3">
        <a href="{{ route('category.create') }}" class="btn btn-success btn-block"><i class="fas fa-plus"></i> Add Category</a>
    </div>
    <div class="col-md-3">
        <a href="{{ route('user.create') }}" class="btn btn-secondary btn-block"><i class="fas fa-plus"></i> Add User</a>
    </div>
@endsection('section_actions')

@section('content')
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                <h4>Latest Posts</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Date</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>Post One</td>
                        <td>Web Development</td>
                        <td>07/10/2018</td>
                        <td>
                            <a href="details.html" class="btn btn-secondary btn-sm"><i class="fas fa-angle-double-right"></i> Details</a>
                        </td>
                    </tr>

                    <tr>
                        <td>2</td>
                        <td>Post Two</td>
                        <td>Web Development</td>
                        <td>08/10/2018</td>
                        <td>
                            <a href="details.html" class="btn btn-secondary btn-sm"><i class="fas fa-angle-double-right"></i> Details</a>
                        </td>
                    </tr>

                    <tr>
                        <td>3</td>
                        <td>Post Three</td>
                        <td>Tech Gadgets</td>
                        <td>09/10/2018</td>
                        <td>
                            <a href="details.html" class="btn btn-secondary btn-sm"><i class="fas fa-angle-double-right"></i> Details</a>
                        </td>
                    </tr>

                    <tr>
                        <td>4</td>
                        <td>Post Four</td>
                        <td>Business</td>
                        <td>01/10/2019</td>
                        <td>
                            <a href="details.html" class="btn btn-secondary btn-sm"><i class="fas fa-angle-double-right"></i> Details</a>
                        </td>
                    </tr>

                    <tr>
                        <td>5</td>
                        <td>Post Five</td>
                        <td>Business</td>
                        <td>02/10/2019</td>
                        <td>
                            <a href="details.html" class="btn btn-secondary btn-sm"><i class="fas fa-angle-double-right"></i> Details</a>
                        </td>
                    </tr>

                    <tr>
                        <td>6</td>
                        <td>Post Six</td>
                        <td>Health & Wellness</td>
                        <td>03/10/2019</td>
                        <td>
                            <a href="details.html" class="btn btn-secondary btn-sm"><i class="fas fa-angle-double-right"></i> Details</a>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-3">

        <div class="card text-center bg-primary text-white mb-3">
            <div class="card-body">
                <h3>Posts</h3>
                <h4 class="display-4"><i class="fas fa-pencil-alt"></i> 10</h4>
                <a href="{{ route('post.index') }}" class="btn btn-outline-light btn-sm">View</a>
            </div>
        </div>

        <div class="card text-center bg-success text-white mb-3">
            <div class="card-body">
                <h3>Categories</h3>
                <h4 class="display-4"><i class="fas fa-folder"></i> 4</h4>
                <a href="{{ route('category.index') }}" class="btn btn-outline-light btn-sm">View</a>
            </div>
        </div>

        <div class="card text-center bg-secondary text-white mb-3">
            <div class="card-body">
                <h3>Users</h3>
                <h4 class="display-4"><i class="fas fa-users"></i> 6</h4>
                <a href="{{ route('user.index') }}" class="btn btn-outline-light btn-sm">View</a>
            </div>
        </div>

    </div>
@endsection

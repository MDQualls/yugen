@extends('layouts.admin')

@include('partials.admin.userheader')

@section('section_actions')
    <div class="col-md-3">
        <a href="{{ route('home') }}" class="btn btn-light btn-block"><i class="fas fa-arrow-left"></i> Back to Dashboard</a>
    </div>
@endsection('section_actions')

@section('content')
    <div class="col">
        <div class="card card-default">
            <div class="card-header">
                <h4>Add User</h4>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('user.store')}}">
                <div class="form-group">
                    <label for="name"></label>
                </div>
            </form>
        </div>
    </div>
@endsection('content')

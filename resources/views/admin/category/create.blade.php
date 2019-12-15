@extends('layouts.admin')

@include('partials.admin.categoryheader')


@section('section_actions')
    <div class="col-md-3">
        <a href="{{ route('dashboard') }}" class="btn btn-light btn-block"><i class="fas fa-arrow-left"></i> Back to Dashboard</a>
    </div>
@endsection('section_actions')

@section('content')
    <div class="col">
        <div class="card card-default">
            <div class="card-header">
                <h4>{{isset($category) ? 'Edit' : 'Create'}} Category</h4>
            </div>
            <div class="card-body">

                @include('partials.errors')

                <form action="{{isset($category) ? route('category.update', $category->id) : route('category.store')}}" method="POST">

                    @csrf
                    @if(isset($category))
                        @method('PUT')
                    @endif

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ isset($category) ? $category->name : '' }}">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success">
                            {{isset($category) ? 'Update' : 'Add'}} Category
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection('content')

@extends('layouts.admin')

@include('partials.admin.galleryheader')


@section('section_actions')
    <div class="col-md-3">
        <a href="{{ route('dashboard') }}" class="btn btn-light btn-block"><i class="fas fa-arrow-left"></i> Back to
            Dashboard</a>
    </div>
@endsection('section_actions')

@section('content')
    <div class="col">
        <div class="card card-default">
            <div class="card-header">
                <h4>{{isset($post) ? 'Edit' : 'Create'}} Gallery</h4>
            </div>
            <div class="card-body">

                @include('partials.errors')

                <form
                    action="{{isset($post) ? route('galleryadmin.update', $category->id) : route('galleryadmin.store')}}"
                    method="POST">

                    @csrf
                    @if(isset($post))
                        @method('PUT')
                    @endif

                    <div class="form-group">
                        <label for="name">Name</label><span data-for="title" data-role="verification"
                                                            class="ml-2 text-danger"><i
                                class="fas fa-certificate"></i> Required.</span>
                        <input type="text" class="form-control" name="name"
                               value="{{ isset($post) ? $post->name : '' }}">
                    </div>

                    <div class="form-group">
                        <label for="name">Summary</label>
                        <input type="text" class="form-control" name="summary"
                               value="{{ isset($post) ? $post->summary : '' }}">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success bg-brown">
                            {{isset($post) ? 'Update' : 'Add'}} Gallery
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

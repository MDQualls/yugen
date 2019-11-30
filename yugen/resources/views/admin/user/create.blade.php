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
                <h4>Update User Account</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('user.member-update', $user->id)}}">

                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label class="d-block" for="">{{$user->name}}'s User Gravatar</label>
                        <img class="img-thumbnail" src="{{ Gravatar::src($user->email) }}" alt="Gravatar">
                    </div>
                    @if(auth()->user()->id != $user->id)
                        <div class="form-group">
                            <div class="alert alert-info mt-5">
                                Users cannot edit other user's name and email
                            </div>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}"
                        @if(auth()->user()->id != $user->id)
                            readonly
                        @endif
                        >
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}"
                        @if(auth()->user()->id != $user->id)
                            readonly
                        @endif
                        >
                    </div>
                    @if(auth()->user()->id == $user->id)
                        <div class="form-group">
                            <div class="alert alert-info mt-5">
                                Users cannot edit their own role and status
                            </div>
                        </div>
                    @endif
                    <div class="form-group">
                        @if(auth()->user()->id == $user->id)
                            <div class="my-4 ml-1">User Role: <i>{{$user->role->role_name}}</i></div>
                        @else
                            <label for="role">Role</label>
                            <select name="role" id="role" class="form-control">
                                <option value="">Select</option>
                                @foreach($roles as $role)
                                    <option value="{{$role->id}}"
                                            @if($role->id == $user->role->id)
                                            selected
                                        @endif
                                    >{{$role->role_name}}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                    <div class="form-group">
                        @if(auth()->user()->id == $user->id)
                            <div class="my-4 ml-1">User Status: <i>{{$user->status->status}}</i></div>
                        @else
                            <label for="status">User Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="">Select</option>
                                @foreach($statuses as $status)
                                    <option value="{{$status->id}}"
                                            @if($status->id == $user->status->id)
                                            selected
                                        @endif
                                    >{{$status->status}}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>

                    <div class="form-group">
                        <button class="btn btn-success" type="submit">
                            Edit User
                        </button>
                        <a href="{{route('user.index')}}" class="btn btn-secondary ml-3"><i class="fas fa-arrow-left"></i> Cancel </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection('content')

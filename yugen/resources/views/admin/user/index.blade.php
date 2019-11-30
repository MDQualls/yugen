@extends('layouts.admin')

@include('partials.admin.userheader')

@section('section_actions')
    <div class="col-md-3">
        <a href="{{ route('home') }}" class="btn btn-light btn-block"><i class="fas fa-arrow-left"></i> Back to Dashboard</a>
    </div>
    <div class="col-md-3">
        <a href="{{ route('user.create') }}" class="btn btn-secondary btn-block"><i class="fas fa-plus"></i> Add User</a>
    </div>
@endsection('section_actions')

@section('content')
    <div class="col">
        <div class="card card-default">
            <div class="card-header">Users</div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th colspan="2">Actions</th>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>
                                <img class="img-thumbnail" src="{{ Gravatar::src($user->email) }}" alt="Gravatar">
                            </td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role->role_name}}</td>
                            <td>
{{--                                @if(auth()->user()->id != $user->id)--}}
{{--                                    @if(!$user->isAdmin())--}}
{{--                                        <form action="{{route('users.make-admin', $user->id)}}" method="POST">--}}
{{--                                            @csrf--}}
{{--                                            <button type="submit" class="btn btn-success btn-sm">Make Admin</button>--}}
{{--                                        </form>--}}
{{--                                    @else--}}
{{--                                        <form action="{{route('users.remove-admin', $user->id)}}" method="POST">--}}
{{--                                            @csrf--}}
{{--                                            <button type="submit" class="btn btn-danger btn-sm">Remove Admin</button>--}}
{{--                                        </form>--}}
{{--                                    @endif--}}
{{--                                @endif--}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection('content')

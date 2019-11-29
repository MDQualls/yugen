@extends('layouts.admin')

@section('header_section')
    <header id="main-header" class="py-2 bg-orange text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1><i class="fas fa-users"></i> Users</h1>
                </div>
            </div>
        </div>
    </header>
@endsection('header_section')

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

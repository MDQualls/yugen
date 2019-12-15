@extends('layouts.admin')

@include('partials.admin.userheader')

@section('section_actions')
    <div class="col-md-3">
        <a href="{{ route('dashboard') }}" class="btn btn-light btn-block"><i class="fas fa-arrow-left"></i> Back to Dashboard</a>
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
                    <th>Status</th>
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
                                @if($user->status->status == 'active')
                                    <div class="text-success">{{$user->status->status}}</div>
                                @else
                                    <div class="text-danger">{{$user->status->status}}</div>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('user.edit', $user->id)}}" class="btn btn-secondary btn-sm"><i class="fas fa-angle-double-right"></i> Details</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection('content')

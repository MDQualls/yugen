@extends('layouts.app')

@section('content')
    @include('partials.pagetitle')

    <div class='container mb40'>
        <div class='row'>
            <div class="col-md-12">

                @include('partials.messages')
                @include('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <h4>Update User Password</h4>
                    </div>
                    <div class="card-body">

                        <form method="POST" action="{{route('update-password', $user->id)}}">

                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <img class="img-thumbnail" src="{{ Gravatar::src($user->email) }}" alt="Gravatar">
                            </div>

                            <div class="form-group">
                                <label for="currentPassword">Current Password</label>
                                <input type="password" class="form-control" id="currentPassword" name="currentPassword"
                                       required value="">
                            </div>

                            <div class="form-group">
                                <label for="newPassword">New Password</label>
                                <input type="password" class="form-control" id="newPassword" name="newPassword"
                                       required value="">
                            </div>

                            <div class="form-group">
                                <label for="newPassword_confirmation">Confirm New Password</label>
                                <input type="password" class="form-control" id="newPassword_confirmation"
                                       name="newPassword_confirmation"
                                       required value="">
                            </div>

                            <div class="form-group">
                                <button class="btn btn-success" type="submit">
                                    Update Password
                                </button>
                                <a href="{{route('home')}}" class="btn btn-secondary ml-3"><i
                                        class="fas fa-arrow-left"></i> Cancel </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection('content')

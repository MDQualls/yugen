@extends('layouts.app')

@section('content')


        <div class='row'>


            @include('partials.messages')
            @include('partials.errors')

            <div class="card card--light">
                <div class="card__header">
                    <h4>Update User Password</h4>
                </div>
                <div class="card__body">

                    <form method="POST" action="{{route('update-password', $user->id)}}">

                        @csrf
                        @method('PUT')

                        <div class="form__group">
                            <label class="form__label" for="currentPassword">Current Password</label>
                            <input type="password" class="form__control" id="currentPassword" name="currentPassword"
                                   required value="">
                        </div>

                        <div class="form__group">
                            <label class="form__label" for="newPassword">New Password</label>
                            <input type="password" class="form__control" id="newPassword" name="newPassword"
                                   required value="">
                        </div>

                        <div class="form__group">
                            <label class="form__label" for="newPassword_confirmation">Confirm New Password</label>
                            <input type="password" class="form__control" id="newPassword_confirmation"
                                   name="newPassword_confirmation"
                                   required value="">
                        </div>

                        <div class="form-group">
                            <button class="btn btn--primary" type="submit">
                                Update Password
                            </button>
                            <a href="{{route('blog')}}" class="btn btn--grey"><i
                                    class="fas fa-arrow-left"></i> Cancel </a>
                        </div>
                    </form>
                </div>

            </div>
    </div>

@endsection('content')

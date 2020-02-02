@extends('layouts.app')

@section('content')
    @include('partials.pagetitle')

    <div class='container mb40'>
        <div class='row'>

            <div class="col-md-12">
                @if($user->status->status == 'active')
                    <div class="alert alert-success rounded">Your account is active</div>
                @else
                    <div class="alert alert-danger rounded">Your account is suspended</div>
                @endif
            </div>

            @include('partials.errors')

            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <h4>Update User Settings</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('update-user', $user->id)}}#">

                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="d-block">{{$user->name}}'s User Gravatar</label>
                                <div class="row">
                                    <div class="col-md-2 col-12">
                                        <img class="img-thumbnail" src="{{ Gravatar::src($user->email) }}" alt="Gravatar">
                                    </div>
                                    <div class="col-md-10 col-12 pt-2">
                                        We use Gravatar for our user images. If you do not have an
                                        image registered with Gravatar, you will get a default gravatar image based on your
                                        email address. If you would like to update your Gravatar image,
                                        <a target="_blank" href="https://en.gravatar.com/">Visit the Gravatar Service
                                            here</a>.
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input required type="text" class="form-control" id="name" name="name"
                                       value="{{$user->name}}">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input required type="text" class="form-control" id="email" name="email"
                                       value="{{$user->email}}">
                            </div>

                            <div class="form-group">
                                <label for="about">About</label>
                                <textarea name="about" id="about"
                                          placeholder="Is there anything you would like us to know about you and your interest in our site?"
                                          rows="3" class="form-control">{{$user->about}}</textarea>
                            </div>

                            <fieldset class="border p-3 mt-5 mb-5">
                                <legend class="w-auto m-1">User Alerts</legend>
                                <div class="form-check my-2">
                                    <input class="form-check-input" type="checkbox" value="1" id="content_alert"
                                           @if($user->content_alert) checked @endif name="content_alert">
                                    <label class="form-check-label" for="defaultCheck1">
                                        Email me when new content is posted.
                                    </label>
                                </div>
                                <div class="form-check my-2">
                                    <input class="form-check-input" type="checkbox" value="1" id="response_alert"
                                           @if($user->response_alert) checked @endif name="response_alert">
                                    <label class="form-check-label" for="defaultCheck1">
                                        Email me when someone responds to my comment.
                                    </label>
                                </div>
                                <div class="form-check my-2">
                                    <input class="form-check-input" type="checkbox" value="1" id="offering_alert"
                                           @if($user->offering_alert) checked @endif name="offering_alert">
                                    <label class="form-check-label" for="defaultCheck1">
                                        Email me when there are new features or offerings from Yugen Farm.
                                    </label>
                                </div>
                            </fieldset>

                            <div class="form-group">


                                <button class="btn btn-success" type="submit"><i class="fas fa-user-circle"></i>
                                    Update
                                    Settings
                                </button>

                                <a href="{{route('user-password', $user->id)}}" class="btn btn-primary ml-3"><i
                                        class="fas fa-lock"></i> Update Password </a>


                                <a href="{{route('blog')}}" class="btn btn-secondary ml-3"><i
                                        class="fas fa-arrow-left"></i> Cancel </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection('content')

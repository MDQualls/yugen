@extends('layouts.app')

@section('content')

        <div class="row">
            @if($user->status->status == 'active')
                <div class="alert alert--success">Your account is active</div>
            @else
                <div class="alert alert--danger">Your account is suspended</div>
            @endif
        </div>
        <div class='row'>
            @include('partials.errors')


                <div class="card card--light">
                    <div class="card__header">
                        <h4 class="h4__title">Update User Settings</h4>
                    </div>
                    <div class="card__body">
                        <form method="POST" action="{{route('update-user', $user->id)}}#">

                            @csrf
                            @method('PUT')

                            <div class="form__group">
                                <h4 class="h4__title">{{$user->name}}'s User Gravatar</h4>
                                <div class="img__row row">
                                    <div class="img__row__thumbnail right-margin-rem2">
                                        <img class="img-thumbnail" src="{{ Gravatar::src($user->email) }}" alt="Gravatar">
                                    </div>
                                    <div class="p__content--lead img__row__desc">
                                        We use Gravatar for our user images. If you do not have an
                                        image registered with Gravatar, you will get a default gravatar image based on your
                                        email address. If you would like to update your Gravatar image,
                                        <a class="lead-link" target="_blank" href="https://en.gravatar.com/">Visit the Gravatar Service
                                            here</a>.
                                    </div>
                                </div>
                            </div>

                            <div class="form__group">
                                <label class="form__label" for="name">Name</label>
                                <input required type="text" class="form__control" id="name" name="name"
                                       value="{{$user->name}}">
                            </div>

                            <div class="form__group">
                                <label class="form__label" for="email">Email</label>
                                <input required type="text" class="form__control" id="email" name="email"
                                       value="{{$user->email}}">
                            </div>

                            <div class="form__group">
                                <label class="form__label" for="about">About</label>
                                <textarea name="about" id="about"
                                          placeholder="Is there anything you would like us to know about you and your interest in our site?"
                                          rows="3" class="form__control">{{$user->about}}</textarea>
                            </div>

                            <div class="form__group">
                                <div class="form__check">
                                    <input class="form__check-input" type="checkbox" value="1" id="content_alert"
                                           @if($user->content_alert) checked @endif name="content_alert">
                                    <label class="form__check-label" for="content_alert">
                                        <span class="form__check-button"></span>
                                        Email me when new content is posted.
                                    </label>
                                </div>
                            </div>

                            <div class="form__group">
                                <div class="form__check">
                                    <input class="form__check-input" type="checkbox" value="1" id="response_alert"
                                           @if($user->response_alert) checked @endif name="response_alert">
                                    <label class="form__check-label" for="response_alert">
                                        <span class="form__check-button"></span>
                                        Email me when someone responds to my comment.
                                    </label>
                                </div>
                            </div>

                            <div class="form__group bottom-margin-rem4">
                                <div class="form__check">
                                    <input class="form__check-input" type="checkbox" value="1" id="offering_alert"
                                           @if($user->offering_alert) checked @endif name="offering_alert">
                                    <label class="form__check-label" for="offering_alert">
                                        <span class="form__check-button"></span>
                                        Email me when there are new features or offerings from Yugen Farm.
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">


                                <button class="btn btn--primary" type="submit"><i class="fas fa-user-circle"></i>
                                    Update
                                    Settings
                                </button>

                                <a href="{{route('user-password', $user->id)}}" class="lead-link left-margin-rem4"><i
                                        class="fas fa-lock"></i> Update Password</a>


                                <a href="{{route('blog')}}" class="lead-link left-margin-rem4"><i
                                        class="fas fa-arrow-left"></i> Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

@endsection('content')

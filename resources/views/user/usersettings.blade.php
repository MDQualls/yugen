@extends('layouts.app')

@section('content')
    @include('partials.pagetitle')

    <div class='container mb40'>
        <div class='row'>

            <div class="col-md-12">
                @if($user->status->status == 'active')
                    <div class="alert alert-success">Your account is active</div>
                @else
                    <div class="alert alert-danger">Your account is suspended</div>
                @endif
            </div>

            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <h4>Update User Settings</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="#">

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

                            <fieldset class="border p-3 mt-5 mb-5">
                                <legend class="w-auto m-1">User Alerts</legend>
                                <div class="form-check my-2">
                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1">
                                        Email me when new content is posted.
                                    </label>
                                </div>
                                <div class="form-check my-2">
                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1">
                                        Email me when someone responds to my comment.
                                    </label>
                                </div>
                                <div class="form-check my-2">
                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1">
                                        Email me when there are new features or offerings from Yugen Farm.
                                    </label>
                                </div>
                            </fieldset>

                            <div class="form-group">
                                <button class="btn btn-success" type="submit">
                                    Edit User
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

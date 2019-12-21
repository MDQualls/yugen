@extends('layouts.app')

@section('content')
    @include('partials.pagetitle')

    <div class="container mb70">
        <div class="row">
            <div class="col">
                <h2 class="mb30">Cookies Notice</h2>
                <p class="lead">
                    We use "cookies" on this site. A cookie is a piece of data stored on a site visitor's hard drive
                    to help us improve your access to our site and identify repeat visitors to our site.
                    For instance, when we use a cookie to identify you, you would not have to log in a password more
                    than once, thereby saving time while on our site.
                </p>
                <p>
                    Cookies can also enable us to track and target the interests of our users to enhance the experience
                    on our site.  Usage of a cookie is in no way linked to any personally identifiable information on our site.
                    No data about users or about user browsing preferences is collected by our site other than
                    for the express purpose of improving the user experience on our site.
                </p>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <h4>Privacy Policy</h4>
                <p>
                    Please see our <a href="{{route('privacy')}}">Privacy Policy</a> for further information about
                    how we collect and use data on our site.
                </p>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                <p>
                    <strong>If you feel that we are not abiding by this cookies policy, you should contact us immediately via email.</strong>
                </p>
            </div>
        </div>

    </div>

@endsection('content')

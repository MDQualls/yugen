@extends('layouts.app')

@section('content')

    <section class="cookie-section">
        <div class="row dark-bottom-border">

            <h1 class="h1__title">Cookies Notice</h1>
            <p class="p__content--lead">
                We use "cookies" on this site. A cookie is a piece of data stored on a site visitor's hard drive
                to help us improve your access to our site and identify repeat visitors to our site.
                For instance, when we use a cookie to identify you, you would not have to log in a password more
                than once, thereby saving time while on our site.
            </p>
            <p class="p__content--lead">
                Cookies can also enable us to track and target the interests of our users to enhance the experience
                on our site. Usage of a cookie is in no way linked to any personally identifiable information on our
                site.
                No data about users or about user browsing preferences is collected by our site other than
                for the express purpose of improving the user experience on our site.
            </p>

        </div>
        <div class="row">

            <h4 class="h4__title">Privacy Policy</h4>
            <p class="p__content--body">
                Please see our <a class="body-link" href="{{route('privacy')}}">Privacy Policy</a> for further
                information about
                how we collect and use data on our site.
            </p>

        </div>

        <div class="row">

            <p class="p__content--body">
                <strong>If you feel that we are not abiding by this disclaimer, you should contact us immediately via
                    email.</strong>
            </p>

        </div>
    </section>

@endsection('content')

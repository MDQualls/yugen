@extends('layouts.app')

@section('content')
    @include('partials.pagetitle')

    <div class="container mb70">
        <div class="row">
            <div class="col">
                <h2 class="mb30">Disclaimer Notice</h2>
                <p class="lead">
                    Unless otherwise noted, the content on this site in the form of blog posts, photos and other
                    media are the express property of Michael and Holly Qualls, the owners of Yugen Farm.  No consent
                    is given to use content from this site without a notice of our ownership and a link to the content
                    in question unless express permission is given.
                </p>
                <p>
                    In the even that this site does use or reference third party content, photos or other media, there
                    is no real or implied attempt to assert ownership or monetary benefit from these items.
                    This site will make every attempt to give full credit to, and link to, any third party from which
                    we have referenced content.
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
                    <strong>If you feel that we are not abiding by this disclaimer, you should contact us immediately via email.</strong>
                </p>
            </div>
        </div>

    </div>

@endsection('content')

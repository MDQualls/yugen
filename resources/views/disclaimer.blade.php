@extends('layouts.app')

@section('content')

    <section class="disclaimer-section">
        <div class="row dark-bottom-border">

            <h1 class="h1__title">Disclaimer Notice</h1>
            <p class="p__content--lead">
                Unless otherwise noted, the content on this site in the form of blog posts, photos and other
                media are the express property of Michael and Holly Qualls, the owners of Yugen Farm. No consent
                is given to use content from this site without a notice of our ownership and a link to the content
                in question unless express permission is given.
            </p>
            <p class="p__content--lead">
                In the even that this site does use or reference third party content, photos or other media, there
                is no real or implied attempt to assert ownership or monetary benefit from these items.
                This site will make every attempt to give full credit to, and link to, any third party from which
                we have referenced content.
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

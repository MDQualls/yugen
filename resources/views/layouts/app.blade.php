<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-170498281-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-170498281-1');
    </script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @if(isset($post))
        <meta property="og:url"           content="{!! url()->current() !!}" />
        <meta property="og:type"          content="website" />
        <meta property="og:title"         content="{!! $post->title !!}" />
        <meta property="og:description"   content="{!! $post->summary !!}" />
    @endif
    <meta name="description" content="Yugen Farm is a sustainable, permaculture small-scale farm in Oklahoma.">
    <meta name="keywords"
          content="Permaculture, Hügelkultur, Farming, Small-scale Farming, Alpacas, Bee Keeping, Backyard Chickens, lavender"/>
    <meta name="author" content="Michael Qualls">

    <title>{{ config('app.name') }}</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
          integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
          crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('css')

</head>
<body>

<div id="preloader">
    <div id="preloader-inner"></div>
</div><!--/preloader-->

<!-- Site Overlay -->
<div class="site-overlay"></div>

@if($agent->isMobile() || $agent->isTablet())
    @include('partials.mobile-nav')
@else
    @include('partials.nav')
@endif

<main>
    @yield('content')
</main>

<footer class="footer">
    <div class="footer__content">
        <h4 class="h4__title"><i class="fas fa-envelope"></i> yugenfarm@gmail.com</h4>
        <div>&copy; Copyright <span id="year"></span> {{ config('app.name') }} | Application by Michael Qualls</div>
        <div>
            <a href="{{route('privacy')}}">Privacy Policy</a> |
            <a href="{{route('cookies')}}">Cookies Policy</a> |
            <a href="{{route('disclaimer')}}">Disclaimer</a>
        </div>
    </div>
</footer>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>

<script>
    // Get the current year for the copyright
    $('#year').text(new Date().getFullYear());
</script>

@yield('scripts')

</body>

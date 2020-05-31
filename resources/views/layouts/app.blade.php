<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Yugen Farm is a sustainable, permaculture hobby farm in Oklahoma.">
    <meta name = "keywords" content = "Permaculture, Hügelkultur, Farming, Hobby Farming, Alpacas, Bee Keeping, Backyard Chickens" />
    <meta name="author" content="Michael Qualls">

    <title>{{ config('app.name') }}</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
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


            @include('partials.nav')
            <main>
                @yield('content')
            </main>


{{--        <footer class="footer">--}}
{{--            <div class="footer__content">--}}
{{--                <h4 class="h4__title"><i class="fas fa-envelope"></i> yugenfarm@gmail.com</h4>--}}
{{--                <div>&copy; Copyright <span id="year"></span> {{ config('app.name') }} | Application by Michael Qualls</div>--}}
{{--                <div>--}}
{{--                    <a href="{{route('privacy')}}">Privacy Policy</a> |--}}
{{--                    <a href="{{route('cookies')}}">Cookies Policy</a> |--}}
{{--                    <a href="{{route('disclaimer')}}">Disclaimer</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </footer>--}}

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <script>
        // Get the current year for the copyright
        $('#year').text(new Date().getFullYear());
    </script>

    @yield('scripts')

</body>

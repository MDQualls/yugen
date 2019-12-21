<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Yugen Farm is a sustainable, permaculture hobby farm in New Mexico.">
    <meta name = "keywords" content = "Permaculture, Hügelkultur, Farming, Hobby Farming, Lavender Farming, Bee Keeping, Backyard Chickens" />
    <meta name="author" content="Michael Qualls">

    <title>{{ config('app.name') }}</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
          crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    @yield('css')

</head>
<body>
    <div id="preloader">
        <div id="preloader-inner"></div>
    </div><!--/preloader-->

    <!-- Site Overlay -->
    <div class="site-overlay"></div>

    <div id="app">
        @include('partials.nav')
        <main>

            <div class="row">
                <div class="col-md-12">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>

    <footer class="footer footer-dark pt50 pb30">
        <div class="container">
            <div class="row">
                <div class="col-lg-6  ml-auto mr-auto text-center">
                    <ul class="social-icons list-inline">
{{--                        <li class="list-inline-item">--}}
{{--                            <a href="#">--}}
{{--                                <i class="fab fa-facebook-square"></i>Facebook--}}
{{--                            </a>--}}
{{--                        </li>--}}
                        {{--                        <li class="list-inline-item">--}}
                        {{--                            <a href="#">--}}
                        {{--                                <i class="fab fa-twitter-square"></i>twitter--}}
                        {{--                            </a>--}}
                        {{--                        </li>--}}
                        {{--                        <li class="list-inline-item">--}}
                        {{--                            <a href="#">--}}
                        {{--                                <i class="fab fa-instagram"></i>instagram--}}
                        {{--                            </a>--}}
                        {{--                        </li>--}}
                    </ul>
                    <h4><i class="fas fa-envelope"></i> yugenfarm@gmail.com</h4>
                    <p>
                        <div>&copy; Copyright <span id="year"></span> {{ config('app.name') }} | Application by Michael Qualls</div>
                    </p>

                    <p>
                        <div>
                            <a href="{{route('privacy')}}">Privacy Policy</a> |
                            <a href="{{route('cookies')}}">Cookies Policy</a> |
                            <a href="{{route('disclaimer')}}">Disclaimer</a>
                        </div>
                    </p>

                </div>
            </div>
        </div>
    </footer>
    <!--back to top-->
    <a href="#" class="back-to-top hidden-xs-down" id="back-to-top"><i class="fas fa-angle-up"></i></a>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/plugins/plugins.js') }}"></script>
    <script src="{{ asset('js/assan.custom.js') }}"></script>

    <script>
        // Get the current year for the copyright
        $('#year').text(new Date().getFullYear());
    </script>

    @yield('scripts')

</body>

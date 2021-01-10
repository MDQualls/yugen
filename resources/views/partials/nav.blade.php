<nav class="sticky-top">
    <div class="nav">
        <div class="nav__brand" >
            <a href="{{ url('/') }}">
                {{ config('app.name', 'Yugen Farm') }}
            </a>
        </div>
        <ul class="nav__navbar">
            <li class="nav__item--dropdown">
                <input type="checkbox" class="nav__item--dropdown__checkbox" id="navi-toggle-media">

                <label class="nav__item--dropdown__label" for="navi-toggle-media">
                    <i class="fas fa-photo-video"></i> Media <i class="fas fa-caret-up"></i>
                </label>

                <div class="dropdown__menu dropdown__menu--right" aria-labelledby="navbarDropdown">

                    <a href="{{route('gallery')}}"
                       class="dropdown__item"><i class="fas fa-file-image"></i> &nbsp;Gallery</a>

                    <a href="{{route('videos')}}"
                       class="dropdown__item"><i class="fab fa-tiktok"></i> &nbsp;TikTok</a>
                </div>
            </li>
            <li class="nav__item">
                <a class="nav__link" href="{{route('timeline', Carbon\Carbon::parse(now())->format('Y'))}}"><i class="far fa-calendar-alt"></i> Timeline</a>
            </li>

            @guest
                <li class="nav__item">
                    <a class="nav__link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> {{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav__item">
                        <a class="nav__link" href="{{ route('register') }}"><i class="fas fa-user-plus"></i> {{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav__item--dropdown">
                    <input type="checkbox" class="nav__item--dropdown__checkbox" id="navi-toggle">

                    <label class="nav__item--dropdown__label" for="navi-toggle">
                        Welcome, {{ Auth::user()->name }} <i class="fas fa-caret-up"></i>
                    </label>

                    <div class="dropdown__menu dropdown__menu--right" aria-labelledby="navbarDropdown">

                        <a href="{{route('user-settings', auth()->user()->id)}}"
                           class="dropdown__item"><i class="fas fa-user-circle"></i> User Settings</a>

                        <a href="{{route('user-password', auth()->user()->id)}}"
                           class="dropdown__item"><i class="fas fa-lock"></i> Change Password</a>

                        @if(Auth::user()->isAdmin())
                            <a href="{{route('dashboard')}}" class="dropdown__item"><i class="fas fa-cog"></i> Dashboard</a>
                        @endif

                        <a class="dropdown__item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                 document.getElementById('logout__form').submit();">
                            <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                        </a>

                        <form id="logout__form" action="{{ route('logout') }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>

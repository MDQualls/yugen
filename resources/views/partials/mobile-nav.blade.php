<div class="mobile-nav">
    <input type="checkbox" class="mobile-nav__checkbox" id="navi-toggle">
    <label for="navi-toggle" class="mobile-nav__button">
        <span class="mobile-nav__icon">&nbsp;</span>
    </label>

    <div class="mobile-nav__nav">
        <ul class="mobile-nav__list">
            <li class="mobile-nav__item"><a href="{{route('gallery')}}" class="mobile-nav__link">Gallery</a></li>
            <li class="mobile-nav__item"><a href="{{route('videos')}}" class="mobile-nav__link">Videos</a></li>
            <li class="mobile-nav__item"><a href="{{route('timeline', Carbon\Carbon::parse(now())->format('Y'))}}" class="mobile-nav__link">Timeline</a></li>
            @guest
                <li class="mobile-nav__item"><a href="{{route('login')}}" class="mobile-nav__link">Login</a></li>
                <li class="mobile-nav__item"><a href="{{route('register')}}" class="mobile-nav__link">Register</a></li>
            @else
                <li class="mobile-nav__item">
                    <a href="{{route('user-settings', auth()->user()->id)}}" class="mobile-nav__link">Settings</a>
                </li>
                <li class="mobile-nav__item">
                    <a href="{{route('user-password', auth()->user()->id)}}" class="mobile-nav__link">Password</a>
                </li>

                @if(Auth::user()->isAdmin())
                    <li class="mobile-nav__item"><a href="{{route('dashboard')}}"  class="mobile-nav__link">Dashboard</a></li>
                @endif

                <li class="mobile-nav__item">
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                        document.getElementById('logout__form').submit();" class="mobile-nav__link">{{ __('Logout') }}
                    </a>
                </li>

                <form id="logout__form" action="{{ route('logout') }}" method="POST"
                      style="display: none;">
                    @csrf
                </form>
            @endguest
        </ul>
    </div>
</div>

<div class="mobile-nav__brand" >
    <a href="{{ url('/') }}">
        &nbsp;
        <span>
            {{ config('app.name', 'Yugen Farm') }}
        </span>
    </a>
</div>

<nav class="row">
    <div class="nav">
        <div class="nav__brand" >
            <a href="{{ url('/') }}">
                {{ config('app.name', 'Yugen Farm') }}
            </a>
        </div>
        <ul class="nav__navbar">
            <li class="nav__item">
                <a class="nav__link" href="{{route('blog')}}"><i class="fas fa-home"></i> Home</a>
            </li>
            <li class="nav__item">
                <a class="nav__link" href="{{route('about')}}"><i class="fas fa-door-open"></i> About</a>
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
                <li class="nav__item dropdown">
                    <a id="navbarDropdown" class="nav__link dropdown-toggle" href="#" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Welcome {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                        <a href="{{route('user-settings', auth()->user()->id)}}"
                           class="dropdown-item"><i class="fas fa-user-circle"></i> User Settings</a>

                        <a href="{{route('user-password', auth()->user()->id)}}"
                           class="dropdown-item"><i class="fas fa-lock"></i> Change Password</a>

                        @if(Auth::user()->isAdmin())
                            <a href="{{route('dashboard')}}" class="dropdown-item"><i class="fas fa-cog"></i> Dashboard</a>
                        @endif

                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>

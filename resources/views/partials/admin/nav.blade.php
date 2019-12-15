<nav class="navbar navbar-expand-sm navbar-dark bg-dark p-0">
    <div class="container">
        <a href="{{ route('dashboard')  }}" class="navbar-brand">{{ config('app.name') }}</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav">

                <li class="nav-item dropdown px-2">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        Posts
                    </a>
                    <div class="dropdown-menu">
                        <a href="{{ route('post.index') }}" class="dropdown-item">Active Posts</a>

                        <a href="{{ route('archived-posts') }}" class="dropdown-item">Archived Posts</a>

                    </div>
                </li>
                <li class="nav-item px-2">
                    <a href="{{ route('category.index') }}" class="nav-link">Categories</a>
                </li>
                <li class="nav-item px-2">
                    <a href="{{ route('user.index') }}" class="nav-link">Users</a>
                </li>
                <li class="nav-item px-2">
                    <a href="{{ route('tag.index') }}" class="nav-link">Tags</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">

                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown mr-3">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i> Welcome {{ auth()->user()->name }}
                        </a>
                        <div class="dropdown-menu">
                            <a href="{{route('user.edit', auth()->user()->id)}}" class="dropdown-item"><i class="fas fa-user-circle"></i> Profile</a>
{{--                            <a href="#" class="dropdown-item"><i class="fas fa-cog"></i> Settings</a>--}}
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fas fa-user-times"></i> {{ __('Logout') }}
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
    </div>
</nav>

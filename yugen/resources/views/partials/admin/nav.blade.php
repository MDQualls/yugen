<nav class="navbar navbar-expand-sm navbar-dark bg-dark p-0">
    <div class="container">
        <a href="{{ route('home')  }}" class="navbar-brand">{{ config('app.name') }}</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav">
                <li class="nav-item px-2">
                    <a href="{{ route('post.index') }}" class="nav-link">Posts</a>
                </li>
                <li class="nav-item px-2">
                    <a href="{{ route('category.index') }}" class="nav-link">Categories</a>
                </li>
                <li class="nav-item px-2">
                    <a href="{{ route('user.index') }}" class="nav-link">Users</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown mr-3">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i> Welcome Michael
                    </a>
                    <div class="dropdown-menu">
                        <a href="profile.html" class="dropdown-item"><i class="fas fa-user-circle"></i> Profile</a>
                        <a href="settings.html" class="dropdown-item"><i class="fas fa-cog"></i> Settings</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="login.html" class="nav-link"><i class="fas fa-user-times"></i> Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

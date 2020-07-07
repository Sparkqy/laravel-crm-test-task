<nav
    class="@unless(in_array(Route::currentRouteName(), ['login', 'register']))main-header @endunless navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        @if (Route::has('login'))
            @auth
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf

                        <button type="submit" class="btn btn-sm btn-primary">Logout</button>
                    </form>
                </li>
            @else
                <li class="nav-item">
                    <a href="{{ route('login') }}">Login</a>
                </li>

                @if (Route::has('register'))
                    <li class="nav-item ml-3">
                        <a href="{{ route('register') }}">Register</a>
                    </li>
                @endif
            @endauth
        @endif
    </ul>
</nav>

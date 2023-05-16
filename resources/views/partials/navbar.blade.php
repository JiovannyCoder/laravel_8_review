<nav class="navbar bg-dark navbar-expand-sm navbar-dark">
    <div class="container">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Acceuil</a></li>
            <li class="nav-item"><a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a></li>
        </ul>

        @guest
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
            </ul>
        @endguest
        @auth
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">{{ Auth::user()->name }}</a></li>
            <li class="nav-item">
                <form class="form-inline" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <a role="button" class="nav-link" onclick="event.preventDefault(); this.closest('form').submit()">Log Out</a>
                </form>
            </li>
        </ul>
        @endauth
    </div>
</nav>
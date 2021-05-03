<nav class="navbar top-navbar sticky-top navbar-light bg-light navbar-expand-lg">
    <a href="" class="navbar-brand">
        <img src="{{ asset('images/top-logo.svg') }}">
    </a>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav">
            <li class="nav-item mx-3">
                <a href="#" class="nav-link">Home</a>
            </li>

            <li class="nav-item mx-3">
                <a href="#" class="nav-link">Schools</a>
            </li>

            <li class="nav-item mx-3">
                <a href="#" class="nav-link">Sports</a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <a href="{{ route('auth.login.index') }}" class="btn shadow-none my-2 my-sm-0 mr-2 px-4 btn-dark">Login</a>
            <a href="{{ route('auth.sign-up.index') }}" class="btn shadow-none my-2 my-sm-0 mr-2 px-4 btn-outline-dark">Sign up</a>
        </ul>
    </div>
</nav>

<div id="page-header-container">
    <div id="main-header-container" class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-right">
                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Hi, {{ session('user.fullName') }}
                    </button>

                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">
                            <strong>My Profile</strong>
                            <p>Account settings and more</p>
                        </a>

                        <a class="dropdown-item" href="#">
                            <strong>My Tasks</strong>
                            <p>Latest task and activities</p>
                        </a>

                        <a class="dropdown-item" href="#">
                            <strong>Messages</strong>
                            <p>Inbox and other communications</p>
                        </a>

                        <div class="dropdown-divider"></div>

                        <div class="text-right">
                            <a href="{{ route('auth.logout') }}" class="btn btn-sm btn-light">Sign-out</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="secondary-header-container" class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @yield('secondary-header')
            </div>
        </div>
    </div>

    @include('partials.flash-messages')
</div>

<div id="page-sidebar-container">
    <div id="logo-container">
        <img src="{{ asset('images/top-logo.svg') }}">
    </div>

    <div id="menu-container">
        <ul>
            <a href="">Dashboard</a>
            <a href="{{ route('admin.organisations.index') }}">Organization</a>
            <a href="">Prospecting</a>
            <a href="">Harvesting</a>
            <a href="{{ route('admin.users.index') }}">Users</a>
            <a href="">Settings</a>
        </ul>
    </div>
</div>

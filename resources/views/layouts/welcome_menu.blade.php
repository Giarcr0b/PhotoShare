<nav class="navbar navbar-static-top navbar-default">
    <div class="container">
        <div class="navbar-header">
            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Photo Share') }}
            </a>
        </div>
        <!-- Left Side Of Navbar -->
        <ul class="nav nav-pills pull-left">
            &nbsp;
            <li><a href="{{ url('/pages/photographer') }}">Photographers</a></li>
            <li><a href="{{ url('/pages/search') }}">Search</a></li>
        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="nav nav-pills pull-right">
            <!-- Authentication Links -->
            <li role="presentation"><a href="{{ url('/login') }}">Login</a></li>
            <li role="presentation"><a href="{{ url('/register') }}">Register</a></li>

        </ul>

    </div>

</nav>
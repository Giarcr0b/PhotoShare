<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('home') }}">
                {{ config('app.name', 'Photo Share') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav nav-pills pull-left">
                &nbsp;<li><a href="{{ url('/pages/photographer') }}">Photographers</a></li>
                <li><a href="{{ url('/pages/search') }}">Search</a></li>
                @if( Auth::user()->user_type == 'Admin')
                <li><a href="{{ url('/admin/index') }}">Admin</a></li>
                    @else
                    <li><a href="{{ url('/profiles/chat') }}">Chat Room</a></li>
                @endif
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav nav-pills pull-right">
                <li role="presentation"><a href="{{ url('/profiles/index') }}">Profile</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{ url('/logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav>
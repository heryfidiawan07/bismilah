<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a id="logo" class="navbar-brand" href="{{ url('/') }}">
                <img style="height: 50px; margin-top: -12px;" src="/kampusmobil.png">
            </a>
            <!-- Brandi Modal -->
            <div class="navbar-brand">
                <a href="#" type="button" class="dropdown" id="brandNav" data-toggle="modal" data-target="#myModal">
                    Brand
                </a>
            </div>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if(Auth::check())
                    @if(Auth::user()->admin())
                        <li><a href="/admin">Dasboard</a></li>
                    @endif
                @endif
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/spesifikasi') }}">Spesifikasi</a></li>
                <li><a href="{{ url('/articles') }}">Berita</a></li>
                <li><a href="{{ url('/forum') }}">Forum</a></li>
                @if(Auth::check())
                    <li><a href="{{ url('/member') }}/{{Auth::user()->slug}}">Profil</a></li>
                @endif
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} 
                            <span class="caret"></span>
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
                    <li>
                        <a href="/member/{{Auth::user()->slug}}" id="imgUser">
                            <img src="{{Auth::user()->avatar()}}" class="img-circle pull-left" style="margin-top: -7px; margin-right: 10px;">
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
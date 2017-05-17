<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }}</title>

    <link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!--<link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet">-->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/compiled.min.css') }}" rel="stylesheet">

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    @yield('style')

</head>

<body class="grey lighten-4">

    <!--Navbar-->
    <nav class="navbar navbar-toggleable-md navbar-dark fixed-top scrolling-navbar">
        <div class="container">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">
                <strong>{{ config('app.name') }}</strong>
            </a>
            <div class="collapse navbar-collapse" id="navbarNav1">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ URL::to('/') }}">Home</a>
                    </li>
                    @if (Auth::guest())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @else
                        <li class="nav-item btn-group">
                            <a class="nav-link dropdown-toggle" id="dropdownUser" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->nama_user }}</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownUser">
                                <a class="dropdown-item" href="{{ URL::to('profile') }}">Profil</a>
                                <a class="dropdown-item" href="{{ URL::to('pesanan') }}">Pesanan</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                        @if (Auth::user()->status_catering)
                            <li class="nav-item btn-group">
                                <a class="nav-link dropdown-toggle" id="dropdownCatering" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->nama_catering }}</a>
                                <div class="dropdown-menu" aria-labelledby="dropdownCatering">
                                    <a class="dropdown-item" href="{{ URL::to('dashboard/profile') }}">Profil</a>
                                    <a class="dropdown-item" href="{{ URL::to('dashboard/pesanan') }}">Pesanan</a>
                                    <a class="dropdown-item" href="{{ URL::to('dashboard/menu') }}">Menu</a>
                                </div>
                            </li>
                        @endif
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!--Footer-->
    <footer class="page-footer center-on-small-only">
        <div class="footer-copyright">
            <div class="container-fluid">
                © 2017 Copyright: <a href="http://www.MDBootstrap.com"> CATERINA </a>
            </div>
        </div>
    </footer>
    <!--/.Footer-->


    <!-- SCRIPTS -->
    <script type="text/javascript" src="{{ asset('js/jquery-2.2.3.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/tether.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/mdb.min.js') }}"></script>

    <!-- Animations init-->
    <script>
        new WOW().init();
    </script>

    @yield('javascript')


</body>

</html>

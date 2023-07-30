<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Maju-Food') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/footer.css') }}">
    @yield('extra-css')
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm" id="navigationMenu">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav">
                        <li class="nav-item px-3">
                            <a class="nav-link" href="{{ route('home') }}">Accueil</a>
                        </li>
                        <li class="nav-item px-3">
                            <a class="nav-link" href="{{ route('home') }}#network">Nos réseaux</a>
                        </li>
                        <li class="nav-item px-3">
                            <a class="nav-link" href="{{ route('menu') }}">Menu</a>
                        </li>
                        @if (Auth::user())
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" href="#"data-bs-toggle="dropdown"
                                    class="nav-link dropdown-toggle">{{ Auth::user()->name }}</a>
                                <ul class="dropdown-menu">
                                    <li><a href="#" class="dropdown-item">Profile</a></li>
                                    <li class="dropdown-divider"></li>
                                    @if (Auth::user()->role->type == 'admin')
                                        <li>
                                            <a href="{{ route('create-meal') }}" class="dropdown-item">Ajouter un plat</a>
                                        </li>
                                        <li class="dropdown-divider"></li>
                                        <li>
                                            <a href="{{ route('create-category') }}" class="dropdown-item">Ajouter une categorie de plat</a>
                                        </li>
                                        <li class="dropdown-divider"></li>
                                    @endif
                                    <li><a href="{{ route('login') }}"
                                            onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"
                                            class="dropdown-item">Se déconnecter</a></li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="post"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </ul>
                            </li>
                        @else
                            <li class="nav-item px-3">
                                <a href="{{ route('register') }}" class="nav-link">S'enregistrer</a>
                            </li>
                            <li class="nav-item px-3">
                                <a href="{{ route('login') }}" class="nav-link">Se connecter</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        <footer class="footer">
            @yield('footer-content')
            <nav class="navbar navbar-expand-lg p-4 navbar-dark bg-primary justify-content-center">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <span class="navbar-text">
                            Released by
                        </span>
                        <a href="https://www.fiverr.com/dodomayamba?up_rollout=true" class="nav-link px-5">Dorian
                            Mayamba</a>
                        <span class="navbar-text">
                            Copyright &copy 2023
                        </span>
                    </li>
                </ul>
            </nav>
        </footer>
    </div>
@yield('extra-js')
    <script type="text/javascript">
        $(document).ready(function(){
            console.log('ready');
        })
    </script>
</body>

</html>

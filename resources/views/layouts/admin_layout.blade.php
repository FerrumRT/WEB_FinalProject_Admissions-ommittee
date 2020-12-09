<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #b20006;">
    <a class="navbar-brand" href="{{url('/')}}"><i class="fas fa-home"></i> ADMISSIONS</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">+7(700)-654-02-75</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-map-marked-alt"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="far fa-question-circle"></i></a>
            </li>
        </ul>
    </div>

    <div>
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
        <a class="navbar-brand" href="#">
            <img src="images/iitu_logo.png" height="50" alt="" loading="lazy">
        </a>
    </div>
</nav>
<nav class="nav nav-pills nav-fill" style="background-color: #1c1c1c;">
    <a class="nav-link link text-white" href="admin.php">Students</a>
    <a class="nav-link link text-white" href="admin_ad_mem.php">Admission members</a>
    <a class="nav-link link text-white" href="admin_deu_deg.php">Education degrees</a>
    <a class="nav-link link text-white disabled" href="">Faculties</a>
</nav>

@yield('content')

<footer class="container-fluid" style="background-color:#4c5d67">
    <div class="container pt-5 pb-3 text-white">
        <div class="row justify-content-center pb-4">
            <div class="col-4">
                <h5><a href="{{url('/about')}}" class="text-white">About IITU</a></h5>
                <h5><a href="{{url('/contacts')}}" class="text-white">Contacts</a></h5>
                <h5><a href="#" class="text-white">Feedback</a></h5>
            </div>
            <div class="col-3">
                <p>Manasa, 34/1 050040, Almaty city, Kazakhstan</p>
            </div>
        </div>
        <p class="text-center">Copyright All Rights Reserved 2020</p>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/6efa37f450.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Admission' }}</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet">

</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #b20006;">
    <a class="navbar-brand" href="{{url('/')}}"><i class="fas fa-home"></i> ADMISSIONS</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
            <a class="nav-link " href="#">
                {{ Auth::user()->name }}
            </a>
            <a class="nav-link" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            </li>
        @endguest
    </ul>
</nav>
<nav class="nav nav-pills nav-fill" style="background-color: #1c1c1c;">
    <a class="nav-link link text-white" href="#">ONLINE RECEPTION</a>
    <a class="nav-link link text-white" href="#">FOR PUPILS</a>
    <a class="nav-link link text-white" href="{{url('/bachelor')}}">BACHELOR'S PROGRAM</a>
    <a class="nav-link link text-white" href="#">MASTER'S PROGRAM</a>
    <a class="nav-link link text-white" href="#">INTERNSHIP</a>
    <a class="nav-link link text-white" href="#">PHD PROGRAM</a>
    <a class="nav-link link text-white" href="#">POSTDOC</a>
    <a class="nav-link link text-white" href="#">FOR FOREIGN APPLICANTS</a>
</nav>
<div class="container-fluid p-0" style="min-height: 468px">
@yield('content')
</div>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://kit.fontawesome.com/6efa37f450.js"></script>
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
@yield('script')
</body>
</html>

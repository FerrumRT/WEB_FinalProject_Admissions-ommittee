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
    <a class="navbar-brand" href="{{url('/')}}"><img src="https://lh3.googleusercontent.com/proxy/OcjAT3g7Dhn1orttyBbv-6RBou-LDGokbt-6__UC4lOdgOwXFVFUASUKdSRu80QKHByvE_KY3Kjqk5vSz9evV2k1M4HEwEiFqeaKcG1RbLejLsshqQ" style="width: 70px; height: auto" alt="">
        <img src="{{ asset('img/iitu_logo.png') }}" style="width: 70px">
        ADMISSIONS
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="ml-auto">
        <ul class="navbar-nav ">
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
                @if (Auth::user()->is_admin)
                    <a href="{{route('admin-students')}}" class="nav-link">Admin panel</a>
                    <a class="nav-link " href="{{ route('ad-mem-profile', ['id' => Auth::user()->id]) }}">
                        {{ Auth::user()->name }}
                    </a>
                @endif
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
    </div>
</nav>
<nav class="nav nav-pills nav-fill" style="background-color: #1c1c1c;">
    <a class="nav-link link text-white" href="{{ route('admin-students') }}">Students</a>
    <a class="nav-link link text-white" href="{{ route('admin-ad-mem') }}">Admission members</a>
    <a class="nav-link link text-white" href="{{ route('admin-edu-deg') }}">Education degrees</a>
    <a class="nav-link link text-white" href="{{ route('admin-faculties') }}">Faculties</a>
</nav>

@include('inc.message')
@yield('content')

<footer class="container-fluid" style="background-color:#4c5d67;">
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

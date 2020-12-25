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
<nav class="navbar navbar-expand-lg navbar-dark bg-iitucolor">
    <a class="navbar-brand" href="{{url('/')}}"><img src="{{ asset('img/iitu_logo.png') }}" style="width: 70px"> ADMISSIONS</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

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
            @if (Auth::user()->is_admin)
                <a href="{{route('admin-students')}}" class="nav-link">Admin panel</a>
            @endif
            @if (Auth::user()->admission_member_id!=null)
                <a class="nav-link " href="{{ route('ad-mem-profile', ['id' => Auth::user()->id]) }}">
                    {{ Auth::user()->name }}
                </a>
            @endif
            @if (Auth::user()->student_id!=null)
                <a class="nav-link " href="{{route('student-profile', ['id' => Auth::user()->id])}}">
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
</nav>
<nav class="nav nav-pills nav-fill" style="background-color: #1c1c1c;">
    @guest
        <a type="button" class="nav-link link text-white" data-toggle="modal" data-target="#exampleModal">
            ONLINE RECEPTION
        </a>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">You aren't authorized</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h6>To use this function you should to authorize.</h6>
                        <h6>Also you can call to admission or write message to Email <a href="{{route('contacts')}}" class="text-iitucolor">there</a></h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="{{ route('login') }}" class="btn btn-iitucolor">{{__('Login')}}</a>
                        <a href="{{ route('register') }}" class="btn btn-iitucolor">{{__('Register')}}</a>
                    </div>
                </div>
            </div>
        </div>
    @else
        @if (Auth::user()->admission_member_id!=null)
            <a href="{{route('reception-admission')}}" class="nav-link link text-white">ONLINE RECEPTION</a>
        @endif
        @if (Auth::user()->student_id!=null)
            <a href="{{route('reception-student')}}" class="nav-link link text-white">ONLINE RECEPTION</a>
        @endif
    @endguest
    <a class="nav-link link text-white" href="{{route('news')}}">NEWS</a>
    @foreach($edu_deg as $deg)
        <a class="nav-link link text-white" href="{{ route('edu-deg-info', ['name' => $deg->name]) }}"><span style="text-transform:uppercase;">{{ $deg->name }} PROGRAM</span></a>
    @endforeach
</nav>
<div class="container-fluid p-0" style="min-height: 468px">
    @include('inc.message')
    @yield('content')
</div>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://kit.fontawesome.com/6efa37f450.js"></script>
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
@yield('script')
</body>
</html>

@extends('layouts.user_layout')

@section('content')
<!-- Head carousel -->
<section class="container-fluid px-0">
    <div id="carouselExampleInterval" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item thumb-post active" >
                <img src="{{ asset('img/head_carousel_1.jpg') }}" class="d-block w-100">
            </div>
            <div class="carousel-item thumb-post">
                <img src="{{ asset('img/head_carousel_2.jpg') }}" class="d-block w-100">
            </div>
        </div>
    </div>
</section>

<!-- News -->
<div class="container py-4">
    <div class="pt-3 row">
        <div class="col-4">
            <h2>
                News

                <a href="{{ route('news') }}" class="btn btn-outline-iitucolor ml-3">All news</a>

                @guest

                @else
                    @if(Auth::user()->is_adm_member)
                        <a href="{{ url('/news/create') }}" class="btn btn-outline-iitucolor ml-3">Add News</a>
                    @endif
                @endguest
            </h2>

        </div>
        <div class="col-8">
                <div class="d-flex justify-content-end">
                    <form action="{{ route('news') }}" method="get" class="form-inline my-2 my-lg-0 ">
                        <input class="form-control mr-sm-2" type="search" name="title" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0"  type="submit"> <i class="fas fa-search"></i> </button>
                    </form>
                </div>
        </div>

    </div>
    <hr>
    <div class="owl-carousel owl-theme">
        @foreach($news as $one_news)
        <div class="item">
            <div class="card">
                <div class="d-flex justify-content-center mx-1 mt-2">
                    <div class="crop__news">
                        <img src="{{ $one_news->image_url }}" class="card-img-top" alt="...">
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $one_news->title }}</h5>
                    <p class="card-text">{{ $one_news->short_content }}</p>
                    <small class="float-left my-2">{{ date_format(date_create($one_news->created_date), "M d Y") }}</small>
                    <a href="news/{{ $one_news->id }}" class="btn btn-iitucolor border float-right" >More...</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Faculties -->
<section class="container-fluid" style="background-color: #e5ecf3;">
    <div class="container py-4">
        <div class="pt-3">
            <h2>Faculties</h2>
        </div>
        <hr>
        <div class="flex-container mt-4">
            @foreach($faculties as $faculty)
                <span class="wow pulse" style="animation-delay: 0.1s; visibility: visible; animation-name: pulse;">
                    <div class="grad-box">
                        <a class="" href="faculties/{{$faculty->id}}">
                            <img class="grad-box-img" src="{{$faculty->image_url}}">
                            <span>{{$faculty->name}}</span>
                        </a>
                    </div>
                </span>
            @endforeach
        </div>
    </div>
</section>
@endsection

@section("script")
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            },
            autoplay: true,
            autoplayTimeout: 4000
        })
    </script>
@endsection

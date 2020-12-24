@extends('layouts.user_layout')

@section('content')
    <div class="container my-4">
        <h1>NEWS</h1>
        <hr>
        @foreach($news as $one_news)
            <div class="jumbotron py-4">
                <div class="d-flex justify-content-center pb-3">
                    <div>
                        <img src="{{$one_news->image_url}}" style="max-height: 500px">
                    </div>
                </div>
                <h1 class="mt-5">{{ $one_news->title }}</h1>
                <p class="lead">{{$one_news->short_content}}</p>
                <hr class="my-4">
                <div class="d-flex justify-content-between">
                    <p>{{ date_format(date_create($one_news->created_date), "M d Y H:i") }}</p>
                    <a class="btn btn-iitucolor btn-lg" href="#" role="button">More</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection

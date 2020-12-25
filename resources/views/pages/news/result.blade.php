@extends('layouts.user_layout')

@section('content')
    <div class="container my-4">
        <h1>NEWS</h1>
        <hr>
        <div class="row row-cols-2">
        @foreach($news as $one_news)
            <div class="p-2">
                <div class="card py-4">
                    <div class="card-body">
                        <div class="row">
                            <h1 class="col-8 mt-5">{{ $one_news->title }}</h1>
                            <div class="col-4">
                                <img src="{{$one_news->image_url}}" class="w-100">
                            </div>
                            <p class="col-8">{{$one_news->short_content}}</p>
                        </div>
                        <hr class="my-4">
                        <div class="d-flex justify-content-between">
                            <p>{{ date_format(date_create($one_news->created_date), "M d Y H:i") }}</p>
                            <a class="btn btn-iitucolor btn-lg" href="#" role="button">More</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
        @if($pages_count!=1)
            {{$news->appends(['title' => $title])->render()}}
        @endif
    </div>
@endsection

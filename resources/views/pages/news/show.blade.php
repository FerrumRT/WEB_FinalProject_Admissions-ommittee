@extends('layouts.user_layout')

@section('content')
    <div class="container my-4">
        <div class="row-cols-1">
            <h2 class="text-center">{{ $one_news->title }}</h2>
            <img src="{{ $one_news->image_url }}" style="margin: 10px; width: 25%">
            <p style="font-size: 25px;">{{ $one_news->content }}</p>
            <p>Wrote by: <a href="#">{{ $user->name }}</a> {{ date_format(date_create($one_news->created_date), "M d Y H:i") }}</p>
        </div>
    </div>
@endsection

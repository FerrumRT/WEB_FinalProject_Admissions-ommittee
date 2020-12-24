@extends('layouts.user_layout')

@section('content')
    <div class="container my-3">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title text-center"><strong>{{ $deg->name }}</strong> Program.</h1>

                {!! $deg->description !!}

                @if(sizeof($faculties)!=0)
                    <div class="row justify-content-center">
                        <h2>Educational Programs </h2>
                    </div>
                    <div class="row justify-content-center">
                        <div class="flex-container mt-4">

                            @foreach($faculties as $faculty)
                                <span class="wow pulse" style="animation-delay: 0.1s; visibility: visible; animation-name: pulse;">
                                    <div class="grad-box">
                                        <a class="" href="{{route('faculty-info', ['id'=>$faculty->id])}}">
                                            <img class="grad-box-img" src="{{$faculty->image_url}}">
                                            <span>{{$faculty->name}}</span>
                                        </a>

                                    </div>
                                </span>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="row justify-content-center">
                        <h2>No Educational Program</h2>
                    </div>
                @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.user_layout')

@section('content')
    <div class="container my-3">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title"><strong>{{ $deg->name }}</strong></h3>

                @if(!is_null($faculties))
                    <div class="row justify-content-center">
                        <h2>Educational Programs</h2>
                    </div>
                    <div class="row justify-content-center">
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
                @endif
                </div>
            </div>
        </div>
    </div>
@endsection

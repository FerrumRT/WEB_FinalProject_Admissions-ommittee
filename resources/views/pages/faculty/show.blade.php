@extends('layouts.user_layout')

@section('content')
    <div class="container my-3">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title text-center"><strong>{{$faculty->name}}</strong></h2>
                <img src="{{$faculty->image_url}}" class="card-img-top w-50 m-3 float-right">
                <h5 class="card-text"><strong>Description:</strong></h5> {!! $faculty->description !!}
                @if(!empty($faculty->skills))<h5 class="card-text"><strong>Skills:</strong></h5> {!! $faculty->skills !!}@endif
                @if(!empty($faculty->outcomes))<h5 class="card-text"><strong>Outcomes:</strong></h5> {!! $faculty->outcomes !!}@endif
                @if(!empty($faculty->leading_position))<h5 class="card-text"><strong>Leading Position:</strong></h5> {!! $faculty->leading_position !!}@endif
                <h5 class="card-text"><strong>Education Degree:</strong></h5><p>{{ $edu_name }}</p>
            </div>
        </div>
    </div>
@endsection

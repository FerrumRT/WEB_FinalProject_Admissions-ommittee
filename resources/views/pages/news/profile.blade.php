@extends('layouts.user_layout')

@section('content')
    <div class="container my-3">
        <div class="card">
            <img src="{{$faculty->image_url}}" class="card-img-top">
            <div class="card-body">
                <h3 class="card-title"><strong>{{$faculty->name}}</strong></h3>
                <h5 class="card-text"><strong>Description:</strong></h5> {!! $faculty->description !!}
                @if($faculty->skills!="No Skills")<h5 class="card-text"><strong>Skills:</strong></h5> {!! $faculty->skills !!}@endif
                @if($faculty->outcomes!="No Outcomes")<h5 class="card-text"><strong>Outcomes:</strong></h5> {!! $faculty->outcomes !!}@endif
                @if($faculty->leading_position!="No Leading Position")<h5 class="card-text"><strong>Leading Position:</strong></h5> {!! $faculty->leading_position !!}@endif
                <h5 class="card-text"><strong>Education Degree:</strong></h5><p>{{ $edu_name }}</p>
            </div>
        </div>
    </div>
@endsection

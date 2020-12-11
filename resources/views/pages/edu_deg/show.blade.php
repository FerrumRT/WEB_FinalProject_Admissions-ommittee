@extends('layouts.user_layout')

@section('content')
    <div class="container my-3">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title"><strong>{{ $deg->name }}</strong></h3>
            </div>
        </div>
    </div>
@endsection

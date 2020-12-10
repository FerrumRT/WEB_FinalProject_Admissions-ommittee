@extends('layouts.user_layout')

@section('content')
    <div class="container my-3">
        <div class="col-6 offset-3">
            <h3>Add News</h3>
            {!! Form::open(['action' => 'NewsController@store', 'method'=> 'POST']) !!}
            <div class="form-group">
                {{ Form::label('title'), 'Title' }}
                {{ Form::text('title', '', ['class'=> 'form-control', 'placeholder' => 'Title']) }}
            </div>
            <div class="form-group">
                {{ Form::label('image_url'), 'Image URL' }}
                {{ Form::text('image_url', '', ['class'=> 'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('content'), 'Content' }}
                {{ Form::textarea('content', '', ['class'=> 'form-control']) }}
            </div>
            {{ Form::submit('Submit', ['class'=> 'btn btn-primary', 'style' => 'background-color']) }}
            {!! Form::close() !!}
        </div>
    </div>

@endsection

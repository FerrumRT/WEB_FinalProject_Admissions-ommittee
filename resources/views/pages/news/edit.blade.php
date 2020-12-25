@extends('layouts.user_layout')

@section('content')
    <div class="container my-3">
        <div class="col-6 offset-3">
            <h3>Edit News</h3>
            {!! Form::open(['action' => ['NewsController@update', $news->id], 'method'=> 'POST', 'enctype' => "multipart/form-data"]) !!}
            <div class="form-group">
                {{ Form::label('title'), 'Title' }}
                {{ Form::text('title', $news->title, ['class'=> 'form-control', 'placeholder' => 'Title']) }}
            </div>
            <div class="form-group">
                <div class="crop py-2 ">
                    <img src="{{$news->image_url}}">
                </div>
                <div class="custom-file mt-4">
                    <input type="file" class="custom-file-input" name="image" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('content'), 'Content' }}
                {{ Form::textarea('content', $news->content, ['class'=> 'form-control']) }}
            </div>
            {{Form::hidden('_method', 'PUT')}}
            <div class="container">
                {{ Form::submit('Submit', ['class'=> 'btn btn-success']) }}
                <button type="button" class="btn btn-iitucolor float-right" data-toggle="modal" data-target="#deleteModal">
                    Delete
                </button>
            </div>
            {!! Form::close() !!}

            <div class="modal fade" id="deleteModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Are you sure</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        {!! Form::open(['action' => ['NewsController@destroy', $news->id], 'method'=> 'POST']) !!}
                        <div class="modal-body">
                            If you delete this News it will be impossible to return it back!
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            {{ Form::submit('Delete', ['class'=> 'btn btn-iitucolor']) }}
                            {{Form::hidden('_method', 'DELETE')}}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

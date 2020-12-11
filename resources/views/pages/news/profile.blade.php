@extends('layouts.user_layout')

@section('content')
    <div class="container my-3">
        <div class="row">
            <div class="col-4">
                <div class="list-group">
                    <button type="button" class="list-group-item list-group-item-action">{{$student->getName()}}</button>
                    <button type="button" class="list-group-item list-group-item-action">{{$student->phone_number}}</button>
                    <button type="button" class="list-group-item list-group-item-action">{{$student->getEduDegName()}}</button>
                    <button type="button" class="list-group-item list-group-item-action">{{$student->getBirthdate()}}</button>
                </div>
            </div>
            <div class="col-8">

            </div>
        </div>
    </div>
@endsection

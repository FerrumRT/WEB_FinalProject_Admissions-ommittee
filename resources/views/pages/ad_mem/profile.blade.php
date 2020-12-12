@extends('layouts.user_layout')

@section('content')
    <div class="container my-3">
        <div class="row">
            <div class="col-4">
                <div class="card" style="width: 18rem;">
                    
                    <img src="{{$ad_mem_img}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <div class="list-group">
                            <button type="button" class="list-group-item list-group-item-action">{{$admission_member->getName()}}</button>
                            <button type="button" class="list-group-item list-group-item-action">{{$admission_member->getPhoneNumber()}}</button>
                            <button type="button" class="list-group-item list-group-item-action">{{$admission_member->getBirthdate()}}</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-8">

            </div>
        </div>
    </div>
@endsection

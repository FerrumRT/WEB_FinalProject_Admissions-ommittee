@extends('layouts.user_layout')

@section('content')
    <div class="container my-4">
        <div class="row-cols-1">
            <h1 ><b>{{ $one_news->title }}</b></h1>
            <p>
                Posted by: <b>{{ $user->name }}</b>
                {{ date_format(date_create($one_news->created_date), "M d Y") }}
                @guest @else
                    @if($user->id==\Illuminate\Support\Facades\Auth::user()->getAuthIdentifier())
                        <a href="{{url('/news/'.$one_news->id.'/edit')}}" class="btn btn-iitucolor float-right">
                            Edit
                        </a>
                    @endif
                @endguest
            </p>
            <div class="my-3 d-flex justify-content-center">
                <img src="{{ $one_news->image_url }}" style="max-height: 600px">
            </div>
            <p style="font-size: 20px;">{{ $one_news->content }}</p>

        </div>
    </div>
@endsection

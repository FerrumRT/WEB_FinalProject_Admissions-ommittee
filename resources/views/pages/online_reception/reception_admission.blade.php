@extends('layouts.user_layout')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-4">
                <div class="d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            @if($admission_member->image_url != null)
                                <div class="d-flex justify-content-center">
                                    <div class="crop ">
                                        <img src="{{$admission_member->image_url}}" style="border-radius: 5%" class="card-img-top">
                                    </div>
                                </div>
                            @else
                                <div class="d-flex justify-content-center">
                                    <div class="crop ">
                                        <img src="{{ asset('img/default_user.jpg') }}" style="border-radius: 5%" class="card-img-top">
                                    </div>
                                </div>
                            @endif
                            <div class="align-self-center d-flex align-content-center mt-3">
                                <h4 class="mb-0"><b>{{$admission_member->getName()}}</b></h4>
                            </div>
                            <hr>
                            <div class="mb-2 bd-highlight">
                                <a href="{{route('ad-mem-profile', ['id' => $admission_member->user_id])}}" class="btn btn-iitucolor btn-block">Profile</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-8">
                <div class="card mb-5">
                    <div class="card-body">
                        <h2 class="mb-0"><b>Online reception</b></h2>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-body">
                        <h2>Questions from students</h2>

                        @foreach($messages as $message)
                            <hr>
                            <div class="d-flex flex-column">
                                <div class="row">
                                    <div class="my-2 mx-4" >
                                        <div class="my-4 crop__chat" >
                                            <img src="{{$message->getStudentPic()}}" >
                                        </div>
                                    </div>
                                    <div class="my-2 d-flex flex-column">
                                        <div class="p-1"><h5><b>{{$message->getStudentName()}}</b></h5></div>
                                        <div class="p-1"><p>{{$message->message_text}}</p></div>
                                    </div>
                                    <div class="my-2 mx-2 ml-auto d-flex flex-column">
                                        <div class="p-1"><label>{{ date_format(date_create($message->send_date), "M d Y H:m") }}</label></div>
                                        <div class="p-1 d-flex justify-content-end">
                                            <form action="{{route('reception-answer', ['ad_id' => $admission_member->id, 'id' => $message->id])}}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-outline-iitucolor">Answer</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @if(!empty($chats))
                <div class="card mt-3">
                    <div class="card-body">
                        <h2>Recent chats</h2>

                        @foreach($chats as $chat)
                            <hr class="mt-0">
                            <a href="{{route('reception-chat', ['id' => $chat->id])}}" class="card-link text-dark">
                                <div class="row">
                                    <div class="my-2 mx-3">
                                        <div class="my-4 crop__chat" >
                                            @if($chat->latest_message_sender)
                                                <img src="{{$chat->getStudentPic()}}" >
                                            @else
                                                <img src="{{$chat->getAdmissionPic()}}" >
                                            @endif
                                        </div>
                                    </div>
                                    <div class="my-2 d-flex flex-column">
                                        <div class="p-1"><h5><b>
                                                    @if($chat->latest_message_sender)
                                                        {{$chat->getStudentName()}}
                                                    @else
                                                        {{$chat->getAdmissionName()}}
                                                    @endif
                                                </b></h5></div>
                                        <div class="p-1"><p>{{$chat->latest_message_text}}</p></div>
                                    </div>
                                    <div class="my-2 mx-2 ml-auto d-flex flex-column">
                                        <div class="p-1"><label>{{ date_format(date_create($chat->latest_message_time), "M d Y H:m") }}</label></div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection

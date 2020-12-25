@extends('layouts.user_layout')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-4">
                <div class="d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            @if(empty($student))
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
                            @elseif(empty($admission_member))
                                @if($student->student_picture_url != null)
                                    <div class="d-flex justify-content-center">
                                        <div class="crop ">
                                            <img src="{{$student->student_picture_url}}" style="border-radius: 5%" class="card-img-top">
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
                                    <h4 class="mb-0"><b>{{$student->getName()}}</b></h4>
                                </div>
                                <hr>
                                <div class="mb-2 bd-highlight">
                                    <a href="{{route('student-profile', ['id' => $student->user_id])}}" class="btn btn-iitucolor btn-block">Profile</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <h2 class="mb-0"><b>Online reception</b></h2>
                    </div>
                    <div style="overflow: auto; height: 700px;" id="scr">
                        <div class="d-flex flex-column">
                        @foreach($messages as $message)
                            <div class="mt-auto">
                                <hr class="my-0">
                                <div class="d-flex flex-column">
                                    <div class="row mx-2">
                                        <div class="my-2 mx-4" >
                                            <div class="my-4 crop__chat" >
                                                @if($message->student_sender)
                                                    <img src="{{$message->getStudentPic()}}">
                                                @else
                                                    <img src="{{$message->getAdmissionPic()}}">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="my-2 d-flex flex-column">

                                            <div class="p-1">
                                                @if($message->student_sender)
                                                    <h5 class="text-dark">
                                                        <b>
                                                            {{$message->getStudentName()}}
                                                        </b>
                                                    </h5>
                                                @else
                                                    <h5 class="text-iitucolor">
                                                        <b>
                                                            {{$message->getAdmissionName()}}
                                                        </b>
                                                    </h5>
                                                @endif
                                            </div>
                                            <div class="p-1"><p>{{$message->message_text}}</p></div>
                                        </div>
                                        <div class="my-2 mx-2 ml-auto d-flex flex-column">
                                            <div class="p-1"><label>{{ date_format(date_create($message->send_date), "M d Y H:m") }}</label></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                    <script>
                        var objDiv = document.getElementById("scr");
                        objDiv.scrollTop = objDiv.scrollHeight;
                    </script>
                    <div class="card-footer">
                        @if(empty($admission_member))
                            <form action="{{ route('reception-chat-st-send', ['u_id' => $student->id, 'id' => $chats->id]) }}" method="post">
                        @elseif(empty($student))
                            <form action="{{ route('reception-chat-ad-send', ['u_id' => $admission_member->id, 'id' => $chats->id]) }}" method="post">
                        @endif
                            @csrf
                            <div class="d-flex justify-content-between">
                                <div class="form-group">
                                    <textarea class="form-control" name="message_text" style="width: 550px" rows="2"></textarea>
                                </div>
                                <div class="form-group align-self-center">
                                    <button type="submit" class="btn btn-outline-iitucolor btn-block">Send message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

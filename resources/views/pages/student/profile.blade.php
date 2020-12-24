@extends('layouts.user_layout')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-4">
                <div class="d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            @if($student->image_url != null)
                                <div class="d-flex justify-content-center">
                                    <div class="crop ">
                                        <img src="{{$student->image_url}}" class="card-img-top">
                                    </div>
                                </div>
                            @else
                                <div class="d-flex justify-content-center">
                                    <div class="crop ">
                                        <img src="{{ asset('img/default_user.jpg') }}" class="card-img-top">
                                    </div>
                                </div>
                            @endif
                            <div class="d-flex flex-column bd-highlight mt-3">
                                <form action="{{ route('student-photo-save', ['id' => $student->user_id]) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="custom-file p-2 bd-highlight">
                                        <input type="file" class="custom-file-input" name="image" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                    <div class="p-2 bd-highlight">
                                        <button type="submit" class="btn btn-iitucolor btn-block">Update photo</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card mb-5">
                    <div class="card-body">
                        <h2><b>{{$student->getName()}}</b></h2>
                        <hr>
                        <div class="d-flex flex-column bd-highlight">
                            <div class="bd-highlight row">
                                <div class="col-3">
                                    <label ><b>E-mail:</b></label>
                                </div>
                                <div class="col">
                                    <label >{{ $student->getEmail() }}</label>
                                </div>
                            </div>
                            @if(!empty($student->getBirthdate()))
                                <div class="bd-highlight row">
                                    <div class="col-3">
                                        <label ><b>Birthdate:</b></label>
                                    </div>
                                    <div class="col">
                                        <label >{{ date_format(date_create($student->getBirthdate()), "M d Y") }}</label>
                                    </div>
                                </div>
                            @endif
                            @if(!empty($student->getPhoneNumber()))
                                <div class="bd-highlight row">
                                    <div class="col-3">
                                        <label ><b>Phone number:</b></label>
                                    </div>
                                    <div class="col">
                                        <label >{{ $student->getPhoneNumber()}}</label>
                                    </div>
                                </div>
                            @endif
                            @if(!empty($student->getEduDegName()))
                                <div class="bd-highlight row">
                                    <div class="col-3">
                                        <label ><b>Education Degree:</b></label>
                                    </div>
                                    <div class="col">
                                        <label>{{ $student->getEduDegName()}}</label>
                                    </div>
                                </div>
                            @endif
                            @if(!empty($student->getEduDegName()))
                                @if($student->getEduDegName() == 'Bachelor')
                                    <div class="bd-highlight row">
                                        <div class="col-3">
                                            <label ><b>School name:</b></label>
                                        </div>
                                        <div class="col">
                                            <label>{{ $student->school_name}}</label>
                                        </div>
                                    </div>
                                @elseif($student->getEduDegName() == 'Master' || $student->getEduDegName() == 'Doctorate')
                                    <div class="bd-highlight row">
                                        <div class="col-3">
                                            <label ><b>University name:</b></label>
                                        </div>
                                        <div class="col">
                                            <label>{{ $student->university_name}}</label>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-body">
                        <h2>Edit profile</h2>
                        <hr>
                        <form action="{{ route('student-profile-save', ['id' => $student->user_id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="d-flex flex-column bd-highlight">
                                <div class="bd-highlight row my-2">
                                    <div class="col-3 align-self-center">
                                        <label>Full name:</label>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" name="name" value="{{ $student->getName() }}">
                                    </div>
                                </div>
                                <div class="bd-highlight row my-2">
                                    <div class="col-3 align-self-center">
                                        <label>Birth date:</label>
                                    </div>
                                    <div class="col">
                                        <input type="date" class="form-control" name="birthdate" value="{{ $student->getBirthdate() }}">
                                    </div>
                                </div>
                                <div class="bd-highlight row my-2">
                                    <div class="col-3 align-self-center">
                                        <label>Phone:</label>

                                    </div>
                                    <div class="col">
                                        <input type="tel" class="form-control" pattern="[8]{1}[(]{1}[0-9]{3}[)]{1}[0-9]{3}-[0-9]{2}-[0-9]{2}" name="phone_number" value="{{ $student->getPhoneNumber() }}">
                                        <small>Format: 8(xxx)xxx-xx-xx</small>
                                    </div>
                                </div>
                                <div class="bd-highlight row my-2">
                                    <div class="col-3 align-self-center">
                                        <button type="submit" class="btn btn-outline-iitucolor btn-block">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-body">
                        <h2>Edit password</h2>
                        <hr>
                        <form action="{{ route('student-password-save', ['id' => $student->user_id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="d-flex flex-column bd-highlight">
                                <div class="bd-highlight row my-2">
                                    <div class="col-3 align-self-center">
                                        <label>Old password:</label>
                                    </div>
                                    <div class="col">
                                        <input type="password" class="form-control" name="old_password">
                                    </div>
                                </div>
                                <div class="bd-highlight row my-2">
                                    <div class="col-3 align-self-center">
                                        <label>New password:</label>
                                    </div>
                                    <div class="col">
                                        <input type="password" class="form-control" name="new_password" >
                                    </div>
                                </div>
                                <div class="bd-highlight row my-2">
                                    <div class="col-3 align-self-center">
                                        <label>Retype new password:</label>
                                    </div>
                                    <div class="col">
                                        <input type="password" class="form-control" name="re_new_password">
                                    </div>
                                </div>
                                <div class="bd-highlight row my-2">
                                    <div class="col-3 align-self-center">
                                        <button type="submit" class="btn btn-outline-iitucolor btn-block">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

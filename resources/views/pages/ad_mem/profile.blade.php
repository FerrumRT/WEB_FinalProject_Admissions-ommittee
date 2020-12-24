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
                                    <img src="{{$admission_member->image_url}}" class="card-img-top">
                                </div>
                            </div>
                        @else
                            <div class="d-flex justify-content-center">
                                <div class="crop ">
                                    <img src="{{ asset('img/default_user.jpg') }}" class="card-img-top">
                                </div>
                            </div>
                        @endif
                        @if(Auth::user()->admission_member_id==$admission_member->id)
                       <div class="d-flex flex-column bd-highlight mt-3">
                           <form action="{{ route('ad-mem-photo-save', ['id' => $admission_member->user_id]) }}" method="post" enctype="multipart/form-data">
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
                        @endif
                    </div>
                </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card mb-5">
                    <div class="card-body">
                        <h2><b>{{$admission_member->getName()}}</b></h2>
                        <hr>
                        <div class="d-flex flex-column bd-highlight">
                            <div class="bd-highlight row">
                                <div class="col-3">
                                    <label ><b>E-mail:</b></label>
                                </div>
                                <div class="col">
                                    <label >{{ $admission_member->getEmail() }}</label>
                                </div>
                            </div>
                            @if(!empty($admission_member->getBirthdate()))
                            <div class="bd-highlight row">
                                <div class="col-3">
                                    <label ><b>Birthdate:</b></label>
                                </div>
                                <div class="col">
                                    <label >{{ date_format(date_create($admission_member->getBirthdate()), "M d Y") }}</label>
                                </div>
                            </div>
                            @endif
                            @if(!empty($admission_member->getPhoneNumber()))
                                <div class="bd-highlight row">
                                    <div class="col-3">
                                        <label ><b>Phone number:</b></label>
                                    </div>
                                    <div class="col">
                                        <label >{{ $admission_member->getPhoneNumber()}}</label>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                @if(Auth::user()->admission_member_id==$admission_member->id)
                <div class="card mt-3">
                    <div class="card-body">
                        <h2>Edit profile</h2>
                        <hr>
                        <form action="{{ route('ad-mem-profile-save', ['id' => $admission_member->user_id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="d-flex flex-column bd-highlight">
                                <div class="bd-highlight row my-2">
                                    <div class="col-3 align-self-center">
                                        <label>Full name:</label>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" name="name" value="{{ $admission_member->getName() }}">
                                    </div>
                                </div>
                                <div class="bd-highlight row my-2">
                                    <div class="col-3 align-self-center">
                                        <label>Birth date:</label>
                                    </div>
                                    <div class="col">
                                        <input type="date" class="form-control" name="birthdate" value="{{ $admission_member->getBirthdate() }}">
                                    </div>
                                </div>
                                <div class="bd-highlight row my-2">
                                    <div class="col-3 align-self-center">
                                        <label>Phone:</label>

                                    </div>
                                    <div class="col">
                                        <input type="tel" class="form-control" pattern="[8]{1}[(]{1}[0-9]{3}[)]{1}[0-9]{3}-[0-9]{2}-[0-9]{2}" name="phone_number" value="{{ $admission_member->getPhoneNumber() }}">
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
                        <form action="{{ route('ad-mem-password-save', ['id' => $admission_member->user_id]) }}" method="post" enctype="multipart/form-data">
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
                @endif
            </div>
        </div>
    </div>
@endsection

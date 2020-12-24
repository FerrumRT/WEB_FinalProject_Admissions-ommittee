@extends('layouts.user_layout')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-4">
                <div class="d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
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
                            <div class="d-flex flex-column mt-3">
                                <form action="{{ route('student-photo-save', ['id' => $student->user_id]) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="custom-file p-2 bd-highlight">
                                        <input type="file" class="custom-file-input" name="image" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                    <div class="mt-3 bd-highlight">
                                        <button type="submit" class="btn btn-iitucolor btn-block">Update photo</button>
                                    </div>
                                </form>
                            </div>
                            <hr>
                            <div class="mb-2 bd-highlight">
                                <a href="{{route('student-profile', ['id' => $student->user_id])}}" class="btn btn-iitucolor btn-block">Back</a>
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
                                @if($student->getEduDegName() == 'Bachelor' && !empty($student->school_name))
                                    <div class="bd-highlight row">
                                        <div class="col-3">
                                            <label ><b>School name:</b></label>
                                        </div>
                                        <div class="col">
                                            <label>{{ $student->school_name}}</label>
                                        </div>
                                    </div>
                                @elseif(($student->getEduDegName() == 'Master' || $student->getEduDegName() == 'Doctorate') && !empty($student->school_name))
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
                        <div class="row">
                            <div class="col-8">
                                <div class="row">
                                    <div class="col">
                                        <h3>Certificates</h3>
                                    </div>
                                    <div class="col">
                                        <form action="{{ route('certificates', ['id' => $student->user_id]) }}" method="get" class="form-inline my-2 my-lg-0 ">
                                            <input class="form-control mr-sm-2 ml-2" type="search" name="certificate" placeholder="Search" size="12" aria-label="Search">
                                            <button class="btn btn-outline-success my-2 my-sm-0"  type="submit"> <i class="fas fa-search"></i> </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 d-flex justify-content-end">
                                <button type="button" class="btn btn-outline-iitucolor ml-3" data-toggle="modal" data-target="#addDocModal">
                                    Add certificate
                                </button>

                                <div class="modal fade" id="addDocModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Certificate</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <form action="{{ route('certificate-upload', ['id' => $student->user_id]) }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group mt-2">
                                                        <input type="text" class="form-control" name="name" placeholder="Name">
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" name="file" id="customFile">
                                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-outline-iitucolor">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if(!empty($certificates))
                            @foreach($certificates as $certificate)
                                <hr>
                                <div class="row my-2">
                                    <div class="col-10">
                                        <h5>{{ $certificate->name }}</h5>
                                    </div>
                                    <div class="col-2 d-flex justify-content-end">
                                        <div class="mr-2">
                                            <a href="{{$certificate->certificate_url}}" class="btn btn-sm btn-outline-iitucolor">
                                                View
                                            </a>
                                        </div>
                                        <div class="ml-2">
                                            <form action="{{ route('certificate-delete', ['id' => $certificate->id]) }}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-outline-iitucolor">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        @else
                            <div class="d-flex justify-content-center">
                                <div class="crop__news__lg">
                                    <img src="{{ asset('img/no_file.png') }}" class="card-img-top">
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

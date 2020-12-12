@extends('layouts.admin_layout')

@section('content')
<div class = "container py-5">
    <div class = "col align-self-center">
        <h3>Edit {{ $student->getName() }}</h3>
        <form action="{{ route('update-students', ['id' => $student->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" name="name" value="{{ $student->getName() }}">
            </div>
            <div class="form-group">
                <input type="email" disabled class="form-control" name="email" value="{{ $student->getEmail() }}">
                <input type="email" hidden class="form-control" name="email" value="{{ $student->getEmail() }}">
            </div>
            <div class="form-group">
                <input type="date" class="form-control" name="birthdate" value="{{ $student->getBirthdate() }}">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="phone_number" value="{{ $student->getPhoneNumber() }}" placeholder="Phone number">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="school_name" value="{{ $student->school_name }}" placeholder="School name">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="university_name" value="{{ $student->university_name }}" placeholder="University name">
            </div>
            <div class="form-group">
                <select class="form-control" name="edu_deg">
                    @foreach($edu_deg as $deg)
                        <option value = "{{ $deg->id }}" @if($deg->id == $student->education_degree_id) selected @endif>{{ $deg->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="image" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
            </div>
            <button type="submit" class="btn btn-outline-success">Save</button>
        </form>
        <form action="{{ route('delete-students', ['id' => $student->id]) }}" method="post">
            @csrf
            <button type="submit" class="btn btn-outline-danger mt-2">Delete</button>
        </form>
    </div>
</div>
@endsection()

@extends('layouts.admin_layout')

@section('content')
<div class = "container py-5">
    <div class = "col align-self-center">
        <h3>Faculty adding</h3>
        <form action="{{ route('update-faculty', ['id' => $faculty->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" name="name" value="{{ $faculty->name }}">
            </div>
            <div class="form-group">
                <textarea class="form-control" name="description">{{ $faculty->description }}</textarea>
            </div>
            <div class="form-group">
                <textarea type="text" class="form-control" name="skills">{{ $faculty->skills }}</textarea>
            </div>
            <div class="form-group">
                <textarea type="text" class="form-control" name="outcomes">{{ $faculty->outcomes }}</textarea>
            </div>
            <div class="form-group">
                <textarea type="text" class="form-control" name="leading_position">{{ $faculty->leading_position }}</textarea>
            </div>
            <div class="form-group">
                <select class="form-control" name="edu_deg">
                    @foreach($edu_deg as $deg)
                        <option value = "{{ $deg->id }}" @if($deg->id == $faculty->education_degree_id) selected @endif>{{ $deg->name }}</option>
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
        <form action="{{ route('delete-ad-mem', ['id' => $faculty->id]) }}" method="post">
            @csrf
            <button type="submit" class="btn btn-outline-danger mt-2">Delete</button>
        </form>
    </div>
</div>
@endsection()

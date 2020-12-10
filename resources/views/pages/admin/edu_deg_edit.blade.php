@extends('layouts.admin_layout')

@section('content')
<div class = "container py-5">
    <div class = "col align-self-center">
        <h3>Faculty adding</h3>
        <form action="{{ route('update-edu-deg', ['id' => $edu_deg->id]) }}" method="post">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" name="name" value="{{ $edu_deg->name }}">
            </div>
            <button type="submit" class="btn btn-outline-success">Save</button>
        </form>
        <form action="{{ route('delete-edu-deg', ['id' => $edu_deg->id]) }}" method="post">
            @csrf
            <button type="submit" class="btn btn-outline-danger mt-2">Delete</button>
        </form>
    </div>
</div>
@endsection()

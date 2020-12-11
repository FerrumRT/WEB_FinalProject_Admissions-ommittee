@extends('layouts.admin_layout')

@section('content')
<div class = "container py-5">
    <div class = "col align-self-center">
        <h3>Faculty adding</h3>
        <form action="{{ route('add-faculty') }}" method="post">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Faculty name">
            </div>
            <div class="form-group">
                <textarea class="form-control" name="description" placeholder="Description"></textarea>
            </div>
            <div class="form-group">
                <textarea type="text" class="form-control" name="skills" placeholder="Skills"></textarea>
            </div>
            <div class="form-group">
                <textarea type="text" class="form-control" name="outcomes" placeholder="Outcomes"></textarea>
            </div>
            <div class="form-group">
                <textarea type="text" class="form-control" name="leading_position" placeholder="Leading Position"></textarea>
            </div>
            <div class="form-group">
                <select class="form-control" name="edu_deg">
                    @foreach($edu_deg as $deg)
                        <option value = "{{ $deg->id }}">{{ $deg->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-outline-success">Add</button>
        </form>

        <h3 class= "pt-5">Admission member list</h3>
        <table class = "table table-striped mt-3">
            <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Faculty name</th>
                <th scope="col">Description</th>
                <th scope="col">Skills</th>
                <th scope="col">Outcomes</th>
                <th scope="col">Leading Position</th>
                <th scope="col">Edu Deg</th>
                <th scope="col">Options</th>
            </tr>
            </thead>
            <tbody>
            @foreach($faculties as $faculty)
                <tr>
                    <th scope="col">{{$faculty->id}}</th>
                    <th scope="col">{{$faculty->name}}</th>
                    <th scope="col">{{$faculty->description}}</th>
                    <th scope="col">{{$faculty->skills}}</th>
                    <th scope="col">{{$faculty->outcomes}}</th>
                    <th scope="col">{{$faculty->leading_position}}</th>
                    <th scope="col">{{$faculty->getEduDegName()}}</th>
                    <th scope="col">
                        <a href="{{ route('edit-faculty', ['id' => $faculty->id]) }}" type="button" class="btn btn-sm btn-outline-dark">Edit</a>
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection()

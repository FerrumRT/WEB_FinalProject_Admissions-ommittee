@extends('layouts.admin_layout')

@section('content')
<div class = "container py-5">
    <div class = "col align-self-center">
        <h3>Student adding</h3>
        <form action="{{ route('add-students') }}" method="post">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Student full name">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password">
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

        <h3 class= "pt-5">Student list</h3>
        <table class = "table table-striped mt-3">
            <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Full name</th>
                <th scope="col">Email</th>
                <th scope="col">Birth date</th>
                <th scope="col">Phone number</th>
                <th scope="col">School name</th>
                <th scope="col">University name</th>
                <th scope="col">Edu deg</th>
                <th scope="col">Options</th>
            </tr>
            </thead>
            <tbody>
            @foreach($students as $student)
                <tr>
                    <th scope="col">{{$student->id}}</th>
                    <th scope="col">{{$student->getName()}}</th>
                    <th scope="col">{{$student->getEmail()}}</th>
                    <th scope="col">{{$student->getBirthdate()}}</th>
                    <th scope="col">{{$student->getPhoneNumber()}}</th>
                    <th scope="col">{{$student->school_name}}</th>
                    <th scope="col">{{$student->university_name}}</th>
                    <th scope="col">{{$student->getEduDegName()}}</th>
                    <th scope="col">
                        <a href="{{ route('edit-students', ['id' => $student->id]) }}" type="button" class="btn btn-sm btn-outline-dark">Edit</a>
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection()

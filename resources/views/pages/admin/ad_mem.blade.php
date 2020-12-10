@extends('layouts.admin_layout')

@section('content')
<div class = "container py-5">
    <div class = "col align-self-center">
        <h3>Faculty adding</h3>
        <form action="{{ route('add-ad-mem') }}" method="post">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Admission member full name">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-outline-success">Add</button>
        </form>

        <h3 class= "pt-5">Admission member list</h3>
        <table class = "table table-striped mt-3">
            <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Full name</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Birth date</th>
                <th scope="col">Phone number</th>
                <th scope="col">Options</th>
            </tr>
            </thead>
            <tbody>
            @foreach($ad_members as $ad_mem)
                <tr>
                    <th scope="col">{{$ad_mem->id}}</th>
                    <th scope="col">{{$ad_mem->getName()}}</th>
                    <th scope="col">{{$ad_mem->getEmail()}}</th>
                    <th scope="col">{{$ad_mem->getPassword()}}</th>
                    <th scope="col">{{$ad_mem->getBirthdate()}}</th>
                    <th scope="col">{{$ad_mem->getPhoneNumber()}}</th>
                    <th scope="col">
                        <a href="{{ route('edit-ad-mem', ['id' => $ad_mem->id]) }}" type="button" class="btn btn-sm btn-outline-dark">Edit</a>
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection()

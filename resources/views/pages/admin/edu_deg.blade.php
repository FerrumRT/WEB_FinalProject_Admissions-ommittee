@extends('layouts.admin_layout')

@section('content')
<div class = "container py-5">
    <div class = "col align-self-center">
        <h3>Education degree adding</h3>
        <form action="{{ route('add-edu-deg') }}" method="post">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Faculty name">
            </div>
            <div class="form-group">
                <textarea class="form-control" name="description" placeholder="Description"></textarea>
            </div>
            <button type="submit" class="btn btn-outline-success">Add</button>
        </form>

        <h3 class= "pt-5">Education Degree list</h3>
        <table class = "table table-striped mt-3">
            <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Education Degree name</th>
                <th scope="col">Education Degree description</th>
                <th scope="col">Options</th>
            </tr>
            </thead>
            <tbody>
            @foreach($edu_deg as $ed)
                <tr>
                    <th scope="col">{{$ed->id}}</th>
                    <th scope="col">{{$ed->name}}</th>
                    @php $pos=strpos($ed->description, ' ', 150) @endphp
                    <th scope="col">{{substr($ed->description, 0, $pos)}}</th>
                    <th scope="col">
                        <a href="{{ route('edit-edu-deg', ['id' => $ed->id]) }}" type="button" class="btn btn-sm btn-outline-dark">Edit</a>
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection()

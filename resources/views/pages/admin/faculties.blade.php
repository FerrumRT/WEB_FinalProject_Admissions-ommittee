@extends('layouts.admin_layout')

@section('content')
<div class = "container py-5">
    <div class = "col align-self-center">
        <h3>Faculty adding</h3>
        <form action="/add_faculty" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Faculty name">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="code" placeholder="Faculty code">
            </div>
            <div class="form-group">
                <textarea class="form-control" name="description" placeholder="Description"></textarea>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="skills" placeholder="Skills">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="outcomes" placeholder="Outcomes">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="leading_position" placeholder="Leading Position">
            </div>
            <div class="form-group">
                <select class="form-control" name="edu_deg">
                    <option value = "1">1</option>
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
                <th scope="col">Faculty code</th>
                <th scope="col">Description</th>
                <th scope="col">Skills</th>
                <th scope="col">Outcomes</th>
                <th scope="col">Leading Position</th>
                <th scope="col">Options</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>
@endsection()

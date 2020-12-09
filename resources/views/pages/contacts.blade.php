@extends('layouts.user_layout')

@section('content')
<div class="container m-auto pb-4">
    <div class="pt-3">
        <h2>Our Contacts</h2>
    </div>
    <hr>
    <table class="table table-striped table-bordered">
        <tbody>
        <tr>
            <td>Callcenter</td>
            <td>+7(727) 320 00 00</td>
        </tr>
        <tr>
            <td>UNICEF</td>
            <td>+7 727) 244 51 04</td>
        </tr>
        <tr>
            <td>Admissions</td>
            <td>+7(727) 330 85 60</td>
        </tr>
        <tr>
            <td>Innovation center:</td>
            <td>+7(727) 244 51 03</td>
        </tr>
        <tr>
            <td>Dean's office</td>
            <td>+7(727) 320 00 00</td>
        </tr>
        </tbody>
    </table>
</div>

<div class="container py-3">
    <div class="pt-3">
        <h2>Ask question and we answer</h2>
    </div>
    <form>
        <div class="form-group">
            <label>Your e-mail</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label>Question: </label>
            <textarea name="name" rows="8" cols="80" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection

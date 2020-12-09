@extends('layouts.user_layout')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <h2>BACHELOR'S PROGRAM</h2>
        </div>
        <p>
            <b>Acceptance of applications online for the June UNT</b> <br>
            <b>From April 20 to May 10, 2020</b> <br>
            - For graduates of 2020 <br>
            - Graduates of past years, college graduates and persons of Kazakh nationality who are not citizens of the Republic of Kazakhstan <br>
            - Persons graduated from educational institutions abroad <br>
            Link to the UNT registration site: Link <br>
        </p>
        <hr>
        <p>
            Admission committee contact number: <br>
            <a href="tel:+7 (727) 320 00 00" style="color: darkred;">+7 (727) 320 00 00</a> <br>
            <a href="tel:+7 (727) 320 00 01" style="color: darkred;">+7 (727) 320 00 01</a> <br>
            <a href="tel:+7 (727) 247 83 74" style="color: darkred;">+7 (727) 247 83 74</a> <br>
            <a href="tel:+7 (727) 247 83 75" style="color: darkred;">+7 (727) 247 83 75</a> <br>
            <a href="tel:+7 (708) 365 26 16" style="color: darkred;">+7 (708) 365 26 16</a> <br>
            Executive secretary of the admission committee: <br>
            <a href="tel:+7 (701) 218 68 37" style="color: darkred;">+7 (701) 218 68 37</a> <br>
        </p>
        <hr>
        <p>
            <b>International IT University</b> is forming a new generation of specialists with knowledge of not only industry technologies, but also advanced management, economics, communication skills with in-depth knowledge of English. <br>
            <b>Graduates</b> of IT University are in demand by Kazakhstani national companies, government agencies, national business and industry of the Central Asian region and the world as a whole
        </p>
        <hr>
        <p>
            <b>Students</b> of the International IT University implement their own projects and win funding for their implementation. Our students receive not only high-quality education, but also work in a special atmosphere of creativity, initiative, continuous search for innovations and new technologies.
        </p>
        @if(!is_null($faculties))
        <div class="row justify-content-center">
            <h2>Educational Programs</h2>
        </div>
        <div class="row justify-content-center">
            <div class="flex-container mt-4">
                @foreach($faculties as $faculty)
                    <span class="wow pulse" style="animation-delay: 0.1s; visibility: visible; animation-name: pulse;">
                    <div class="grad-box">
                        <a class="" href="faculties/{{$faculty->id}}">
                            <img class="grad-box-img" src="{{$faculty->image_url}}">
                            <span>{{$faculty->name}}</span>
                        </a>
                    </div>
                </span>
                @endforeach
            </div>
        </div>
        @endif
    </div>

@endsection

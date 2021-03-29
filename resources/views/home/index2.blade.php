@extends('layouts.home')

@section('content')

<div class="container-fluid">
        <div class="row">
            <div class="col-md-2 col-sm-4 sidebar1">
                <div class="logo">
                    <!-- <img src="{{asset('img/logot.png')}}" height="70px" class="img-responsive center-block" alt="Logo"> -->
                </div>
                <br>
                <div class="left-navigation">
                    <ul class="list">
                        <h5><strong>WHEREABOUTS</strong></h5>
                        <li>Home</li>
                        <li>Office</li>
                        <li>School</li>
                        <li>Gym</li>
                        <li>Art Class</li>
                        <li>Hike Club</li>
                    </ul>

                    <br>

                    <ul class="list">
                        <h5><strong>HOBBIES</strong></h5>
                        <li>Hiking</li>
                        <li>Rafting</li>
                        <li>Badminton</li>
                        <li>Tennis</li>
                        <li>Sketching</li>
                        <li>Horse Riding</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-10 col-sm-8 main-content">
            <!--Main content code to be written here --> 
            <h1>FEEDBACK APPRECIATED! :)</h1>
            <h3>P.S.: For side navbar with dropdown menu, you may refer this snippet: http://bootsnipp.com/user/snippets/kWPoW</h3>
        </div>
    </div>

@endsection
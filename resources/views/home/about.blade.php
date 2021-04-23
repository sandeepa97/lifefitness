@extends('layouts.appgeneral')

@section('content')

<div class = "nav-bar">
<ul>

      <li><a class = "active-logo"  href="{{ url('/') }}">LIFE FITNESS GYM</a></li>
      <li><a  href="{{ url('/') }}">HOME</a></li>
	  <li><a class="active" href="{{ url('about') }}">ABOUT US</a></li>
	  <li><a href="{{ url('blog') }}">FITNESS BLOG</a></li>
	  <li><a href="{{ url('store') }}">ONLINE STORE</a></li>
	  <li><a href="{{ url('coaching') }}">ONLINE COACHING</a></li>
	  <li><a href="{{ url('contact') }}">CONTACT US</a></li>
</ul>
</div>
<!-- <div class="container">
	<h1>ABOUT US</h1>
	<img src="img/img1.jpg" width="800px">

</div> -->

<div class="container my-5">
   <div class="row">
     <div class="col-md-6 p-4 p-sm-5 order-2 order-sm-1">
       <small class="text-uppercase" style="color: #E91C23;">LIFE FITNESS GYMS</small>
       <h1 class="h2 mb-4" style="font-weight: 600;">What <span style="color: #E91C23;">We</span> Do</h1>
       <p class="text-secondary" style="line-height: 2;">
       We mainly provide services such as fitness training, martial arts, dancing, importing supplements and selling goods. Apart from that we helps our customers in other ways such as cardio training, weight loss programs, muscle building, strength training, diet plans/ nutrition and endurance training.
	 </p>
       <a href="#" style="background-color: #E91C23; width: 240px;" class="btn px-4 py-3 mt-4 text-white d-flex align-items-center justify-content-between">
       <i class="fas fa-dumbbell"></i>
        <span><b>Our Services</b> <br>
          Cardio Training <br>
          Weight Loss <br>
          Muscle Building <br>
          Strength Training <br>
          Diet & Nutrition
        </span>
		  <i class="fas fa-dumbbell"></i>
      </a>
     </div>
     <div class="col-md-6 p-0 text-center order-1 order-sm-2">
        <img src="img/img1.jpg" class="w-100" alt="">
     </div>

    <div class="col-md-6 p-0 text-center">
       <img src="img/img3.jpg" class="w-100" alt="">
    </div>
    <div class="col-md-6 p-4 p-sm-5">
      <small class="text-uppercase" style="color: #E91C23;">LIFE FITNESS GYMS</small>
      <h1 class="h2 mb-4" style="font-weight: 600;">Who <span style="color: #E91C23;">We</span> Are</h1>
      <p class="text-secondary" style="line-height: 2;">
      New Life Fitness Gyms (Pvt) Ltd is a fitness company founded in 2010 and we are located in Kurunegala and We are one of the leading fitness companies in the city. We usually open from 5am to 10pm on weekdays and 6am – 8pm on weekends.
  	  </p>
      <a href="#" style="background-color: #E91C23; width: 240px;" class="btn px-4 py-3 mt-4 text-white d-flex align-items-center justify-content-between">
      <i class="fas fa-dumbbell"></i>
        <span><b>Our Mission</b> <br>
        Help People to achieve life long benefits in body, mind and spirit.</span>
		  <i class="fas fa-dumbbell"></i>
      </a>
    </div>
   </div>
 </div>


@endsection
@extends('layouts.appgeneral')

@section('content')

<div class = "nav-bar">
<ul>
	  <li><a class = "active-logo"  href="{{ url('/') }}">LIFE FITNESS GYM</a></li>
      <li><a href="{{ url('/') }}">HOME</a></li>
	  <li><a href="{{ url('about') }}">ABOUT US</a></li>
	  <li><a href="{{ url('blog') }}">FITNESS BLOG</a></li>
	  <li><a href="{{ url('store') }}">ONLINE STORE</a></li>
	  <li><a href="{{ url('coaching') }}">ONLINE COACHING</a></li>
	  <li><a class="active" href="{{ url('contact') }}">CONTACT US</a></li>
</ul>
</div>
<!-- <div class="container">
	<h1>CONTACT US</h1>
	<img src="img/img5.jpg" width="600px">
</div> -->

<div class="container mb-4">
<h1 class="text-center">CONTACT US</h1>
<hr>
  <div class="row">
    <div class="col-sm-8">
      <img src="img/img5.jpg" width="70%" height="320" >
    </div>

    <div class="col-sm-4" id="contact2">
        <h3>Life Fitness Gyms</h3>
        <hr align="left" width="50%">
        <h4 class="pt-2">Location</h4>
        <i class="fas fa-globe" style="color:#000"></i> No. 100, 3rd Floor, Colombo Rd, Kurunegala<br>
        <h4 class="pt-2">Telephone</h4>
        <i class="fas fa-phone" style="color:#000"></i> <a href="tel:+94377254789"> +94 377 254789 </a><br>
        <i class="fab fa-whatsapp" style="color:#000"></i><a href="tel:+94777658745"> +94 777 658745 </a><br>
        <h4 class="pt-2">Email</h4>
        <i class="fa fa-envelope" style="color:#000"></i> <a href="mailto:lifefitness@gmail.com">lifefitness@gmail.com</a><br>
      </div>
  </div>
</div>

<div class="container">
	<div class="row-fluid">
        <div class="span8">
        	<iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.837994805999!2d80.35969181426964!3d7.4831345133403735!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae33b1b52d8df61%3A0x3cd49bb4923e4a6e!2sNew%20Life%20Fitness%20Gyms!5e0!3m2!1sen!2slk!4v1618502539290!5m2!1sen!2slk"></iframe>
    	</div>
    </div>
</div>

@endsection
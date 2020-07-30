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
<div class="container">
	<h1>CONTACT US</h1>
	<img src="img/img5.jpg" width="600px">
</div>

@endsection
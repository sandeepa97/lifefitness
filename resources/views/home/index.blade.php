@extends('layouts.app')

@section('content')

<div class = "row">

	<div >
	<img src="img/logot.png"  class = "logo">

	<div class = "nav-bar">

	<ul>
	  <li><a class="active" href="{{ url('/') }}">HOME</a></li>
	  <li><a href="{{ url('about') }}">ABOUT US</a></li>
	  <li><a href="{{ url('blog') }}">FITNESS BLOG</a></li>
	  <li><a href="{{ url('store') }}">ONLINE STORE</a></li>
	  <li><a href="{{ url('coaching') }}">ONLINE COACHING</a></li>
	  <li><a href="{{ url('contact') }}">CONTACT US</a></li>
	</ul>

	<div class = "social-icons">
		<a href="https://www.instagram.com/sandeepa_97" target="_blank"><img src="img/twitter.png" width="30px" class="social-icon"></a>
		<a href="https://www.instagram.com/sandeepa_97" target="_blank"><img src="img/instagram.png" width="30px" class="social-icon"></a>
		<a href="https://www.instagram.com/sandeepa_97" target="_blank"><img src="img/facebook.png" width="30px" class="social-icon"></a>
	</div>

	<div class = "credit">
		<p>All Rights Reserved | Developed by <br> Sandeepa Lokubaranige</p>
	</div>

	</div>
	</div>


	<div >

		<div class = "status-form">
			<div class = "status-items">
				<div class = "gym-status">
					<p>GYM OPEN</p>
				</div>
				<div class = "trainer-status">
					<p>TRAINER SANDEEPA</p>
				</div>
			</div>
		</div>		

		<div class = "login-form">
				<div class="card">
					<div class="card-body">
						<form action="{{url('post-login')}}" method="POST">

						{{ csrf_field() }}

							<div class="input-group form-group">
								<input type="text" class="form-control" placeholder="email" name="email">	
	  
							</div>
							<div class="input-group form-group">
								<input type="password" class="form-control" placeholder="password" name="password">
		
							</div>
							<div class="form-group">
                                <button type="submit" class="btn float-left login_btn" >Login</button>
                           
                                <!-- <input type="submit" value="Login" class="btn float-left login_btn"> -->
                            
							</div>
							<a href="#" class = "link">Forgot password?</a>
						</form>
					</div>
				</div>
		</div>		

		<div class = "date-time-form">
			<p id = "dateTime"></p>
		</div>

	<img class= "bg-img" src="img/bg.jpg">
	</div>

</div>

<script type="text/javascript">

		var today = new Date();
		var date = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear();
		var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();

		var dateTime = date+' '+time;

		document.getElementById("dateTime").innerHTML = dateTime;


</script>

@endsection
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
			<div class = "status-items" id="status-items">
				<!-- dynamic gym status -->
			</div>
		</div>		

		<div class = "login-form">
				<div class="card">
					<div class="card-body">
						<form action="{{url('post-login')}}" method="POST">

						{{ csrf_field() }}

							<div class="input-group form-group">
								<input type="text" class="form-control" placeholder="email" name="email" required="required">	
	  
							</div>
							<div class="input-group form-group">
								<input type="password" class="form-control" placeholder="password" name="password" required="required">
		
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

@section('custom-js')


<script>
var baseUrl = '{{url('/')}}';

$.ajax({
  type: 'GET',
  url: baseUrl+'/admin/get-all-gym-status',
  success: function(res){
    var status = res.data;
    for (var x = 0; x<20; x++)
    {
      var html = '<div class = "gym-status">';
	  html += '<p>'+status[x].current_status+'</p>';
	  html += '<div>';
	  html += '<div class = "trainer-status">';
	  html += '<p>'+status[x].current_trainer+'</p>';
	  html += '<div>';
	  html += '<div>';

      $('#status-items').append(html);
    }
  }
});

</script>

@endsection
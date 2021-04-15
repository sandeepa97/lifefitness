@extends('layouts.appgeneral')

@section('content')

<div class = "nav-bar">
<ul>
	  <li><a class = "active-logo"  href="{{ url('/') }}">LIFE FITNESS GYM</a></li>
      <li><a  href="{{ url('/') }}">HOME</a></li>
	  <li><a href="{{ url('about') }}">ABOUT US</a></li>
	  <li><a class="active" href="{{ url('blog') }}">FITNESS BLOG</a></li>
	  <li><a href="{{ url('store') }}">ONLINE STORE</a></li>
	  <li><a href="{{ url('coaching') }}">ONLINE COACHING</a></li>
	  <li><a href="{{ url('contact') }}">CONTACT US</a></li>
</ul>
</div>
<div class="container">
	<h1>FITNESS BLOG</h1>
	<!-- <img src="img/img2.jpg" width="800px"> -->

	<div class="container">
<div id="blog_posts">

<div class="col-md-12">

	<!-- dynamic blog content -->

</div>
</div>

</div>

@endsection

@section('custom-js')


<script>
var baseUrl = '{{url('/')}}';

$.ajax({
  type: 'GET',
  url: baseUrl+'/admin/get-all-fitness-blog',
  success: function(res){
    var blog = res.data;
    for (var x = 0; x<20; x++)
    {
      var html = '<div class="col-md-12">';
	  html += '<h2>'+blog[x].blog_subject+'</h2>';
	  html += '<p>'+blog[x].blog_content+'</p>';
	  html += '<div>';
	  html += '<span class="badge">Posted '+blog[x].updated_at+'</span>';
	  html += '<div class="pull-right"><span class="badge badge-success">'+blog[x].blog_type.blog_type+'</span></div>   ';
	  html += '</div>';
	  html += '<hr>';
	  html += '</div>';


      $('#blog_posts').append(html);
    }
  }
});

</script>

@endsection
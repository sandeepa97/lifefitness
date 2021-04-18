@extends('layouts.appgeneral')

@section('content')

<div class = "nav-bar">
<ul>
	  <li><a class = "active-logo"  href="{{ url('/') }}">LIFE FITNESS GYM</a></li>
      <li><a href="{{ url('/') }}">HOME</a></li>
	  <li><a href="{{ url('about') }}">ABOUT US</a></li>
	  <li><a href="{{ url('blog') }}">FITNESS BLOG</a></li>
	  <li><a class="active" href="{{ url('store') }}">ONLINE STORE</a></li>
	  <li><a href="{{ url('coaching') }}">ONLINE COACHING</a></li>
	  <li><a href="{{ url('contact') }}">CONTACT US</a></li>
</ul>
</div>
<div class="container">
	<h1>ONLINE STORE</h1>

<div class="row" id="item_card">

    <!-- dynamic card contents -->

</div>

</div>

@endsection

@section('custom-js')


<script>
var baseUrl = '{{url('/')}}';

$.ajax({
  type: 'GET',
  url: baseUrl+'/admin/get-all-online-store',
  success: function(res){
    var store = res.data;
    for (var x = 0; x<20; x++)
    {
      // var html = '<div class="card" style="width: 18rem;">';
      var html = '<div class="col-md-6 col-lg-4 col-12">';
      html += '<div class="card" style="width: 18rem;">';
      html += '<img class="card-img-top" src="'+store[x].img_url+'" alt="Card image cap">';
      html += '<div id="module" class="card-body">';
      html += '<h5 class="card-title">'+store[x].item_name+'</h5>';
      html += '<p class="card-text collapse" id="collapseExample" aria-expanded="false">'+store[x].item_description+'</p>';
      html += '<a role="button" class="collapsed" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample"></a>';
      html += '</div>';
      html += '<ul class="list-group list-group-flush">';
      html += '<li class="list-group-item">Manufacturer: '+store[x].manufacturer+'</li>';
      html += '<li class="list-group-item">'+store[x].price+' LKR</li>';
      html += '</ul>';
      html += '<div class="card-body mt-0">';
      html += '<a href="#" class="card-link"><span class="badge badge-warning">'+store[x].item_category.category_name+'</span></a>';
      html += '<a href="#" class="card-link"><span class="badge badge-primary">Buy</span></a>';
      html += '</div>';
      html += '</div>';
      html += '</div>';

      $('#item_card').append(html);
    }
  }
});

</script>

@endsection

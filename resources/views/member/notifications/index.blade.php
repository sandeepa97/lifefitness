@extends('member.layout.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Notifications & Notices</h3>
        </div>
    </div>
    <div class="row">
    </div>

    <div class="container card">
          <div id="notice_posts">

          <div class="col-md-12">

            <!-- dynamic notice content -->

          </div>
          </div>

          </div>

</div>


@endsection

@section('custom-js')


<script>
var baseUrl = '{{url('/')}}';

$.ajax({
  type: 'GET',
  url: baseUrl+'/admin/get-all-notices',
  success: function(res){
    var notice = res.data;
    for (var x = 0; x<20; x++)
    {
      var html = '<div class="col-md-12">';
	  html += '<h2>'+notice[x].notice_subject+'</h2>';
	  html += '<p>'+notice[x].notice_content+'</p>';
	  html += '<div>';
    html += '<div class="pull-right"><span class="badge badge-success">'+notice[x].notice_type.notice_type+'</span></div>   ';
	  html += '<span class="badge">Posted '+notice[x].updated_at+'</span>';
	  html += '</div>';
	  html += '<hr>';
	  html += '</div>';


      $('#notice_posts').append(html);
    }
  }
});

</script>

@endsection
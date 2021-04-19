@extends('member.layout.master')
@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

          <div class="container card">
          <div id="notice_posts">

          <div class="col-md-12">

            <!-- dynamic notice content -->

          </div>
          </div>

          </div>



        </div> 
        <!-- /.container-fluid -->


      <!-- End of Main Content -->
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
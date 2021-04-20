@extends('admin.layout.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Member Feedbacks & Reviews</h3>
        </div>
    </div>

    <div class="container card mt-4">
          <hr>
          <div id="feedback_posts">
          

            <!-- dynamic feedback content -->


          </div>

          </div>

</div>


@endsection

@section('custom-js')


<script>
var baseUrl = '{{url('/')}}';

$.ajax({
  type: 'GET',
  url: baseUrl+'/member/get-all-feedbacks',
  success: function(res){
    var feedback = res.data;
    for (var x = 0; x<20; x++)
    {
      var html = '<div class="col-md-12">';
	  html += '<h5>'+feedback[x].feedback_subject+'</h5>';
	  html += '<p>'+feedback[x].feedback_content+'</p>';
	  html += '<div>';
	  html += '<span class="badge" id="fb_id" data-id="'+feedback[x].id+'">'+feedback[x].id+'</span>';
	  html += '<span class="badge">Feedback by '+feedback[x].member.fname+' '+feedback[x].member.lname+'</span>';
	  html += '<div class =  "text-right">';
	  html += '<span class="badge">Posted on '+feedback[x].feedback_date+' at '+feedback[x].feedback_time+'</span>';
	  html += '<a href="" class="ml-4 remove_feedback btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
	  html += '</div>';
	  html += '</div>';
	  html += '<hr>';
	  html += '</div>';


      $('#feedback_posts').append(html);
    }
  }
});

    // Delete Feedback Record
    $('#feedback_posts').on('click', 'a.remove_feedback', function (e) {
        e.preventDefault();

        var feedback_id = $("#fb_id").attr("data-id");
        // alert(feedback_id);

        $.confirm({
            text: "Are you sure?",
            confirm: function() {
              $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                  type: 'DELETE',
                  url: baseUrl+'/member/feedbacks/'+feedback_id,
                  success: function(res){
                      alert(res.msg);
                      setTimeout(function(){
                        location.reload();
                      },1000)
                  }
              })
            },
            cancel: function() {
                // nothing to do.

            }
        });

    });

</script>

@endsection
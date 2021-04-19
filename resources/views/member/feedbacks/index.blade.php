@extends('member.layout.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Feedbacks & Reviews</h3>
        </div>
    </div>
<div class="container">
<div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Submit Feedback</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form data-parsley-validate="" id="frmcreatenotice">
                <div class="modal-body">
                    {{csrf_field()}}
                    <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="notice_subject">Subject</label>
                                    <input type="text" name="notice_subject" id="notice_subject" class="form-control" placeholder="Subject"/>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="notice_content">Content</label>
                                    <textarea name="notice_content" id="notice_content" cols="30" rows="6" class="form-control"></textarea>
                                    <!-- <input type="text" name="notice_content" id="notice_content"  class="form-control"> -->
                                </div>
                            </div>
                        </div>
                                <input type="hidden" class="form-control" id="notice_date" name="notice_date" placeholder="Publish Date" 
                                step = "any" value="<?php echo date('Y-m-d'); ?>">

                                <input type="hidden" class="form-control" id="notice_time" name="notice_time" placeholder="Publish Time"
                                step = "any" value="<?php echo date('h:i:s'); ?>">

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
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
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
            <form data-parsley-validate="" id="frmcreatefeedback">
                <div class="modal-body">
                    {{csrf_field()}}
                    <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="feedback_subject">Subject</label>
                                    <input type="text" name="feedback_subject" id="feedback_subject" class="form-control" placeholder="Subject"/>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="feedback_content">Content</label>
                                    <textarea name="feedback_content" id="feedback_content" cols="30" rows="6" class="form-control"></textarea>
                                    <!-- <input type="text" name="feedback_content" id="feedback_content"  class="form-control"> -->
                                </div>
                            </div>
                        </div>
                                <input type="hidden" class="form-control" id="feedback_date" name="feedback_date" placeholder="Publish Date" 
                                step = "any" value="<?php echo date('Y-m-d'); ?>">

                                <input type="hidden" class="form-control" id="feedback_time" name="feedback_time" placeholder="Publish Time"
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

    $('#frmcreatefeedback').submit(function(e){
        e.preventDefault();
        $.ajax({
            url: "{{ url('/member/feedbacks')}}",
            type: 'POST',
            data: $('#frmcreatefeedback').serialize(),
            success: function(response){
                console.log(response.msg);
                alert(response.msg);
                location.reload();
            }
        });
    });

</script>

@endsection
@extends('admin.layout.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Notices</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 text-right mb-1">
            <button type="button" class="btn btn-primary" id="btnaddnotice">Post Notice</button>
        </div>
    </div>
    <div class="row card mt-1">
        <div class="container">
            <div class="col-md-12 ">
                <table id="noticetable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Subject</th>
                            <th>Content</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Notice Type</th>
                            <th>Recipients</th>
                            <th>Action</th>
                        </tr>

                    </thead>

                </table>
            </div>
        </div>
    </div>

</div>


@include('admin.notices.components.notice-add-modal')

@include('admin.notices.components.notice-edit-modal')

@endsection

@section('custom-js')
<script type="text/javascript">

    $(document).ready(function(){

        //get all notice types
        $.ajax({
            type: 'GET',
            url: baseUrl+'/admin/get-all-notice-types',
            success: function(res){
                var noticeType = res.data;
                var html = '';
                html += '<option value="0">Select Notice Type</option>';
                for (var x=0; x<noticeType.length; x++){
                    html+='<option value="'+noticeType[x].id+'">'+noticeType[x].notice_type+'</option>';
                }
                $('#notice_type_id').html(html);
            }
        });

        //get all recipients
        $.ajax({
            type: 'GET',
            url: baseUrl+'/admin/get-all-notice-recipients',
            success: function(res){
                var noticeRecipient = res.data;
                var html = '';
                html += '<option value="0">Select Notice Recipient</option>';
                for (var x=0; x<noticeRecipient.length; x++){
                    html+='<option value="'+noticeRecipient[x].id+'">'+noticeRecipient[x].recipient+'</option>';
                }
                $('#recipients_id').html(html);
            }
        });

        //load data to table

        $('#noticetable').DataTable({
            "pageLength": 15,

        ajax: baseUrl+'/admin/get-all-notices',
        columns: 
                [
                    { data: 'id' },
                    { data: 'notice_subject' },
                    { data: 'notice_content' },
                    { data: 'notice_date' },
                    { data: 'notice_time' },
                    { data: 'notice_type.notice_type' },
                    { data: 'notice_recipient.recipient' },
                    {   
                        data: null,
                        className: "center",
                        defaultContent: '<a href="" class="edit_notice btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>' +
                                '<a href="" class="remove_notice btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>'
                    }
                ]
        });

    });

    //add notice
        $('#btnaddnotice').click(function(){
            $('#noticeaddmodal').modal('toggle');
        });

        $('#frmcreatenotice').submit(function(e){
            e.preventDefault();
            $.ajax({
                url: "{{url('admin/notices')}}",
                type: 'POST',
                data: $('#frmcreatenotice').serialize(),
                success: function(response){
                    alert(response.msg);
                    location.reload();
                }
            });
        });


     // Edit Notice record
     $('#noticetable').on('click', 'a.edit_notice', function (e) {
        e.preventDefault();
        var data = $('#noticetable').DataTable().row($(this).parents('tr')).data();
        var noticeTypeId = data.notice_type_id;
        var recipientId = data.recipients_id;

        // Get All Notices Types
        $.ajax({
            type: 'GET',
            url: baseUrl+'/admin/get-all-notice-types',
            success: function(res){
                var noticeType = res.data;
                // #notice_type
                var html ='';
                html+='<option value="0">Select Notice Type</option>';
                for(var x=0; x<noticeType.length; x++){
                    if(noticeTypeId==noticeType[x].id){
                    html+='<option selected value="'+noticeType[x].id+'">'+noticeType[x].notice_type+'</option>';
                    }
                    else{
                    html+='<option value="'+noticeType[x].id+'">'+noticeType[x].notice_type+'</option>';
                    }
                }
               $('#editnotice_type_id').html(html);
            }

        });
        // Get All Recipients
        $.ajax({
            type: 'GET',
            url: baseUrl+'/admin/get-all-notice-recipients',
            success: function(res){
                var recipient = res.data;
                // #recipients
                var html ='';
                html+='<option value="0">Select Notice Recipient</option>';
                for(var x=0; x<recipient.length; x++){
                    if(recipientId==recipient[x].id){
                    html+='<option selected value="'+recipient[x].id+'">'+recipient[x].recipient+'</option>';
                    }
                    else{
                    html+='<option value="'+recipient[x].id+'">'+recipient[x].recipient+'</option>';
                    }
                }
               $('#editrecipients_id').html(html);
            }

        });

        $('#hdnnotice_id').val(data.id);
        $('#editnotice_subject').val(data.notice_subject);
        $('#editnotice_content').val(data.notice_content);
        $('#editnotice_date').val(data.notice_date);
        $('#editnotice_time').val(data.notice_time);
        $('#noticeeditmodal').modal('toggle');

        });

        //Edit Notice
        $('#editfrmnotice').submit(function(e){
            e.preventDefault();
                var noticeId = $('#hdnnotice_id').val();

            $.ajax({
                type: 'PUT',
                url: baseUrl+'/admin/notices/'+noticeId,
                data: $('#editfrmnotice').serialize(),
                success: function(response){
                    if(response.success==true){
                        alert(response.msg);
                        setTimeout(function(){
                            location.reload();
                        },1000);
                    }else{
                        alert(response.msg);
                    }
                }

            })
        });

    // Delete Notice Record
    $('#noticetable').on('click', 'a.remove_notice', function (e) {
        e.preventDefault();

        var data = $('#noticetable').DataTable().row($(this).parents('tr')).data();
        var noticeId = data.id;

        $.confirm({
            text: "Are you sure?",
            confirm: function() {
              $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                  type: 'DELETE',
                  url: baseUrl+'/admin/notices/'+noticeId,
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
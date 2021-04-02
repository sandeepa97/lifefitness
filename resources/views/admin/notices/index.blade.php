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
                url: "{{ url('/admin/notices')}}",
                type: 'POST',
                data: $('#frmcreatenotice').serialize(),
                success: function(response){
                    alert(response.msg);
                    location.reload();
                }
            });
        });



</script>

@endsection
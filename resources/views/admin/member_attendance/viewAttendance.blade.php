@extends('admin.layout.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Member Attendance</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 text-right">
            <button type="button" class="btn btn-primary" id="btnaddattendance">Add Attendance</button>
        </div>
    </div>
    <div class="row card mt-1">
        <div class="container">
            <div class="col-md-12 ">
                <table id="attendancetable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Member ID</th>
                            <th>Date In</th>
                            <th>Time In</th>
                            <th>Action</th>
                        </tr>

                    </thead>

                </table>
            </div>
        </div>
    </div>

</div>

@include('admin.member_attendance.components.attendance-add-modal')

@include('admin.member_attendance.components.attendance-edit-modal')

@endsection

@section('custom-js')
<script type="text/javascript">

    $(document).ready(function(){

        //get all members
        $.ajax({
            type: 'GET',
            url: baseUrl+'/admin/get-all-members',
            success: function(res){
                var memberData = res.data;
                var html = '';
                html += '<option value="0">Member ID</option>';
                for(var x=0; x<memberData.length; x++){
                    html+='<option value="'+memberData[x].id+'">'+ memberData[x].id+'</option>';
                }
                $('#member_id').html(html);
            }
        });

        //load data to Table
        $('#attendancetable').DataTable({
            ajax: baseUrl+'/admin/get-all-attendance',
            columns:
                [
                    { data: 'id' },
                    { data: 'member_id' },
                    { data: 'member_in_date' },
                    { data: 'member_in_time' },
                    { 
                        data: null,
                        className: "center",
                        defaultContent: '<a href="" class="editor_editattendance btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>' + 
                        '<a href="" class="remove_payment btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>'
                    }
                ]
        });

    });

        //mark attendance
        $('#btnaddattendance').click(function(){
            $('#attendanceaddmodal').modal('toggle');
        });

        $('#frmcreateattendance').submit(function(e){
            e.preventDefault();
            $.ajax({
                url: "{{url('admin/member-attendance')}}",
                type: 'POST',
                data: $('#frmcreateattendance').serialize(),
                success: function(response){
                    alert(response.msg);
                    location.reload();
                }
            });
        });




</script>

@endsection
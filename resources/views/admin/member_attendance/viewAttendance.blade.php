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
            <!-- <button type="button" class="btn btn-primary" id="btnaddattendance">Add Attendance</button> -->
        </div>
    </div>
    <div class="row card mt-1">
        <div class="container">
            <div class="col-md-12 ">
                <table id="attendancetable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Member ID</th>
                            <th>Name</th>
                            <th>Date In</th>
                            <th>Time In</th>
                            <!-- <th>Action</th> -->
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
                    html+='<option value="'+memberData[x].id+'">'+memberData[x].id+' '+memberData[x].fname+' '+memberData[x].lname+'</option>';
                }
                $('#member_id').html(html);
                $('#member_id').select2();
            }
        });

        //load data to Table
        $('#attendancetable').DataTable({
            // "paging": false,
            "bInfo" : false,
            "pageLength": 15,
            order: [[0, 'desc']],
            ajax: baseUrl+'/admin/get-all-attendance',
            columns:
                [
                    {
                        "render": function ( data, type, full, meta ) {
                        return  meta.row + 1;
                        }
                    },
                    { data: 'member_id' },
                    { 
                        "data": null, 
                        render: function (data, type, row) {
                        var name = row.member.fname + " " + row.member.lname;
                        return name;
                         }
                    },
                    { data: 'member_in_date' },
                    { data: 'member_in_time' }
                    // { 
                    //     data: null,
                    //     className: "center",
                    //     defaultContent: '<a href="" class="edit_attendance btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>' + 
                    //     '<a href="" class="remove_attendance btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>'
                    // }
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

        //delete attendance
        $('#attendancetable').on('click','a.remove_attendance', function(e){
            e.preventDefault();
            var data = $('#attendancetable').DataTable().row($(this).parents('tr')).data();
            var attendanceId = data.id;

            $.confirm({
                text: "Are you sure?",
                confirm: function(){
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'DELETE',
                        url: baseUrl+'/admin/member-attendance/'+ attendanceId,
                        success: function(res){
                            alert(res.msg);
                            setTimeout(function(){
                                location.reload();
                            },1000)
                        }

                    });
                },
                cancel: function(){
                    //nothing to do
                }
            });
        });

        //edit member attendance record
        $('#attendancetable').on('click','a.edit_attendance', function (e){
            e.preventDefault();
            var data = $('#attendancetable').DataTable().row($(this).parents('tr')).data();
            var memberId = data.member_id;

            //get all members
            $.ajax({
                type: 'GET',
                url: baseUrl+'/admin/get-all-members',
                success: function(res){
                    var memberData = res.data;

                    var html = '';
                    html +='<option value="0">Member ID</option>';
                    for(var x = 0; x<memberData.length; x++){
                        if(memberId==memberData[x].id){
                            html+='<option selected value="'+memberData[x].id+'">'+memberData[x].id+'</option>';
                        }else {
                            html+='<option value="'+memberData[x].id+'">'+memberData[x].id+'</option>';
                        }
                    }
                    $('#editmember_id').html(html);
                }
            });

            $('#hdnattendance_id').val(data.id);
            $('#editmember_in_date').val(data.member_in_date);
            $('#editmember_in_time').val(data.member_in_time);
            $('#attendanceeditmodal').modal('toggle');

        });

        //edit Attendance
        $('#editfrmattendance').submit(function(e){
            e.preventDefault();
            var attendanceId = $('#hdnattendance_id').val();

            $.ajax({
                type: 'PUT',
                url: baseUrl+'/admin/member-attendance/'+ attendanceId,
                data: $('#editfrmattendance').serialize(),
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
            });
        });


</script>

@endsection
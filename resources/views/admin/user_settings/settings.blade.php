@extends('admin.layout.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Settings</h3>
        </div>
    </div>
    <div class="row card mt-4">
        <div class="container">        
        <div class="col-md-12">
            <h4>Change Member Passwords</h4>
        </div>
            <div class="col-md-12 ">
                <table id="membertable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>

                    </thead>

                </table>
            </div>
        </div>
    </div>
    <div class="row card mt-4">
        <div class="container">        
        <div class="col-md-12">
            <h4>Change Trainer Passwords</h4>
        </div>
            <div class="col-md-12 ">
                <table id="trainertable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>

                    </thead>

                </table>
            </div>
        </div>
    </div>
</div>

@include('admin.user_settings.components.member-edit-modal')
@include('admin.user_settings.components.trainer-edit-modal')
@endsection

@section('custom-js')
<script type="text/javascript">

//Member Passwords

    $(document).ready(function(){


        $('#membertable').DataTable({
            "pageLength": 10,
        // "paging": false,
        // "bInfo" : false,
        ajax: baseUrl+'/admin/get-all-members',
        columns: 
                [
                    { data: 'id' },
                    { data: 'fname' },
                    { data: 'lname' },
                    { data: 'email' },
                    {   
                        data: null,
                        className: "center",
                        defaultContent: '<a href="" class="editor_editmember btn btn-primary btn-sm"><i class="fa fa-edit"></i>Edit Password</a>'
                    }
                ]
        });
    });


     // Edit Member record
     $('#membertable').on('click', 'a.editor_editmember', function (e) {
        e.preventDefault();
        var data = $('#membertable').DataTable().row($(this).parents('tr')).data();
       
        $('#editfname').val(data.fname);
        $('#editlname').val(data.lname);
        $('#hdnmemberid').val(data.id);
        $('#membereditmodal').modal('toggle');

        });


        //Edit Member
        $('#editfrmmember').submit(function(e){
            e.preventDefault();
                var memberId = $('#hdnmemberid').val();

            $.ajax({
                type: 'PUT',
                url: baseUrl+'/admin/members/'+memberId,
                data: $('#editfrmmember').serialize(),
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

//Trainer Passwords

    $(document).ready(function(){


        $('#trainertable').DataTable({
            "pageLength": 10,
        // "paging": false,
        // "bInfo" : false,
        ajax: baseUrl+'/admin/get-all-trainers',
        columns: 
                [
                    { data: 'id' },
                    { data: 'fname' },
                    { data: 'lname' },
                    { data: 'email' },
                    {   
                        data: null,
                        className: "center",
                        defaultContent: '<a href="" class="editor_edittrainer btn btn-primary btn-sm"><i class="fa fa-edit"></i>Edit Password</a>'
                    }
                ]
        });
    });


     // Edit trainer record
     $('#trainertable').on('click', 'a.editor_edittrainer', function (e) {
        e.preventDefault();
        var data1 = $('#trainertable').DataTable().row($(this).parents('tr')).data();
       
        $('#editfnamet').val(data1.fname);
        $('#editlnamet').val(data1.lname);
        $('#hdntrainerid').val(data1.id);
        $('#trainereditmodal').modal('toggle');

        });


        //Edit trainer
        $('#editfrmtrainer').submit(function(e){
            e.preventDefault();
                var trainerId = $('#hdntrainerid').val();

            $.ajax({
                type: 'PUT',
                url: baseUrl+'/admin/trainers/'+trainerId,
                data: $('#editfrmtrainer').serialize(),
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

</script>
@endsection

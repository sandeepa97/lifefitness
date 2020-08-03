@extends('admin.layout.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Member List</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-right">
            <button type="button" class="btn btn-primary" id="btnadd">Add</button>
        </div>
    </div>
    <div class="row card mt-1">
        <div class="container">
            <div class="col-md-12 ">
                <table id="membertable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Gender</th>
                            <th>NIC</th>
                            <th>Address</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>

                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Gender</th>
                            <th>NIC</th>
                            <th>Address</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>

                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- Include User Modal --}}
@include('admin.member.components.member-add-modal')

{{-- Include User Edit Modal --}}
@include('admin.member.components.member-edit-modal')
@endsection

@section('custom-js')
<script type="text/javascript">
    $(document).ready(function(){


        $('#membertable').DataTable({

        ajax: baseUrl+'/admin/get-all-members',
        columns: 
                [
                    { data: 'id' },
                    { data: 'fname' },
                    { data: 'lname' },
                    { data: 'gender' },
                    { data: 'nic' },
                    { data: 'address' },
                    { data: 'contact' },
                    { data: 'email' },
                    {   
                        
                        data: null,
                        className: "center",
                        defaultContent: '<a href="" class="editor_editmember btn btn-primary"><i class="fa fa-edit"></i>Edit</a>' +
                                '<a href="" class="remove_member btn btn-danger"><i class="fa fa-trash"></i>Delete</a>'
                    }
                ]
        });
        alert("jason working");
    });


    // Delete Record
    $('#usertable').on('click', 'a.remove_user', function (e) {
        e.preventDefault();

        var data = $('#usertable').DataTable().row($(this).parents('tr')).data();
        var userId = data.id;

        $.confirm({
            text: "Are you sure?",
            confirm: function() {
              $.ajax({
                  type: 'DELETE',
                  url: baseUrl+'/admin/user/'+userId,
                  success: function(res){
                      alert(res.msg);
                      setTimeout(function(){
                        location.reload();
                      },2000)
                  }
              })
            },
            cancel: function() {
                // nothing to do

            }
        });

    });


     // Edit record
     $('#usertable').on('click', 'a.editor_edit', function (e) {
        e.preventDefault();
        var data = $('#usertable').DataTable().row($(this).parents('tr')).data();
        var userRoleId = data.user_role_id;
        // Get All User Roles
        $.ajax({
            type: 'GET',
            url: baseUrl+'/user-role',
            success: function(res){
                var userRole = res.data;
                // #user_role
                var html ='';
                html+='<option value="0">Select User Role</option>';
                for(var x=0; x<userRole.length; x++){
                    if(userRoleId==userRole[x].id){
                        html+='<option selected value="'+userRole[x].id+'">'+userRole[x].name+'</option>';
                    }else{
                        html+='<option value="'+userRole[x].id+'">'+userRole[x].name+'</option>';
                    }

                }
               $('#edituser_role').html(html);
            }

        });

        $('#editfname').val(data.fname);
        $('#editlname').val(data.lname);
        $('#editemail').val(data.email);
        $('#hdnuserid').val(data.id);
        $('#edittelephone').val(data.mobile);
        $('#usereditmodal').modal('toggle');
        console.log(data);

        });

        $('#btnadd').click(function(){
            $('#useraddmodal').modal('toggle');
        });

        $('#frmcreateuser').submit(function(e){
            e.preventDefault();
            
            $.ajax({
        
                url: "{{ url('/admin/user/')}}",
                type: 'POST',
                data: $('#frmcreateuser').serialize(),
                success: function(response){
                    alert(response.msg);
                    location.reload();
                }
            });
        });

        //Edit User
        $('#editfrmuser').submit(function(e){
            e.preventDefault();
                var userId = $('#hdnuserid').val();

            $.ajax({
                type: 'PUT',
                url: baseUrl+'/admin/user/'+userId,
                data: $('#editfrmuser').serialize(),
                success: function(response){
                    if(response.success==true){
                        alert(response.msg);
                        setTimeout(function(){
                            location.reload();
                        },2000);
                    }else{
                        alert(response.msg);
                    }
                }

            })
        });


</script>
@endsection

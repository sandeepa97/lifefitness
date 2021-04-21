@extends('admin.layout.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>User Profile Management</h3>
        </div>
    </div>
    <!-- <div class="row">
        <div class="col-md-12 text-right">
            <button type="button" class="btn btn-primary" id="btnadduser">Add user</button>
        </div>
    </div> -->
    <div class="row card mt-4">
        <div class="container">
            <div class="col-md-12 ">
                <table id="usertable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>

                    </thead>
                    <tbody>

                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->fname }}</td>
                        <td>{{ $user->lname }}</td>
                        <td>{{ $user->email }}</td>
                        <td><a href="" class="editor_edituser btn btn-primary btn-sm"><i class="fa fa-edit"></i>Edit Record</a></td>
                    </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>

@include('admin.user_settings.components.user-edit-modal')

@endsection

@section('custom-js')
<script type="text/javascript">

    $('#usertable').DataTable({
        "paging": false,
        "bInfo" : false,
        "searching": false
    });

    
     // Edit User record
     $('#usertable').on('click', 'a.editor_edituser', function (e) {
        e.preventDefault();
        var data = $('#usertable').DataTable().row($(this).parents('tr')).data();
        // console.log(data);

        $('#hdnuserid').val(data[0]);
        $('#editfname').val(data[1]);
        $('#editlname').val(data[2]);
        $('#editemail').val(data[3]);
        $('#usereditmodal').modal('toggle');
        
        });


        //Edit user
        $('#editfrmuser').submit(function(e){
            e.preventDefault();
                var userId = $('#hdnuserid').val();
                // console.log(userId);
            $.ajax({
                type: 'PUT',
                url: baseUrl+'/admin/user-settings/'+userId,
                data: $('#editfrmuser').serialize(),
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

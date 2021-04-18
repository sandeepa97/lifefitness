@extends('admin.layout.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Member Details</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-right">
            <button type="button" class="btn btn-primary mr-3" id="btnaddmember">Add Member</button>
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
                        defaultContent: '<a href="" class="editor_editmember btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>' +
                                '<a href="" class="remove_member btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>'
                    }
                ]
        });
    });
    
        //Add Member
        $('#btnaddmember').click(function(){
            $('#memberaddmodal').modal('toggle');
        });

        $('#frmcreatemember').submit(function(e){
            e.preventDefault();
            $.ajax({
                url: "{{ url('/admin/members/')}}",
                type: 'POST',
                data: $('#frmcreatemember').serialize(),
                success: function(response){
                    alert(response.msg);
                    location.reload();
                }
            });
        });


    // Delete Member Record
    $('#membertable').on('click', 'a.remove_member', function (e) {
        e.preventDefault();

        var data = $('#membertable').DataTable().row($(this).parents('tr')).data();
        var memberId = data.id;

        $.confirm({
            text: "Are you sure?",
            confirm: function() {
              $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                  type: 'DELETE',
                  url: baseUrl+'/admin/members/'+memberId,
                  success: function(res){
                      alert(res.msg);
                      setTimeout(function(){
                        location.reload();
                      },2000)
                  }
              })
            },
            cancel: function() {

                // nothing to do.

            }
        });

    });




     // Edit Member record
     $('#membertable').on('click', 'a.editor_editmember', function (e) {
        e.preventDefault();
        var data = $('#membertable').DataTable().row($(this).parents('tr')).data();
       
        $('#editfname').val(data.fname);
        $('#editlname').val(data.lname);
        $('#hdnmemberid').val(data.id);
        $('#editgender').val(data.gender);
        $('#editnic').val(data.nic);
        $('#editaddress').val(data.address);
        $('#editcontact').val(data.contact);
        $('#editemail').val(data.email);
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
                        },2000);
                    }else{
                        alert(response.msg);
                    }
                }

            })
        });



</script>
@endsection

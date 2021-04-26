@extends('admin.layout.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Trainer Details</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-right">
            <button type="button" class="btn btn-primary" id="btnaddtrainer">Add Trainer</button>
        </div>
    </div>
    <div class="row card mt-1">
        <div class="container">
            <div class="col-md-12 ">
                <table id="trainertable" class="table table-bordered">
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
@include('admin.trainer.components.trainer-add-modal')

{{-- Include User Edit Modal --}}
@include('admin.trainer.components.trainer-edit-modal')
@endsection

@section('custom-js')
<script type="text/javascript">
    $(document).ready(function(){


        $('#trainertable').DataTable({
            "pageLength": 15,

        ajax: baseUrl+'/admin/get-all-trainers',
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
                        defaultContent: '<a href="" class="editor_edittrainer btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>' +
                                '<a href="" class="remove_trainer btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>'
                    }
                ]
        });
    });
    
        //Add trainer
        $('#btnaddtrainer').click(function(){
            $('#traineraddmodal').modal('toggle');
        });

        // $('#frmcreatetrainer').submit(function(e){
        //     e.preventDefault();
        //     $.ajax({
        //         url: "{{ url('/admin/trainers/')}}",
        //         type: 'POST',
        //         data: $('#frmcreatetrainer').serialize(),
        //         success: function(response){
        //             alert(response.msg);
        //             location.reload();
        //         }
        //     });
        // });

        //Form Validation + Add Trainer
        $(document).ready(function(){
            $('#frmcreatetrainer').on('submit',function(e) {
            e.preventDefault(); 
            if ( $('#frmcreatetrainer').parsley().isValid() ) {
                $.ajax({
                    url: "{{ url('/admin/trainers/')}}",
                    type: 'POST',
                    data: $('#frmcreatetrainer').serialize(),
                    success: function(response){
                        alert(response.msg);
                        location.reload();
                    }
                });
            }
            });
        });


    // Delete trainer Record
    $('#trainertable').on('click', 'a.remove_trainer', function (e) {
        e.preventDefault();

        var data = $('#trainertable').DataTable().row($(this).parents('tr')).data();
        var trainerId = data.id;

        $.confirm({
            text: "Are you sure?",
            confirm: function() {
              $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                  type: 'DELETE',
                  url: baseUrl+'/admin/trainers/'+trainerId,
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




     // Edit trainer record
     $('#trainertable').on('click', 'a.editor_edittrainer', function (e) {
        e.preventDefault();
        var data = $('#trainertable').DataTable().row($(this).parents('tr')).data();
       
        $('#editfname').val(data.fname);
        $('#editlname').val(data.lname);
        $('#hdntrainerid').val(data.id);
        $('#editgender').val(data.gender);
        $('#editnic').val(data.nic);
        $('#editaddress').val(data.address);
        $('#editcontact').val(data.contact);
        $('#editemail').val(data.email);
        $('#trainereditmodal').modal('toggle');

        });


        //Edit trainer
        // $('#editfrmtrainer').submit(function(e){
        //     e.preventDefault();
        //         var trainerId = $('#hdntrainerid').val();

            // $.ajax({
            //     type: 'PUT',
            //     url: baseUrl+'/admin/trainers/'+trainerId,
            //     data: $('#editfrmtrainer').serialize(),
            //     success: function(response){
            //         if(response.success==true){
            //             alert(response.msg);
            //             setTimeout(function(){
            //                 location.reload();
            //             },1000);
            //         }else{
            //             alert(response.msg);
            //         }
            //     }

            // })
        // });

        //Form Validation + Edit Trainer
        $(document).ready(function(){
            $('#editfrmtrainer').on('submit',function(e) {
            e.preventDefault();
            var trainerId = $('#hdntrainerid').val(); 
            if ( $('#editfrmtrainer').parsley().isValid() ) {
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
            }
            });
        });



</script>
@endsection

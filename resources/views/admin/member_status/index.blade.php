
@extends('admin.layout.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Member Status</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-right">
            <button type="button" class="btn btn-primary" id="btnaddstatus">Add Member Status</button>
        </div>
    </div>
    <div class="row card mt-1">
        <div class="container">
            <div class="col-md-12 ">
                <table id="statustable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Member ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Height(CM)</th>
                            <th>Weight(KG)</th>
                            <th>Body Mass Index</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>

                    </thead>

                </table>
            </div>
        </div>
    </div>
</div>

@include('admin.member_status.components.member-status-add-modal');
@include('admin.member_status.components.member-status-edit-modal');

@endsection

@section('custom-js')

<script type = "text/javascript">

    $(document).ready(function(){

        // Get All Members
        $.ajax({
            type: 'GET',
            url: baseUrl+'/admin/get-all-members',
            success: function(res){
                var memberData = res.data;
                var html ='';
                html+='<option value="0">Member ID</option>';
                for(var x=0; x<memberData.length; x++){
                    html+='<option value="'+memberData[x].id+'">'+memberData[x].id+' '+memberData[x].fname+' '+memberData[x].lname+'</option>';
                }
               $('#member_id').html(html);
               $('#member_id').select2();
            }
        });
        
        // Get All Member Status Types
        // $.ajax({
        //     type: 'GET',
        //     url: baseUrl+'/admin/get-all-member-status-types',
        //     success: function(res){
        //         var memberStatusType = res.data;
        //         var html ='';
        //         html+='<option value="0">Status</option>';
        //         for(var x=0; x<memberStatusType.length; x++){
        //             html+='<option value="'+memberStatusType[x].id+'">'+memberStatusType[x].status_type+'</option>';
        //         }
        //        $('#member_status_type_id').html(html);
        //     }

        // });

        $('#statustable').DataTable({
            "pageLength": 15,

            ajax: baseUrl+'/admin/get-all-member-status',
            columns:
            [
                    { data: 'id' },
                    { data: 'member_id' },
                    { data: 'member.fname' },
                    { data: 'member.lname' },
                    { data: 'height_cm' },
                    { data: 'weight_kg' },
                    { data: 'bmi' },
                    { data: 'member_status_type.status_type' },
                    {   
                        data: null,
                        className: "center",
                        defaultContent: '<a href="" class="edit_memberstatus btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>' +
                                '<a href="" class="remove_memberstatus btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>'
                    }
            ]

        });

    });

       // Add Member Status
       $('#btnaddstatus').click(function(){
            $('#memberstatusaddmodal').modal('toggle');
        });

        $('#frmcreatememberstatus').submit(function(e){
            e.preventDefault();
            //BMI calculation
            var height = $('#height_cm').val();
            var weight = $('#weight_kg').val();
            var bmi = (weight/(height/100)**2);
                // console.log(bmi);

            $('#bmi').val(bmi);
            if(bmi>=20 && bmi<=25){
                // console.log("Normal");
                $('#member_status_type_id').val("1");
            } else if (bmi<20){
                // console.log("Underweight");
                $('#member_status_type_id').val("2");
            } else if (bmi>=26 && bmi<=30){
                // console.log("Overweight");
                $('#member_status_type_id').val("3");
            } else {
                // console.log("Obese");
                $('#member_status_type_id').val("4");
            }
            

            $.ajax({
                url: "{{ url('/admin/member-status')}}",
                type: 'POST',
                data: $('#frmcreatememberstatus').serialize(),
                success: function(response){
                    alert(response.msg);
                    location.reload();
                }
            });
        });


     // Edit Member Status record
     $('#statustable').on('click', 'a.edit_memberstatus', function (e) {
        e.preventDefault();
        var data = $('#statustable').DataTable().row($(this).parents('tr')).data();
        var memberStatusTypeId = data.member_status_type_id;
        var memberId = data.member_id;

        // // Get All Member Status Types
        // $.ajax({
        //     type: 'GET',
        //     url: baseUrl+'/admin/get-all-member-status-types',
        //     success: function(res){
        //         var memberStatusType = res.data;
        //         var html ='';
        //         html+='<option value="0">Status</option>';
        //         for(var x=0; x<memberStatusType.length; x++){
        //             if(memberStatusTypeId==memberStatusType[x].id){
        //             html+='<option selected value="'+memberStatusType[x].id+'">'+memberStatusType[x].status_type+'</option>';
        //             }
        //             else{
        //             html+='<option value="'+memberStatusType[x].id+'">'+memberStatusType[x].status_type+'</option>';
        //             }
        //         }
        //        $('#editmember_status_type_id').html(html);
        //     }

        // });

         // Get All Members
         $.ajax({
            type: 'GET',
            url: baseUrl+'/admin/get-all-members',
            success: function(res){
                var memberData = res.data;
        
                var html ='';
                html+='<option value="0">Member ID</option>';
                for(var x=0; x<memberData.length; x++){
                    if(memberId==memberData[x].id){
                        html+='<option selected value="'+memberData[x].id+'">'+memberData[x].id+' - '+memberData[x].fname+' '+memberData[x].lname+'</option>';
                    }else{
                        html+='<option value="'+memberData[x].id+'">'+memberData[x].id+'</option>';
                    }
                }
            //    $('#editmember_id').html(html);
            }

        });
        
     
        $('#editmember_id').val(data.member.id);
        $('#editmember_name').val(data.member.id+ ' - ' +data.member.fname+' '+data.member.lname);
        $('#hdnmemberstatus_id').val(data.id);
        $('#editheight_cm').val(data.height_cm);
        $('#editweight_kg').val(data.weight_kg);
        // $('#editbmi').val(data.bmi);
        $('#memberstatuseditmodal').modal('toggle');

        });


        //Edit Member Status
        $('#frmeditmemberstatus').submit(function(e){
            e.preventDefault();
                var memberStatusId = $('#hdnmemberstatus_id').val();
                    //BMI calculation
                var height = $('#editheight_cm').val();
                var weight = $('#editweight_kg').val();
                var bmi = (weight/(height/100)**2);
                    // console.log(bmi);

                $('#editbmi').val(bmi);
                if(bmi>=20 && bmi<=25){
                    // console.log("Normal");
                    $('#editmember_status_type_id').val("1");
                } else if (bmi<20){
                    // console.log("Underweight");
                    $('#editmember_status_type_id').val("2");
                } else if (bmi>25 && bmi<=30){
                    // console.log("Overweight");
                    $('#editmember_status_type_id').val("3");
                } else {
                    // console.log("Obese");
                    $('#editmember_status_type_id').val("4");
                }

            $.ajax({
                type: 'PUT',
                url: baseUrl+'/admin/member-status/'+memberStatusId,
                data: $('#frmeditmemberstatus').serialize(),
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

    // Delete Member Status Record
    $('#statustable').on('click', 'a.remove_memberstatus', function (e) {
        e.preventDefault();

        var data = $('#statustable').DataTable().row($(this).parents('tr')).data();
        var memberStatusId = data.id;

        $.confirm({
            text: "Are you sure?",
            confirm: function() {
              $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                  type: 'DELETE',
                  url: baseUrl+'/admin/member-status/'+memberStatusId,
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
@extends('admin.layout.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Trainer Shifts</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-right">
            <button type="button" class="btn btn-primary" id="btnaddshift">Assign Shiftt</button>
        </div>
    </div>

    <div class="row card mt-1">
        <div class="container">
            <div class="col-md-12 ">
                <table id="shifttable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Trainer ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Shift Date</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Shift Type</th>
                            <th>Action</th>
                        </tr>

                    </thead>

                </table>
            </div>
        </div>
    </div>

</div>

@include('admin.trainer_shifts.components.shift-add-modal')
@include('admin.trainer_shifts.components.shift-edit-modal')

@endsection

@section('custom-js')

<script type="text/javascript">

$('#shifttable').DataTable({
    "pageLength": 15,

ajax: baseUrl+'/admin/get-all-trainer-shifts',
columns: 
        [
            { data: 'id' },
            { data: 'trainer_id' },
            { data: 'trainers.fname' },
            { data: 'trainers.lname' },
            { data: 'shift_date' },
            { data: 'shift_start_time' },
            { data: 'shift_end_time' },
            { data: 'trainer_shift_types.shift_type' },
            {   
                data: null,
                className: "center",
                defaultContent: '<a href="" class="edit_shift btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>' +
                        '<a href="" class="remove_shift btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>'
            }
        ]
});

        // Get All Shift Types
        $.ajax({
            type: 'GET',
            url: baseUrl+'/admin/get-all-trainer-shifts-type',
            success: function(res){
                var shiftType = res.data;
                var html ='';
                html+='<option value="0">Select Shift Type</option>';
                for(var x=0; x<shiftType.length; x++){
                    html+='<option value="'+shiftType[x].id+'">'+shiftType[x].shift_type+'</option>';
                }
               $('#shift_type_id').html(html);
            }

        });

        // Get All Trainers
        $.ajax({
            type: 'GET',
            url: baseUrl+'/admin/get-all-trainers',
            success: function(res){
                var trainerData = res.data;
                var html ='';
                html+='<option value="0">Select Trainer ID</option>';
                for(var x=0; x<trainerData.length; x++){
                    html+='<option value="'+trainerData[x].id+'">'+trainerData[x].id+' '+trainerData[x].fname+' '+trainerData[x].lname+'</option>';
                }
               $('#trainer_id').html(html);
               $('#trainer_id').select2();
            //     // #First Name
            //     var html ='';
            //     html+='<option value="0">First Name</option>';
            //     for(var x=0; x<trainerData.length; x++){
            //         html+='<option value="'+trainerData[x].id+'">'+trainerData[x].fname+'</option>';
            //     }
            //    $('#fname').html(html);
            //     // #Last Name
            //     var html ='';
            //     html+='<option value="0">Last Name</option>';
            //     for(var x=0; x<trainerData.length; x++){
            //         html+='<option value="'+trainerData[x].id+'">'+trainerData[x].lname+'</option>';
            //     }
            //    $('#lname').html(html);
            }

        });

      // Add Shift
      $('#btnaddshift').click(function(){
            $('#shiftaddmodal').modal('toggle');
        });

        $('#frmcreateshift').submit(function(e){
            e.preventDefault();
            $.ajax({
                url: "{{ url('/admin/trainer-shifts')}}",
                type: 'POST',
                data: $('#frmcreateshift').serialize(),
                success: function(response){
                    alert(response.msg);
                    location.reload();
                }
            });
        });


     // Edit Shift record
     $('#shifttable').on('click', 'a.edit_shift', function (e) {
        e.preventDefault();
        var data = $('#shifttable').DataTable().row($(this).parents('tr')).data();
        var shiftTypeId = data.shift_type_id;
        var trainerId = data.trainer_id;

        // Get All Shift Types
        $.ajax({
            type: 'GET',
            url: baseUrl+'/admin/get-all-trainer-shifts-type',
            success: function(res){
                var shiftType = res.data;
                var html ='';
                html+='<option value="0">Select Shift Type</option>';
                for(var x=0; x<shiftType.length; x++){
                    if(shiftTypeId==shiftType[x].id){
                    html+='<option selected value="'+shiftType[x].id+'">'+shiftType[x].shift_type+'</option>';
                    }
                    else{
                    html+='<option value="'+shiftType[x].id+'">'+shiftType[x].shift_type+'</option>';
                    }
                }
               $('#editshift_type_id').html(html);
            }

        });

         // Get All trainers
         $.ajax({
            type: 'GET',
            url: baseUrl+'/admin/get-all-trainers',
            success: function(res){
                var trainerData = res.data;

                var html ='';
                html+='<option value="0">Select Trainer ID</option>';
                for(var x=0; x<trainerData.length; x++){
                    if(trainerId==trainerData[x].id){
                        html+='<option selected value="'+trainerData[x].id+'">'+trainerData[x].id+'</option>';
                    }else{
                        html+='<option value="'+trainerData[x].id+'">'+trainerData[x].id+'</option>';
                    }
                }
               $('#edittrainer_id').html(html);

            //     // #First Name
            //     var html ='';
            //     html+='<option value="0">First Name</option>';
            //     for(var x=0; x<trainerData.length; x++){
            //         if(trainerId==trainerData[x].id){
            //         html+='<option selected value="'+trainerData[x].id+'">'+trainerData[x].fname+'</option>';
            //         }else{
            //         html+='<option value="'+trainerData[x].id+'">'+trainerData[x].fname+'</option>';
            //         }
            //     }
            //    $('#editfname').html(html);
            //     // #Last Name
            //     var html ='';
            //     html+='<option value="0">Last Name</option>';
            //     for(var x=0; x<trainerData.length; x++){
            //         if(trainerId==trainerData[x].id){
            //         html+='<option selected value="'+trainerData[x].id+'">'+trainerData[x].lname+'</option>';
            //         }else{
            //         html+='<option value="'+trainerData[x].id+'">'+trainerData[x].lname+'</option>';
            //         }

            //     }
            //    $('#editlname').html(html);
            }

        });
            
        $('#hdn_shift_id').val(data.id);
        $('#editshift_date').val(data.shift_date);
        $('#editshift_start_time').val(data.shift_start_time);
        $('#editshift_end_time').val(data.shift_end_time);
        $('#shifteditmodal').modal('toggle');

        });

        //Edit Shift
        $('#frmeditshift').submit(function(e){
            e.preventDefault();
                var shiftId = $('#hdn_shift_id').val();

            $.ajax({
                type: 'PUT',
                url: baseUrl+'/admin/trainer-shifts/'+shiftId,
                data: $('#frmeditshift').serialize(),
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

    // Delete Shift Record
    $('#shifttable').on('click', 'a.remove_shift', function (e) {
        e.preventDefault();

        var data = $('#shifttable').DataTable().row($(this).parents('tr')).data();
        var shiftId = data.id;

        $.confirm({
            text: "Are you sure?",
            confirm: function() {
              $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                  type: 'DELETE',
                  url: baseUrl+'/admin/trainer-shifts/'+shiftId,
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
@extends('admin.layout.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Workout Schedules</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-right">
            <button type="button" class="btn btn-primary" id="btnaddexercise">Add Exercise</button>
        </div>
    </div>
    <div class="row mt-1">
        <div class="col-md-12 text-right">
            <button type="button" class="btn btn-primary" id="btnaddschedule">Add Workout Schedule</button>
        </div>
    </div>

    <div class="row mt-1">
        
            <div class="col-md-4 card">
                <table id="exercisetable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Exercise Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="col-md-8 card">
                <table id="scheduletable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Schedule Name</th>
                            <!-- <th>Exercise ID</th> -->
                            <th>Exercise Name</th>
                            <th>Reps</th>
                            <th>Sets</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
    
    </div>

</div>

@include('admin.schedules.components.exercise-add-modal')

@include('admin.schedules.components.exercise-edit-modal')

@include('admin.schedules.components.schedule-add-modal')

@include('admin.schedules.components.schedule-edit-modal')

@endsection

@section('custom-js')

<script type="text/javascript">

    $(document).ready(function(){

        //load data to Table
        $('#exercisetable').DataTable({
            "pageLength": 15,
            ajax: baseUrl+'/admin/get-all-exercises',
            columns:
                [
                    { data: 'id' },
                    { data: 'exercise_name' },
                    { 
                        data: null,
                        className: "center",
                        defaultContent: '<a href="" class="edit_exercise btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>' + 
                        '<a href="" class="remove_exercise btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>'
                    }
                ]
        });

    });

        //add exercise
        $('#btnaddexercise').click(function(){
            $('#exerciseaddmodal').modal('toggle');
        });

        $('#frmcreateexercise').submit(function(e){
            e.preventDefault();
            $.ajax({
                url: "{{url('admin/exercises')}}",
                type: 'POST',
                data: $('#frmcreateexercise').serialize(),
                success: function(response){
                    alert(response.msg);
                    location.reload();
                }
            });
        });

        //edit exercise
        $('#exercisetable').on('click','a.edit_exercise', function (e){
            e.preventDefault();
            var data = $('#exercisetable').DataTable().row($(this).parents('tr')).data();

            $('#hdnexercise_id').val(data.id);
            $('#editexercise_name').val(data.exercise_name);
            $('#exerciseeditmodal').modal('toggle');
        });

        //edit exercise POST
        $('#editfrmexercise').submit(function(e){
            e.preventDefault();
            var exerciseId = $('#hdnexercise_id').val();

            $.ajax({
                type: 'PUT',
                url: baseUrl+'/admin/exercises/'+ exerciseId,
                data: $('#editfrmexercise').serialize(),
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

        //delete exercise
        $('#exercisetable').on('click', 'a.remove_exercise', function (e) {
        e.preventDefault();

        var data = $('#exercisetable').DataTable().row($(this).parents('tr')).data();
        var exerciseId = data.id;

        $.confirm({
            text: "Are you sure?",
            confirm: function() {
              $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                  type: 'DELETE',
                  url: baseUrl+'/admin/exercises/'+exerciseId,
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


        //load data to Schedule Table
        $('#scheduletable').DataTable({
            "pageLength": 15,
            ajax: baseUrl+'/admin/get-all-schedules',
            columns:
                [
                    { data: 'id' },
                    { data: 'workout_schedule_type.schedule_type' },
                    { data: 'exercises.exercise_name' },
                    { data: 'reps' },
                    { data: 'sets' },
                    { 
                        data: null,
                        className: "center",
                        defaultContent: '<a href="" class="edit_schedule btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>' + 
                        '<a href="" class="remove_schedule btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>'
                    }
                ]
        });

        // Get All Schedule Types
        $.ajax({
            type: 'GET',
            url: baseUrl+'/admin/get-all-schedules-type',
            success: function(res){
                var scheduleType = res.data;
                // #schedule_type
                var html ='';
                html+='<option value="0">Select Schedule Name</option>';
                for(var x=0; x<scheduleType.length; x++){
                    html+='<option value="'+scheduleType[x].id+'">'+scheduleType[x].schedule_type+'</option>';
                }
               $('#schedule_type_id').html(html);
            }

        });
        // Get All Exercises
        $.ajax({
            type: 'GET',
            url: baseUrl+'/admin/get-all-exercises',
            success: function(res){
                var exercises = res.data;
                // #schedule_type
                var html ='';
                html+='<option value="0">Select Exercise Name</option>';
                for(var x=0; x<exercises.length; x++){
                    html+='<option value="'+exercises[x].id+'">'+exercises[x].exercise_name+'</option>';
                }
               $('#exercise_id').html(html);
            }

        });

        //add schedule
        $('#btnaddschedule').click(function(){
            $('#scheduleaddmodal').modal('toggle');
        });

        // $('#frmcreateschedule').submit(function(e){
        //     e.preventDefault();
        //     $.ajax({
        //         url: "{{url('admin/schedules')}}",
        //         type: 'POST',
        //         data: $('#frmcreateschedule').serialize(),
        //         success: function(response){
        //             alert(response.msg);
        //             location.reload();
        //         }
        //     });
        // });

            //Form Validation + Add schedule
        $(document).ready(function(){
            $('#frmcreateschedule').on('submit',function(e) {
            e.preventDefault(); 
            if ( $('#frmcreateschedule').parsley().isValid() ) {
                $.ajax({
                url: "{{url('admin/schedules')}}",
                type: 'POST',
                data: $('#frmcreateschedule').serialize(),
                success: function(response){
                    alert(response.msg);
                    location.reload();
                }
            });
            }
            });
        });


   // Edit Schedule record
     $('#scheduletable').on('click', 'a.edit_schedule', function (e) {
        e.preventDefault();
        var data = $('#scheduletable').DataTable().row($(this).parents('tr')).data();
        var scheduleTypeId = data.schedule_type_id;
        var exerciseId = data.exercise_id;

        // Get All Schedule Types
        $.ajax({
            type: 'GET',
            url: baseUrl+'/admin/get-all-schedules-type',
            success: function(res){
                var scheduleType = res.data;
                var html ='';
                html+='<option value="0">Select Schedule Type</option>';
                for(var x=0; x<scheduleType.length; x++){
                    if(scheduleTypeId==scheduleType[x].id){
                    html+='<option selected value="'+scheduleType[x].id+'">'+scheduleType[x].schedule_type+'</option>';
                    }
                    else{
                    html+='<option value="'+scheduleType[x].id+'">'+scheduleType[x].schedule_type+'</option>';
                    }
                }
               $('#editschedule_type_id').html(html);
            }

        });

         // Get All Exercises
         $.ajax({
            type: 'GET',
            url: baseUrl+'/admin/get-all-exercises',
            success: function(res){
                var exerciseData = res.data;
                var html ='';
                html+='<option value="0">Select Exercise Name</option>';
                for(var x=0; x<exerciseData.length; x++){
                    if(exerciseId==exerciseData[x].id){
                        html+='<option selected value="'+exerciseData[x].id+'">'+exerciseData[x].exercise_name+'</option>';
                    }else{
                        html+='<option value="'+exerciseData[x].id+'">'+exerciseData[x].exercise_name+'</option>';
                    }
                }
               $('#editexercise_id').html(html);

            }

        });
        
  
        $('#hdnschedule_id').val(data.id);
        $('#editreps').val(data.reps);
        $('#editsets').val(data.sets);
        $('#scheduleeditmodal').modal('toggle');

        });


        // //Edit Schedule
        // $('#frmeditschedule').submit(function(e){
        //     e.preventDefault();
        //         var scheduleId = $('#hdnschedule_id').val();

        //     $.ajax({
        //         type: 'PUT',
        //         url: baseUrl+'/admin/schedules/'+scheduleId,
        //         data: $('#frmeditschedule').serialize(),
        //         success: function(response){
        //             if(response.success==true){
        //                 alert(response.msg);
        //                 setTimeout(function(){
        //                     location.reload();
        //                 },1000);
        //             }else{
        //                 alert(response.msg);
        //             }
        //         }

        //     })
        // });

        //Form Validation + Edit schedule
        $(document).ready(function(){
            $('#frmeditschedule').on('submit',function(e) {
            e.preventDefault();
            var scheduleId = $('#hdnschedule_id').val(); 
            if ( $('#frmeditschedule').parsley().isValid() ) {
                $.ajax({
                type: 'PUT',
                url: baseUrl+'/admin/schedules/'+scheduleId,
                data: $('#frmeditschedule').serialize(),
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


    // Delete Schedule Record
    $('#scheduletable').on('click', 'a.remove_schedule', function (e) {
        e.preventDefault();

        var data = $('#scheduletable').DataTable().row($(this).parents('tr')).data();
        var scheduleId = data.id;

        $.confirm({
            text: "Are you sure?",
            confirm: function() {
              $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                  type: 'DELETE',
                  url: baseUrl+'/admin/schedules/'+scheduleId,
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
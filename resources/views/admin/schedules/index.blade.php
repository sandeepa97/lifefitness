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

@endsection

@section('custom-js')

<script type="text/javascript">

    $(document).ready(function(){

        //load data to Table
        $('#exercisetable').DataTable({
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

</script>


@endsection
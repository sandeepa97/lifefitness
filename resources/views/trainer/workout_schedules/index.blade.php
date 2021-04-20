@extends('trainer.layout.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Workout Schedules</h3>
        </div>
    </div>
    <div class="row">
    </div>
    <div class="row card mt-1">
        <div class="container">
            <div class="col-md-12 ">
                <table id="scheduletable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Schedule Type</th>
                            <th>Exercise</th>
                            <th>Reps</th>
                            <th>Sets</th>
                        </tr>

                    </thead>

                </table>
            </div>
        </div>
    </div>
</div>


@endsection

@section('custom-js')

<script type="text/javascript">

    $('#scheduletable').DataTable({
        "paging": false,
        "bInfo" : false,
        ajax: baseUrl+'/admin/get-all-schedules',
        columns: 
                [
                    { data: 'id' },
                    { data: 'workout_schedule_type.schedule_type' },
                    { data: 'exercises.exercise_name' },
                    { data: 'reps' },
                    { data: 'sets' }
                ]
    });


</script>
@endsection
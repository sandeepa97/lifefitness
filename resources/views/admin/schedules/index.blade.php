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
                <table id="attendancetable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Exercise Name</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="col-md-8 card">
                <table id="attendancetable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Schedule Name</th>
                            <th>Exercise ID</th>
                            <th>Exercise Name</th>
                            <th>Reps</th>
                            <th>Sets</th>
                        </tr>
                    </thead>
                </table>
            </div>
    
    </div>

</div>

@endsection
@extends('admin.layout.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Trainer Shifts</h3>
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

@endsection

@section('custom-js')

<script type="text/javascript">

$('#shifttable').DataTable({

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


</script>

@endsection
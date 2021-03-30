@extends('admin.layout.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Member Attendance</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 text-right">
            <button type="button" class="btn btn-primary" id="btnaddattendance">Add Attendance</button>
        </div>
    </div>
    <div class="row card mt-1">
        <div class="container">
            <div class="col-md-12 ">
                <table id="attendancetable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Member ID</th>
                            <th>Date In</th>
                            <th>Time In</th>
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

    $(document).ready(function(){

        $('#attendancetable').DataTable({
            ajax: baseUrl+'/admin/get-all-attendance',
            columns:
                [
                    { data: 'id' },
                    { data: 'member_id' },
                    { data: 'member_in_date' },
                    { data: 'member_in_time' },
                    { 
                        data: null,
                        className: "center",
                        defaultContent: '<a href="" class="editor_editattendance btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>' + 
                        '<a href="" class="remove_payment btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>'
                    }
                ]
        })

    });

</script>

@endsection
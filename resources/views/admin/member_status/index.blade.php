
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


@endsection

@section('custom-js')

<script type = "text/javascript">

    $(document).ready(function(){

        $('#statustable').DataTable({

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

</script>

@endsection
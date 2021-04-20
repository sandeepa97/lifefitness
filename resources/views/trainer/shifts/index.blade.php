@extends('trainer.layout.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Available Shifts</h3>
        </div>
    </div>
    <div class="row">
    </div>
    <div class="row card mt-1">
        <div class="container">
            <div class="col-md-12 ">
                <table id="shifttable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Shift Type</th>
                        </tr>

                    </thead>
                    <tbody>
                    @php
                        $index = 1;
                    @endphp

                    @foreach($shifts as $shift)
                    <tr>
                        <td>{{ $index++ }}</td>
                        <td>{{ $shift->shift_date }}</td>
                        <td>{{ $shift->shift_start_time }}</td>
                        <td>{{ $shift->shift_end_time }}</td>
                        <td>{{ $shift->shift_type }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection

@section('custom-js')

<script type="text/javascript">

    $('#shifttable').DataTable({
        "paging": false,
        "bInfo" : false,
    });


</script>
@endsection
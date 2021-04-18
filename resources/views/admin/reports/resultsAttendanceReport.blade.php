@extends('admin.layout.master')
@section('content')

<div class="modal-body">
    <input type="button" class="btn btn-success" onclick="generate()" value="Export To PDF" /> 
    <input type="button"  class="btn btn-dark" value="Detailed Report Print" id="btnPrint" />

</div>
<div class="container mt-4" id="dvContainer">
    <center><h4>LIFE FITNESS GYMS - ATTENDANCE REPORT</h4>
    {{--  <h5>{{$dateFrom}} - {{$dateTo}}</h5> --}}
    </center>

    
            <div class="col-md-12 ">
                <table id="attendance-report-table" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Member ID</th>
                            <th>Name</th>
                            <th>Date In</th>
                            <th>Time In</th>
                        </tr>
                    </thead>
                    <tbody>

                    @php
                        $index = 1;
                    @endphp

                    @foreach($attendances as $attendance)
                    <tr>
                        <td>{{ $index++ }}</td>
                        <td>{{ $attendance->member_id }}</td>
                        <td>{{ $attendance->fname }} {{$attendance->lname}}</td>
                        <td>{{ $attendance->member_in_date }}</td>
                        <td>{{ $attendance->member_in_time }}</td>
                    </tr>
                    @endforeach

                    </tbody>

                </table>
                <h4>Total = {{ $count }}</h4>
            </div>
</div>

@endsection

@section('custom-js')

<script>

$("#btnPrint").on("click", function () {
            var divContents = $("#dvContainer").html();
            var printWindow = window.open('', '', 'height=400,width=800');
            printWindow.document.write('<html><head><title>DIV Contents</title>');
            printWindow.document.write('</head><body >');
            printWindow.document.write(divContents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
});


    $('#attendance-report-table').DataTable({
        "paging": false,
        "bInfo" : false,
        "searching": false
    });

//Export PDF
function generate() {  
    var doc = new jsPDF()
    doc.text(15, 10, "LIFE FITNESS GYMS - ATTENDANCE REPORT"); 
    doc.autoTable({ 
      html: '#attendance-report-table', 
      theme: 'plain'
      })
    doc.save('Attendance_Report.pdf')
}  

</script>

@endsection
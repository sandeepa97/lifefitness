@extends('admin.layout.master')
@section('content')

<div class="modal-body">
    <input type="button" class="btn btn-success" onclick="generate()" value="Export To PDF" /> 
    <input type="button"  class="btn btn-dark" value="Print" id="btnPrint" />

</div>
<div class="container mt-4" id="dvContainer">
    <center><h4>LIFE FITNESS GYMS - MEMBER REPORT</h4>
    </center>

    
            <div class="col-md-12 ">
                <table id="member-report-table" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Member ID</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>NIC</th>
                            <th>Address</th>
                            <th>Contact</th>
                            <th>Email</th>
                         
                        </tr>
                    </thead>
                    <tbody>

                    @php
                        $index = 1;
                    @endphp

                    @foreach($members as $member)
                    <tr>
                        <td>{{ $index++ }}</td>
                        <td>{{ $member->id }}</td>
                        <td>{{ $member->fname }} {{$member->lname}}</td>
                        <td>{{ $member->gender }}</td>
                        <td>{{ $member->nic }}</td>
                        <td>{{ $member->address }}</td>
                        <td>{{ $member->contact }}</td>
                        <td>{{ $member->email }}</td>
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


    $('#member-report-table').DataTable({
        "paging": false,
        "bInfo" : false,
        "searching": false
    });

//Export PDF
function generate() {  
    var doc = new jsPDF()
    doc.text(15, 10, "LIFE FITNESS GYMS - MEMBER REPORT"); 
    doc.autoTable({ 
      html: '#member-report-table', 
      theme: 'plain'
      })
    doc.save('Members_Report.pdf')
}  

</script>

@endsection
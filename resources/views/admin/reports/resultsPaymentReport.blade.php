@extends('admin.layout.master')
@section('content')

<div class="modal-body">
    <input type="button" class="btn btn-success" onclick="generate()" value="Export To PDF" /> 
    <input type="button"  class="btn btn-dark" value="Print" id="btnPrint" />

</div>
<div class="container mt-4" id="dvContainer">
    <center><h4>LIFE FITNESS GYMS - PAYMENTS REPORT</h4>
    {{--  <h5>{{$dateFrom}} - {{$dateTo}}</h5> --}}
    </center>

    
            <div class="col-md-12 ">
                <table id="payment-report-table" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Member ID</th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Payment Type</th>
                            <th>Payment Amount</th>
                        </tr>
                    </thead>
                    <tbody>

                    @php
                        $index = 1;
                    @endphp

                    @foreach($payments as $payment)
                    <tr>
                        <td>{{ $index++ }}</td>
                        <td>{{ $payment->member_id }}</td>
                        <td>{{ $payment->fname }} {{$payment->lname}}</td>
                        <td>{{ $payment->date }}</td>
                        <td>{{ $payment->payment_type }}</td>
                        <td>{{ $payment->amount }}</td>
                    </tr>
                    @endforeach

                    </tbody>

                </table>
                <h4>Total Amount = {{ $sum }}</h4>
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


    $('#payment-report-table').DataTable({
        "paging": false,
        "bInfo" : false,
        "searching": false
    });

//Export PDF
function generate() {  
    var doc = new jsPDF()
    doc.text(15, 10, "LIFE FITNESS GYMS - PAYMENTS REPORT"); 
    doc.autoTable({ 
      html: '#payment-report-table', 
      theme: 'plain'
      })
    doc.save('Payments_Report.pdf')
}  

</script>

@endsection
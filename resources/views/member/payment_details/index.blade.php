@extends('member.layout.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Payment Details</h3>
        </div>
    </div>
    <div class="row">
    </div>
    <div class="row card mt-1">
        <div class="container">
            <div class="col-md-12 ">
                <table id="paymenttable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Payment ID</th>
                            <th>Date</th>
                            <th>Payment Type</th>
                            <th>Amount</th>
                        </tr>

                    </thead>
                    <tbody>
                    @php
                        $index = 1;
                    @endphp

                    @foreach($payments as $payment)
                    <tr>
                        <td>{{ $index++ }}</td>
                        <td>{{ $payment->paymentId }}</td>
                        <td>{{ $payment->date }}</td>
                        <td>{{ $payment->payment_type }}</td>
                        <td>{{ $payment->amount }}</td>
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

    $('#paymenttable').DataTable({
        "paging": false,
        "bInfo" : false,
    });


</script>
@endsection
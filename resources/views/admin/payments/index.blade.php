
@extends('admin.layout.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Payments Management</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-right">
            <button type="button" class="btn btn-primary" id="btnaddpayment">Add Payment</button>
        </div>
    </div>
    <div class="row card mt-1">
        <div class="container">
            <div class="col-md-12 ">
                <table id="paymenttable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <!-- <th>First Name</th>
                            <th>Last Name</th>
                            <th>Gender</th>
                            <th>NIC</th>
                            <th>Address</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Action</th> -->
                            <th>Member ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Date</th>
                            <th>Payment Type</th>
                            <th>Payment Amount</th>
                            <th>Action</th>
                        </tr>

                    </thead>

                </table>
            </div>
        </div>
    </div>
</div>

{{-- Include User Modal --}}
@include('admin.payments.components.payment-add-modal')

{{-- Include User Edit Modal --}}
@include('admin.payments.components.payment-edit-modal')
@endsection

@section('custom-js')
<script type="text/javascript">
    $(document).ready(function(){


        $('#paymenttable').DataTable({

        ajax: baseUrl+'/admin/get-all-payments',
        columns: 
                [
                    { data: 'id' },
                    { data: 'member_id' },
                    { data: 'member.fname' },
                    { data: 'member.lname' },
                    { data: 'date' },
                    { data: 'member_payments.payment_type' },
                    { data: 'amount' },
                    {   
                        data: null,
                        className: "center",
                        defaultContent: '<a href="" class="editor_editpayment btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>' +
                                '<a href="" class="remove_payment btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>'
                    }
                ]
        });
    });
    
       // Add Payment
        $('#btnaddpayment').click(function(){
            $('#paymentaddmodal').modal('toggle');
        });

        $('#frmcreatepayment').submit(function(e){
            e.preventDefault();
            $.ajax({
                url: "{{ url('/admin/payments/')}}",
                type: 'POST',
                data: $('#frmcreatepayment').serialize(),
                success: function(response){
                    alert(response.msg);
                    location.reload();
                }
            });
        });


    // Delete Payment Record
    $('#paymenttable').on('click', 'a.remove_payment', function (e) {
        e.preventDefault();

        var data = $('#paymenttable').DataTable().row($(this).parents('tr')).data();
        var paymentId = data.id;

        $.confirm({
            text: "Are you sure?",
            confirm: function() {
              $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                  type: 'DELETE',
                  url: baseUrl+'/admin/payments/'+paymentId,
                  success: function(res){
                      alert(res.msg);
                      setTimeout(function(){
                        location.reload();
                      },2000)
                  }
              })
            },
            cancel: function() {
                // nothing to do.

            }
        });

    });




     // Edit Payment record
     $('#paymenttable').on('click', 'a.editor_editpayment', function (e) {
        e.preventDefault();
        var data = $('#paymenttable').DataTable().row($(this).parents('tr')).data();
        
        $('#editmember_id').val(data.member_id);        
        $('#hdnpaymentid').val(data.id);
        $('#editfname').val(data.member.fname);
        $('#editlname').val(data.member.lname);
        $('#editdate').val(data.date);
        $('#editpayment_type').val(data.member_payments.payment_type);
        $('#editamount').val(data.amount);
        $('#paymenteditmodal').modal('toggle');

        });


        //Edit Payment
        $('#editfrmpayment').submit(function(e){
            e.preventDefault();
                var paymentId = $('#hdnpaymentid').val();

            $.ajax({
                type: 'PUT',
                url: baseUrl+'/admin/payments/'+paymentId,
                data: $('#editfrmpayment').serialize(),
                success: function(response){
                    if(response.success==true){
                        alert(response.msg);
                        setTimeout(function(){
                            location.reload();
                        },2000);
                    }else{
                        alert(response.msg);
                    }
                }

            })
        });



</script>
@endsection

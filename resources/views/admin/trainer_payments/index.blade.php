
@extends('admin.layout.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Trainer Payments Management</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-right">
            <button type="button" class="btn btn-primary" id="btnaddpayment">Add Trainer Payment</button>
        </div>
    </div>
    <div class="row card mt-1">
        <div class="container">
            <div class="col-md-12 ">
                <table id="paymenttable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Trainer ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Date</th>
                            <th>Payment Amount</th>
                            <th>Action</th>
                        </tr>

                    </thead>

                </table>
            </div>
        </div>
    </div>
</div>

@include('admin.trainer_payments.components.trainer-payment-add-modal')
@include('admin.trainer_payments.components.trainer-payment-edit-modal')

@endsection

@section('custom-js')
<script type="text/javascript">
    $(document).ready(function(){

        // Get All Trainers
        $.ajax({
            type: 'GET',
            url: baseUrl+'/admin/get-all-trainers',
            success: function(res){
                var trainerData = res.data;
                // #payment_type
                var html ='';
                html+='<option value="0">Trainer Name</option>';
                for(var x=0; x<trainerData.length; x++){
                    html+='<option value="'+trainerData[x].id+'">'+trainerData[x].id+' '+trainerData[x].fname+' '+trainerData[x].lname+'</option>';
                }
               $('#trainer_id').html(html);
               $('#trainer_id').select2();

            }

        });


        $('#paymenttable').DataTable({
            "pageLength": 15,

        ajax: baseUrl+'/admin/get-all-trainer-payments',
        columns: 
                [
                    { data: 'id' },
                    { data: 'trainer_id' },
                    { data: 'trainer.fname' },
                    { data: 'trainer.lname' },
                    { data: 'date' },
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

        // $('#frmcreatepayment').submit(function(e){
        //     e.preventDefault();
        //     $.ajax({
        //         url: "{{ url('/admin/trainer-payments')}}",
        //         type: 'POST',
        //         data: $('#frmcreatepayment').serialize(),
        //         success: function(response){
        //             // console.log(response.msg);
        //             alert(response.msg);
        //             location.reload();
        //         }
        //     });
        // });

            //Form Validation + Add Trainer Payment
        $(document).ready(function(){
            $('#frmcreatepayment').on('submit',function(e) {
            e.preventDefault(); 
            if ( $('#frmcreatepayment').parsley().isValid() ) {
                $.ajax({
                    url: "{{ url('/admin/trainer-payments')}}",
                    type: 'POST',
                    data: $('#frmcreatepayment').serialize(),
                    success: function(response){
                        // console.log(response.msg);
                        alert(response.msg);
                        location.reload();
                    }
                });
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
                  url: baseUrl+'/admin/trainer-payments/'+paymentId,
                  success: function(res){
                      alert(res.msg);
                      setTimeout(function(){
                        location.reload();
                      },1000)
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
        var paymentTypeId = data.payment_type_id;
        var trainerId = data.trainer_id;


        //  // Get All Trainers
        //  $.ajax({
        //     type: 'GET',
        //     url: baseUrl+'/admin/get-all-trainers',
        //     success: function(res){
        //         var trainerData = res.data;
        //         var html ='';
        //         html+='<option value="0">trainer ID</option>';
        //         for(var x=0; x<trainerData.length; x++){
        //             if(trainerId==trainerData[x].id){
        //                 html+='<option selected value="'+trainerData[x].id+'">'+trainerData[x].id+'</option>';
        //             }else{
        //                 html+='<option value="'+trainerData[x].id+'">'+trainerData[x].id+'</option>';
        //             }
        //         }
        //        $('#edittrainer_id').html(html);
        //     }

        // });
              
        $('#hdnpaymentid').val(data.id);
        $('#edittrainer_id').val(data.trainer.id);
        $('#edittrainer_name').val(data.trainer.id+' - '+data.trainer.fname+' '+data.trainer.lname);
        // $('#editfname').val(data.trainer.fname);
        // $('#editlname').val(data.trainer.lname);
        $('#editdate').val(data.date);
        $('#editamount').val(data.amount);
        $('#paymenteditmodal').modal('toggle');

        });


        // //Edit Payment
        // $('#editfrmpayment').submit(function(e){
        //     e.preventDefault();
        //         var paymentId = $('#hdnpaymentid').val();

        //     $.ajax({
        //         type: 'PUT',
        //         url: baseUrl+'/admin/trainer-payments/'+paymentId,
        //         data: $('#editfrmpayment').serialize(),
        //         success: function(response){
        //             if(response.success==true){
        //                 alert(response.msg);
        //                 setTimeout(function(){
        //                     location.reload();
        //                 },1000);
        //             }else{
        //                 alert(response.msg);
        //             }
        //         }

        //     })
        // });

        //Form Validation + Edit Trainer Payment
        $(document).ready(function(){
            $('#editfrmpayment').on('submit',function(e) {
            e.preventDefault();
            var paymentId = $('#hdnpaymentid').val(); 
            if ( $('#editfrmpayment').parsley().isValid() ) {
                $.ajax({
                type: 'PUT',
                url: baseUrl+'/admin/trainer-payments/'+paymentId,
                data: $('#editfrmpayment').serialize(),
                success: function(response){
                    if(response.success==true){
                        alert(response.msg);
                        setTimeout(function(){
                            location.reload();
                        },1000);
                    }else{
                        alert(response.msg);
                    }
                }

                 })
             }
            });
        });



</script>
@endsection

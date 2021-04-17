@extends('admin.layout.master')
@section('content')
<div class="container">

    <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Payments Reports</h5>
            </div>

            <form data-parsley-validate="" id="frm-payment-reports">
                <div class="modal-body">
                    {{csrf_field()}}
                    <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                <label for="payment_type">Payment Type</label>
                                <select name="payment_type_id"  id="payment_type_id" class="form-control">
                                </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="report_type">Report Type</label>
                                    <select name="report_type"  id="report_type" class="form-control">
                                    <option value="">Detailed Report</option>
                                    <option value="">Summary Report</option>
                                    </select>
                                </div>
                                </div>
                              
                    </div> 
                    <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="date_from">Date From</label>
                                    <input type="date" class="form-control" id="date_from" name="date_from" placeholder="Date From">
                                </div>
                                <div class="col-md-4">
                                    <label for="date_to">Date To</label>
                                    <input type="date" class="form-control" id="date_to" name="date_to" placeholder="Date To">
                                </div>
                                </div>
                              
                    </div> 

                        </div>
                        <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Generate Report</button>
                    <!-- <button type="button" class="btn btn-secondary" id="reset-frm" data-dismiss="modal">Clear</button> -->
                    <input type="button" class="btn btn-success" onclick="generate()" value="Export To PDF" /> 
                </div>
                </div>
            </form>

            
        </div>

<div class="container mt-4">

            <div class="col-md-12 ">
                <table id="payment-report-table" class="table table-bordered">
                    <caption>LIFE FITNESS GYMS - PAYMENTS REPORT</caption>
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

                </table>
            </div>
</div>

@endsection

@section('custom-js')

<script>

        // Get All Payment Types
        $.ajax({
            type: 'GET',
            url: baseUrl+'/admin/get-all-payment-types',
            success: function(res){
                var paymentType = res.data;
                var html ='';
                html+='<option value="0">All Payment Types</option>';
                for(var x=0; x<paymentType.length; x++){
                    html+='<option value="'+paymentType[x].id+'">'+paymentType[x].payment_type+'</option>';
                }
               $('#payment_type_id').html(html);
            }

        });


$('#frm-payment-reports').submit(function(e){

            e.preventDefault();
            var paymentType = $("#payment_type_id").val();
            var dateFrom = $("#date_from").val();
            var dateTo = $("#date_to").val();

            // console.log(paymentType);
            // console.log(date_from);
            // console.log(date_to);


                    $('#payment-report-table').DataTable({

                        ajax: baseUrl+'/admin/get-all-payments',
                        columns: 
                                [
                                    {
                                        "render": function ( data, type, full, meta ) {
                                        return  meta.row + 1;
                                        }
                                    },
                                    { data: 'member_id' },
                                    { 
                                    "data": null, 
                                    render: function (data, type, row) {
                                    var name = row.member.fname + " " + row.member.lname;
                                    return name;
                                    }
                                    },
                                    { data: 'date' },
                                    { data: 'member_payments.payment_type' },
                                    { data: 'amount' }
                                ]
                        });
            //     }
            // });

            // $('#payment-report-table').DataTable({

            // ajax: baseUrl+'/admin/reports-payment-data',
            // columns: 
            //         [
            //             { data: 'id' },
            //             { data: 'member_id' },
            //             { 
            //             "data": null, 
            //             render: function (data, type, row) {
            //             var name = row.fname + " " + row.lname;
            //             return name;
            //              }
            //              },
            //             { data: 'date' },
            //             { data: 'payment_type' },
            //             { data: 'amount' }
            //         ]
            // });
        });


//Export PDF
function generate() {  
    // var doc = new jsPDF('p', 'pt', 'letter');  
    // var htmlstring = '';  
    // var tempVarToCheckPageHeight = 0;  
    // var pageHeight = 0;  
    // pageHeight = doc.internal.pageSize.height;  
    // specialElementHandlers = {  
    //     // element with id of "bypass" - jQuery style selector  
    //     '#bypassme': function(element, renderer) {  
    //         // true = "handled elsewhere, bypass text extraction"  
    //         return true  
    //     }  
    // };  
    // margins = {  
    //     top: 150,  
    //     bottom: 60,  
    //     left: 40,  
    //     right: 40,  
    //     width: 600  
    // };  
    // var y = 20;  
    // doc.setLineWidth(2);  
    // doc.text(200, y = y + 30, "LIFE FITNESS GYMS - PAYMENTS REPORT");  
    // doc.autoTable({  
    //     html: '#payment-report-table',  
    //     startY: 70,  
    //     theme: 'plain',  
    // })  
    // doc.save('Payments_Report.pdf');  
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
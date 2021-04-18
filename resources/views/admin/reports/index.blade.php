@extends('admin.layout.master')
@section('content')

<!-- payment report -->
<div class="container">

    <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Payments Reports</h5>
            </div>

            <form data-parsley-validate="" id="frm-payment-reports" action="{{url('admin/reports-payments-check')}}" method="POST">
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
                                    <option value="" disabled>Summary Report</option>
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
                    <!-- <input type="button" class="btn btn-success" onclick="generate()" value="Export To PDF" />  -->
                </div>
                </div>
            </form>

            
</div>

<!-- attendance report -->
<div class="container">

    <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Attendance Reports</h5>
            </div>

            <form data-parsley-validate="" id="frm-attendance-reports" action="{{url('admin/reports-attendance-check')}}" method="POST">
                <div class="modal-body">
                    {{csrf_field()}}
                    <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                <label for="member_id">Attendee</label>
                                <select name="member_id"  id="attendee" class="form-control">
                                </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="report_type">Report Type</label>
                                    <select name="report_type"  id="report_type" class="form-control">
                                    <option value="">Detailed Report</option>
                                    <option value="" disabled>Summary Report</option>
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
                    <!-- <input type="button" class="btn btn-success" onclick="generate()" value="Export To PDF" />  -->
                </div>
                </div>
            </form>

            
</div>

<!-- member reports -->
<div class="container">

    <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Member Reports</h5>
            </div>

            <form data-parsley-validate="" id="frm-member-reports" action="{{url('admin/reports-member-check')}}" method="POST">
                <div class="modal-body">
                    {{csrf_field()}}
                    <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                <label for="member_id">Member Name</label>
                                <select name="member_id"  id="member_name" class="form-control">
                                </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="report_type">Report Type</label>
                                    <select name="report_type"  id="report_type" class="form-control">
                                    <option value="">Detailed Report</option>
                                    <option value="" disabled>Summary Report</option>
                                    </select>
                                </div>
                                </div>
                              
                    </div> 

                        </div>
                        <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Generate Report</button>
                    <!-- <button type="button" class="btn btn-secondary" id="reset-frm" data-dismiss="modal">Clear</button> -->
                    <!-- <input type="button" class="btn btn-success" onclick="generate()" value="Export To PDF" />  -->
                </div>
                </div>
            </form>

            
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
                html+='<option value= "0" >All Payment Types</option>';
                for(var x=0; x<paymentType.length; x++){
                    html+='<option value="'+paymentType[x].id+'">'+paymentType[x].payment_type+'</option>';
                }
               $('#payment_type_id').html(html);
            }

        });

        // Get All Payment Types
        $.ajax({
            type: 'GET',
            url: baseUrl+'/admin/get-all-members',
            success: function(res){
                var member = res.data;
                var html ='';
                html+='<option value="0">All Members</option>';
                for(var x=0; x<member.length; x++){
                    html+='<option value="'+member[x].id+'">'+member[x].fname+' '+member[x].lname+'</option>';
                }
               $('#attendee').html(html);
               $('#attendee').select2();
               $('#member_name').html(html);
               $('#member_name').select2();
            }

        });

</script>

@endsection
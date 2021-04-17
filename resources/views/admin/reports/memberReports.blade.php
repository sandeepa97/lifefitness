@extends('admin.layout.master')
@section('content')
<div class="container">

    <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Member Reports</h5>
            </div>

            <form data-parsley-validate="" id="frm-member-reports">
                <div class="modal-body">
                    {{csrf_field()}}
                    <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                <label for="member_name">Member Name</label>
                                <select name="member_name"  id="member_name" class="form-control">
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
                <table id="member-report-table" class="table table-bordered">
                    <caption>LIFE FITNESS GYMS - MEMBER REPORT</caption>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>M_ID</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>NIC</th>
                            <th>Address</th>
                            <th>Contact</th>
                            <th>Email</th>
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
            url: baseUrl+'/admin/get-all-members',
            success: function(res){
                var member = res.data;
                var html ='';
                html+='<option value="0">All Members</option>';
                for(var x=0; x<member.length; x++){
                    html+='<option value="'+member[x].id+'">'+member[x].fname+' '+member[x].lname+'</option>';
                }
               $('#member_name').html(html);
               $('#member_name').select2();
            }

        });


$('#frm-member-reports').submit(function(e){

            e.preventDefault();
            $('#member-report-table').DataTable({

            ajax: baseUrl+'/admin/get-all-members',
            columns: 
                    [
                        {
                            "render": function ( data, type, full, meta ) {
                            return  meta.row + 1;
                            }
                        },
                        { data: 'id' },
                        { 
                        "data": null, 
                        render: function (data, type, row) {
                        var name = row.fname + " " + row.lname;
                        return name;
                         }
                        },
                        { data: 'gender' },
                        { data: 'nic' },
                        { data: 'address' },
                        { data: 'contact' },
                        { data: 'email' }
                    ]
            });
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
    doc.text(15, 10, "LIFE FITNESS GYMS - MEMBER REPORT"); 
    doc.autoTable({ 
      html: '#member-report-table', 
      theme: 'plain'
      })
    doc.save('Member_Report.pdf')
}  

</script>

@endsection
@extends('admin.layout.master')
@section('content')
<div class="container">

    <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Mark Attendance</h5>
            </div>

            <form data-parsley-validate="" id="frmattendanceID">
                <div class="modal-body">
                    {{csrf_field()}}
                    <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    
                                    <!-- <input type="text"  class="form-control" id="fname" name="fname" placeholder="Member ID"> -->
                                <select name="member_id"  id="member_id" class="form-control">
                                </select>

                                <!-- hidden inputs -->
                                <input type="hidden" class="form-control" id="member_in_date" name="member_in_date" placeholder="Date In"
                                value="<?php echo date('Y-m-d'); ?>">
                                <input type="hidden" class="form-control" id="member_in_time" name="member_in_time" placeholder="Time In"
                                value="<?php echo date('h:i:s'); ?>">
                                
                                </div>
                                <button type="submit" class="btn btn-primary">ENTER</button>
                            </div> 
                        </div>
                </div>
            </form>
            
            

            <form data-parsley-validate="" id="frmattendanceName">
                <div class="modal-body">
                    {{csrf_field()}}
                    <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- <input type="text"  class="form-control" id="fname" name="fname" placeholder="Member Name"> -->
                                <select name="member_id"  id="member_name" class="form-control">
                                </select>

                                <!-- hidden inputs -->
                                <input type="hidden" class="form-control" id="member_in_date" name="member_in_date" placeholder="Date In"
                                value="<?php echo date('Y-m-d'); ?>">
                                <input type="hidden" class="form-control" id="member_in_time" name="member_in_time" placeholder="Time In"
                                value="<?php echo date('h:i:s'); ?>">
                                </div>
                                <button type="submit" class="btn btn-primary">ENTER</button>
                            </div>
                        </div>
                </div>
                
                    
               
            </form>

            
        </div>


</div>

@endsection

@section('custom-js')

<script>
        //get all members ID
        $.ajax({
            type: 'GET',
            url: baseUrl+'/admin/get-all-members',
            success: function(res){
                var memberData = res.data;
                var html = '';
                html += '<option value="0">Member ID</option>';
                for(var x=0; x<memberData.length; x++){
                    html+='<option value="'+memberData[x].id+'">'+ memberData[x].id+'</option>';
                }
                $('#member_id').html(html);
            }
        });

        //mark attendance ID

        $('#frmattendanceID').submit(function(e){
            e.preventDefault();
            $.ajax({
                url: "{{url('admin/member-attendance')}}",
                type: 'POST',
                data: $('#frmattendanceID').serialize(),
                success: function(response){
                    alert(response.msg);
                    location.reload();
                }
            });
        });


        //get all members ID
        $.ajax({
            type: 'GET',
            url: baseUrl+'/admin/get-all-members',
            success: function(res){
                var memberData = res.data;
                var html = '';
                html += '<option value="0">Member Name</option>';
                for(var x=0; x<memberData.length; x++){
                    html+='<option value="'+memberData[x].id+'">'+ memberData[x].fname+' '+memberData[x].lname+'</option>';
                }
                $('#member_name').html(html);
            }
        });

</script>

@endsection
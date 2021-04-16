@extends('admin.layout.master')
@section('content')
<div class="container">

    <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Member Reports</h5>
            </div>

            <form data-parsley-validate="" id="frmcreatemember">
                <div class="modal-body">
                    {{csrf_field()}}
                    <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="fname">Report Type</label>
                                    <!-- <input type="select"  class="form-control" id="fname" name="fname" placeholder="Member ID"> -->
                                    <select name="fname"  id="fname" class="form-control">
                                    <option value="">Summary Report</option>
                                    <option value="">Detailed Report</option>
                                    <option value="">Reminder</option>
                                    </select>
                                </div>
                                </div>
                              
                                <div class="mt-5 row">
                                <div class="col-md-6">
                                    <label for="fname">Report Content</label>
                                    <select name="fname"  id="fname" class="form-control">
                                    <option value="">Payment Details</option>
                                    <option value="">Member Report</option>
                                    <option value="">Trainer Report</option>
                                    <option value="">Inventory Report</option>
                                    </select>
                                </div>                
                                </div>
                              
                            </div> 
                        </div>
                        <div class="modal-body">
                    <button type="submit" class="btn btn-primary">Generate</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Clear</button>
                </div>
                </div>
            </form>

            
        </div>


</div>


</div>

@endsection
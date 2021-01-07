@extends('admin.layout.master')
@section('content')
<div class="container">

    <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Mark Attendance</h5>
            </div>

            <form data-parsley-validate="" id="frmcreatemember">
                <div class="modal-body">
                    {{csrf_field()}}
                    <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    
                                    <input type="text"  class="form-control" id="fname" name="fname" placeholder="Member ID">
                                </div>
                                <button type="submit" class="btn btn-primary">ENTER</button>
                            </div> 
                        </div>
                </div>
            </form>
            
            

            <form data-parsley-validate="" id="frmcreatemember">
                <div class="modal-body">
                    {{csrf_field()}}
                    <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text"  class="form-control" id="fname" name="fname" placeholder="Member Name">
                                </div>
                                <button type="submit" class="btn btn-primary">ENTER</button>
                            </div>
                        </div>
                </div>
                
                    
               
            </form>

            
        </div>


</div>

@endsection
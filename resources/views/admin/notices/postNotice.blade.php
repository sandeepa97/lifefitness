@extends('admin.layout.master')
@section('content')
<div class="container">

    <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Post Notice</h5>
            </div>

            <form data-parsley-validate="" id="frmcreatemember">
                <div class="modal-body">
                    {{csrf_field()}}
                    <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="fname">Notice Type</label>
                                    <!-- <input type="select"  class="form-control" id="fname" name="fname" placeholder="Member ID"> -->
                                    <select name="fname"  id="fname" class="form-control">
                                    <option value="">Public Notice</option>
                                    <option value="">Special Notice</option>
                                    <option value="">Reminder</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                <label for="fname">Recipient(s)</label>
                                    <!-- <select name="fname"  id="fname" class="form-control">
                                    <option value="">Public Notice</option>
                                    <option value="">Special Notice</option>
                                    <option value="">Reminder</option>
                                    </select> -->
                                    <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Members
                                    </label>
                                    </div>
                                    <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Trainers
                                    </label>
                                    </div>
                                    <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Public
                                    </label>
                                    </div>
                                </div>
                              
                                <div class="col-md-6">
                                    <label for="fname">Subject</label>
                                    <input type="text"  class="form-control" id="fname" name="fname" placeholder="Subject">
                                </div>                
                                <div class="col-md-12">
                                    <label for="fname">Notice</label>
                                    <textarea name="fname" id="" cols="30" rows="6" class="form-control"></textarea>
                                </div>
                                </div>
                              
                            </div> 
                        </div>
                        <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Post</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Clear</button>
                </div>
                </div>
            </form>

            
        </div>


</div>


</div>

@endsection
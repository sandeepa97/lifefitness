<div class="modal fade" id="shifteditmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Trainer Shift</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form data-parsley-validate="" id="frmeditshift">
                <div class="modal-body">
                    {{csrf_field()}}
                    <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="hidden" name="hdn_shift_id" id="hdn_shift_id"/>
                                    <label for="trainer_id">Trainer ID</label>
                                    <!-- <input type="text"  class="form-control" id="member_id" name="member_id" placeholder="Member ID"> -->
                                    <select name="trainer_id"  id="edittrainer_id" class="form-control">
                                    </select>
                                </div>
                                <div class="col-md-6">
                                <label for="shift_date">Shift Date</label>
                                <input type="date" class="form-control" id="editshift_date" name="shift_date" placeholder="Shift Date">
                            </div>
                            </div>
                        </div>
                    <!-- <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="fname">First Name</label>
                         
                                    <select name="fname"  id="editfname" class="form-control">
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="lname">Last Name</label>
                                 
                                    <select name="lname"  id="editlname" class="form-control">
                                    </select>
                                </div>
                            </div>
                    </div> -->
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="shift_start_time">Start Time</label>
                                <input type="time" class="form-control" id="editshift_start_time" name="shift_start_time" placeholder="Start Time">
                            </div>
                            <div class="col-md-6">
                                <label for="shift_end_time">End Time</label>
                                <input type="time" class="form-control" id="editshift_end_time" name="shift_end_time" placeholder="End Time">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                        <div class="col-md-4">
                                <label for="bmi">Shift Type</label>
                                <select name="shift_type_id"  id="editshift_type_id" class="form-control">
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
  </div>

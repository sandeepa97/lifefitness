  <div class="modal fade" id="attendanceeditmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Attendance</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form data-parsley-validate="" id="editfrmattendance">
                <div class="modal-body">
                    {{csrf_field()}}
                    <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="member_id">Member ID</label>
                                    <!-- <input type="text"  class="form-control" id="member_id" name="member_id" placeholder="Member ID"> -->
                                    <select name="member_id"  id="editmember_id" class="form-control">
                                    </select>
                                    <input type="hidden" name="hdnattendance_id" id="hdnattendance_id"/>
                                </div>
                            </div>
                        </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="date">Date In</label>
                                <input type="date" class="form-control" id="editmember_in_date" name="member_in_date" placeholder="Date In" step="any">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="time">Time In</label>
                                <input type="time" class="form-control" id="editmember_in_time" name="member_in_time" placeholder="Time In" step="any">
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

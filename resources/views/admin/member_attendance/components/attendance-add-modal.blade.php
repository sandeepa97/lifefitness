<div class="modal fade" id="attendanceaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Mark Attendance</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form data-parsley-validate="" id="frmcreateattendance">
                <div class="modal-body">
                    {{csrf_field()}}
                    <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="member_id">Member ID</label>
                                    <!-- <input type="text"  class="form-control" id="member_id" name="member_id" placeholder="Member ID"> -->
                                    <select name="member_id"  id="member_id" class="form-control">
                                    </select>
                                </div>
                            </div>
                        </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="date">Date In</label>
                                <input type="date" class="form-control" id="member_in_date" name="member_in_date" placeholder="Date In">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="time">Time In</label>
                                <input type="time" class="form-control" id="member_in_time" name="member_in_time" placeholder="Time In">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Mark Attendance</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
  </div>

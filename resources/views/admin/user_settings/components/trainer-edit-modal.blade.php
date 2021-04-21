<div class="modal fade" id="trainereditmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modify Trainer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form data-parsley-validate="" id="editfrmtrainer">
                <div class="modal-body">
                    {{csrf_field()}}
                    <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text"  class="form-control" id="editfname" name="fname" placeholder="First Name" readonly>
                                </div>
                                <input type="hidden" name="hdntrainerid" id="hdntrainerid"/>
                                <div class="col-md-6">
                                    <input type="text"  class="form-control" id="editlname" name="lname" placeholder="Last Name" readonly>
                                </div>
                            </div>
                        </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="password">Password</label>
                                <input type="password" class="form-control"  name="password" id="password" placeholder="Password"/>
                            </div>
                            <div class="col-md-6">
                                <label for="confirm">Confirm Password</label>
                                <input type="password" class="form-control" name="confirm" id="confirm" placeholder="Confirm Password"/>
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

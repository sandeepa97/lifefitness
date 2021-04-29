<div class="modal fade" id="clientaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Online Client</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form data-parsley-validate="" id="frmcreateclient">
                <div class="modal-body">
                    {{csrf_field()}}
                    <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="fname">First Name</label>
                                    <input type="text"  class="form-control" id="fname" name="fname" placeholder="First Name" required data-parsley-pattern="[a-zA-Z ]+$" data-parsley-trigger="keyup">
                                </div>
                                <div class="col-md-6">
                                    <label for="lname">Last Name</label>
                                    <input type="text"  class="form-control" id="lname" name="lname" placeholder="Last Name" required data-parsley-pattern="[a-zA-Z ]+$" data-parsley-trigger="keyup">
                                </div>
                            </div>
                        </div>
                    <div class="form-group">
                        <div class="row">
                        <div class="col-md-6">
                                <label for="gender">Gender</label>
                                <select name="gender"  id="gender" class="form-control">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="location">Location</label>
                                <input type="text" class="form-control" id="location" name="location" placeholder="Location" required data-parsley-trigger="keyup">
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="contact">Contact</label>
                                <input type="text" name="contact" id="contact" class="form-control" placeholder="Contact" required data-parsley-pattern="[0-9]+$" data-parsley-length="[10,13]" data-parsley-trigger="keyup"/>
                            </div>
                            <div class="col-md-6">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email" required data-parsley-type="email" data-parsley-trigger="keyup"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="online_coach_package_id">Coach Package</label>
                                <select name="online_coach_package_id"  id="online_coach_package_id" class="form-control">
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Register</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
  </div>

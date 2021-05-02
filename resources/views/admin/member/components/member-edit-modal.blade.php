<div class="modal fade" id="membereditmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modify Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form data-parsley-validate="" id="editfrmmember">
                <div class="modal-body">
                    {{csrf_field()}}
                    <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="fname">First Name</label>
                                    <input type="text"  class="form-control" id="editfname" name="fname" placeholder="First Name" required data-parsley-pattern="[a-zA-Z ]+$" data-parsley-trigger="keyup">
                                </div>
                                <input type="hidden" name="hdnmemberid" id="hdnmemberid"/>
                                <div class="col-md-6">
                                    <label for="lname">Last Name</label>
                                    <input type="text"  class="form-control" id="editlname" name="lname" placeholder="Last Name" required data-parsley-pattern="[a-zA-Z ]+$" data-parsley-trigger="keyup">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                        <div class="row">
                        <div class="col-md-4">
                                <label for="gender">Gender</label>
                                <select name="gender"  id="editgender" class="form-control">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="nic">NIC</label>
                                <input type="text" class="form-control" id="editnic" name="nic" placeholder="NIC" required data-parsley-pattern="[0-9 V]+$" data-parsley-length="[10,12]" data-parsley-trigger="keyup">
                            </div>
                            <div class="col-md-4">
                                <label for="Address">Address</label>
                                <input type="text" class="form-control" id="editaddress" name="address" placeholder="Address" required data-parsley-pattern="[a-zA-Z 0-9 ,]+$" data-parsley-trigger="keyup">
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="contact">Contact</label>
                                <input type="text" name="contact" id="editcontact" class="form-control" placeholder="Contact" required data-parsley-pattern="[0-9]+$" data-parsley-length="[10,13]" data-parsley-trigger="keyup"/>
                            </div>
                            <div class="col-md-6">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="editemail" class="form-control" placeholder="Email" required data-parsley-type="email" data-parsley-trigger="keyup"/>
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

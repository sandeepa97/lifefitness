<div class="modal fade" id="memberaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create New Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- 
            <div class="bs-callout bs-callout-warning d-none">
            <h4>Oh snap!</h4>
            <p>This form seems to be invalid</p>
            </div>
            <div class="bs-callout bs-callout-info d-none">
            <h4>Yay!</h4>
            <p>Everything seems to be ok</p>
            </div> -->

            <form id="frmcreatemember" data-parsley-validate="">
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
                        <div class="col-md-4">
                                <label for="gender">Gender</label>
                                <select name="gender"  id="gender" class="form-control">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="nic">NIC</label>
                                <input type="text" class="form-control" id="nic" name="nic" placeholder="NIC" required data-parsley-pattern="[0-9 V]+$" data-parsley-length="[10,12]" data-parsley-trigger="keyup">
                            </div>
                            <div class="col-md-4">
                                <label for="Address">Address</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="Address" required data-parsley-pattern="[a-zA-Z ,]+$" data-parsley-trigger="keyup">
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
                                <label for="password">Password</label>
                                <input type="password" class="form-control"  name="password" id="password" placeholder="Password" required data-parsley-length="[6,16]" data-parsley-trigger="keyup"/>
                            </div>
                            <div class="col-md-6">
                                <label for="confirm">Confirm Password</label>
                                <input type="password" class="form-control" name="confirm" id="confirm" placeholder="Confirm Password" required data-parsley-equalto="#password" data-parsley-trigger="keyup"/>
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

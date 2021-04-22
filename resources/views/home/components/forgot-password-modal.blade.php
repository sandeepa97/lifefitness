<div class="modal fade" id="forgotaddmodal" style="opacity:0.7 !important;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Forgot Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form data-parsley-validate="" id="frmforgotpwd" action = {{url('home/forgot-password')}} method="POST">
                <div class="modal-body">
                    {{csrf_field()}}
                    <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="fname">Member ID / Trainer ID</label>
                                    <input type="text"  class="form-control" id="user_id" name="user_id" placeholder="First Name">
                                </div>
                            </div>
                        </div>
                    <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="fname">First Name</label>
                                    <input type="text"  class="form-control" id="fname" name="fname" placeholder="First Name">
                                </div>
                                <div class="col-md-6">
                                    <label for="lname">Last Name</label>
                                    <input type="text"  class="form-control" id="lname" name="lname" placeholder="Last Name">
                                </div>
                            </div>
                        </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="nic">NIC</label>
                                <input type="text" class="form-control" id="nic" name="nic" placeholder="NIC">
                            </div>
                            <div class="col-md-6">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Send</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
  </div>

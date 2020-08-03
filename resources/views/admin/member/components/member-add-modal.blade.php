<div class="modal fade" id="useraddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create New Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form data-parsley-validate="" id="frmcreateuser">
                <div class="modal-body">
                    {{csrf_field()}}
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
                                <label for="emailW">Username</label>
                                <input type="text" class="form-control"  data-parsley-minlength="4" id="txtusernames" name="txtusernames" placeholder="Username">
                            </div>
                            <div class="col-md-4">
                                <label for="emailW">Email</label>
                                <input type="email" data-parsley-type="email"  class="form-control" id="email" name="email" placeholder="Email">
                            </div>
                            <div class="col-md-4">
                                <label for="user_role">User Type</label>
                                <select name="user_role"  id="user_role" class="form-control">
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">


                            <div class="col-md-4">
                                <label for="telephone">Mobile</label>
                                <input type="text" name="telephone" id="telephone" class="form-control"/>

                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="password">Password</label>
                                <input type="password" data-parsley-pattern-message="Your password must contain at least (1) lowercase, (1) uppercase letter, (1) number and (1) special character" data-parsley-pattern="(?=.*[!@#$%^&*()\-_=+{};:,<.>ยง~])(?=.*[a-z])(?=.*[0-9])(?=.*[A-Z]).*"  class="form-control"  name="txtpasswords" id="txtpasswords" />
                            </div>
                            <div class="col-md-6">
                                <label for="confirm">Confirm Password</label>
                                <input type="password"  data-parsley-equalto="#txtpasswords"  class="form-control" name="confirm" id="confirm" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="text-danger text-justify">
                                <em><small>Note : The password field must contain at least one upper case letter, one lower case letter, one number and one symbol.</small></em>
                            </label>
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

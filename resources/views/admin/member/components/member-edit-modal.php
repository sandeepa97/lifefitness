<div class="modal fade" id="usereditmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modify User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form data-parsley-validate="" id="editfrmuser">
                <div class="modal-body">
                    {{csrf_field()}}
                    <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="fname">First Name</label>
                                    <input type="text"  class="form-control" id="editfname" name="fname" placeholder="First Name">
                                </div>
                                <input type="hidden" name="hdnuserid" id="hdnuserid"/>
                                <div class="col-md-6">
                                    <label for="lname">Last Name</label>
                                    <input type="text"  class="form-control" id="editlname" name="lname" placeholder="Last Name">
                                </div>
                            </div>
                        </div>
                    <div class="form-group">
                        <div class="row">

                            <div class="col-md-6">
                                <label for="emailW">Email</label>
                                <input type="email" data-parsley-type="email"  class="form-control" id="editemail" name="email" placeholder="Email">
                            </div>
                            <div class="col-md-6">
                                <label for="user_role">User Type</label>
                                <select name="user_role"  id="edituser_role" class="form-control">
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">


                            <div class="col-md-4">
                                <label for="telephone">Mobile</label>
                                <input type="text" name="telephone" id="edittelephone" class="form-control"/>

                            </div>

                        </div>
                    </div>





                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
  </div>

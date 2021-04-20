<div class="modal fade" id="paymenteditmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form data-parsley-validate="" id="editfrmpayment">
                <div class="modal-body">
                    {{csrf_field()}}
                
                    <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="trainer">Trainer ID</label>
                                    <!-- <input type="text"  class="form-control" id="edittrainer" name="trainer" placeholder="Member ID"> -->
                                    <select name="trainer_id"  id="edittrainer_id" class="form-control">
                                    </select>
                                </div>
                                <input type="hidden" name="hdnpaymentid" id="hdnpaymentid"/>
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
                            <div class="col-md-4">
                                <label for="date">Date</label>
                                <input type="date" class="form-control" id="editdate" name="date" placeholder="Date">
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="amount">Payment Amount</label>
                                <input type="text" name="amount" id="editamount" class="form-control" placeholder="Payment Amount"/>
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

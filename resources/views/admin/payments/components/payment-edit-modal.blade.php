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
                                    <label for="member_id">Member ID</label>
                                    <!-- <input type="text"  class="form-control" id="editmember_id" name="member_id" placeholder="Member ID"> -->
                                    <select name="member_id"  id="editmember_id" class="form-control" style="width: 75%" readonly="readonly">
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
                                <input type="date" class="form-control" id="editdate" name="date" placeholder="Date" readonly="readonly">
                            </div>
                            <div class="col-md-4">
                                <label for="payment_type">Payment Type</label>
                                <select name="payment_type_id"  id="editpayment_type_id" class="form-control">
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="amount">Payment Amount</label>
                                <input type="text" name="amount" id="editamount" class="form-control" placeholder="Payment Amount" required data-parsley-pattern="[0-9 .]+$" data-parsley-trigger="keyup"/>
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

<div class="modal fade" id="paymentaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Make New Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form data-parsley-validate="" id="frmcreatepayment">
                <div class="modal-body">
                    {{csrf_field()}}
                    <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="trainer_id">Trainer Name</label> <br>
                                    <!-- <input type="text"  class="form-control" id="trainer_id" name="trainer_id" placeholder="trainer ID"> -->
                                    <select name="trainer_id"  id="trainer_id" class="form-control" style="width: 75%">
                                    </select>
                                </div>
                            </div>
                        </div>
                    <!-- <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="fname">First Name</label>
                         
                                    <select name="fname"  id="fname" class="form-control">
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="lname">Last Name</label>
                                 
                                    <select name="lname"  id="lname" class="form-control">
                                    </select>
                                </div>
                            </div>
                    </div> -->
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="date">Date</label>
                                <input type="date" class="form-control" id="date" name="date" placeholder="Date"
                                    value="<?php echo date('Y-m-d'); ?>" readonly="readonly">
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="amount">Payment Amount</label>
                                <input type="text" name="amount" id="amount" class="form-control" placeholder="Payment Amount" required data-parsley-pattern ="[0-9]+$" data-parsley-trigger="keyup"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add Payment</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
  </div>

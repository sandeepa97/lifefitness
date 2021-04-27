<div class="modal fade" id="inventoryaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Equipment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form data-parsley-validate="" id="frmcreateinventory">
                <div class="modal-body">
                    {{csrf_field()}}
                    <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="item_name">Equipment Name</label>
                                    <input type="text"  class="form-control" id="item_name" name="item_name" placeholder="Equipment Name" required>

                                </div>
                                <div class="col-md-6">
                                    <label for="item_category_id">Equipment Category</label>
                                    <select name="item_category_id"  id="item_category_id" class="form-control">
                                    </select>
                                </div>
                            </div>
                        </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="quantity">Quantity</label>
                                <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Quantity" required data-parsley-pattern="[0-9]+$" data-parsley-length="[1,3]" >
                            </div>
                            <div class="col-md-6">
                                <label for="service_date">Service Date</label>
                                <input type="date" class="form-control" id="service_date" name="service_date" placeholder="Service Date">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                        <div class="col-md-6">
                                <label for="manufacturer">Manufacturer</label>
                                <input type="text" class="form-control" id="manufacturer" name="manufacturer" placeholder="Manufacturer" required>
                            </div>
                        <div class="col-md-6">
                                <label for="manufacturer_contact">Manufacturer Contact</label>
                                <input type="text" class="form-control" id="manufacturer_contact" name="manufacturer_contact" placeholder="Manufacturer Contact" required data-parsley-pattern="[0-9]+$" data-parsley-length="[10,13]"> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add Equipment</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
  </div>

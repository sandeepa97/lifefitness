<div class="modal fade" id="storeeditmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form data-parsley-validate="" id="frmeditstore">
                <div class="modal-body">
                    {{csrf_field()}}
                    <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="hidden" name="hdnstoreid" id="hdnstoreid"/>
                                    <label for="item_name">Item Name</label>
                                    <input type="text"  class="form-control" id="edititem_name" name="item_name" placeholder="Item Name" required data-parsley-trigger="keyup">

                                </div>
                                <div class="col-md-6">
                                    <label for="item_category_id">Item Category</label>
                                    <select name="item_category_id"  id="edititem_category_id" class="form-control">
                                    </select>
                                </div>
                            </div>
                        </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="quantity">Description</label>
                                <input type="text" class="form-control" id="edititem_description" name="item_description" placeholder="Description" required data-parsley-trigger="keyup">
                            </div>
                            <div class="col-md-6">
                            <label for="manufacturer">Manufacturer</label>
                                <input type="text" class="form-control" id="editmanufacturer" name="manufacturer" placeholder="Manufacturer" required data-parsley-trigger="keyup">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                        <div class="col-md-6">
                                <label for="price">Price</label>
                                <input type="text" class="form-control" id="editprice" name="price" placeholder="Price" required data-parsley-pattern="[0-9 .]+$" data-parsley-trigger="keyup">
                            </div>
                        <!-- <div class="col-md-6">
                                <label for="img_url">Image</label>
                                <input type="file" class="btn-warning" id="editimg_url" name="img_url" placeholder="Image">
                            </div> -->

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add Item</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
  </div>






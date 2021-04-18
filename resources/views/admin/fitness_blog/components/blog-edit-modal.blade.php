<div class="modal fade" id="blogeditmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Blog</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form data-parsley-validate="" id="frmeditblog">
                <div class="modal-body">
                    {{csrf_field()}}
                    <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                <input type="hidden" name="hdnblogid" id="hdnblogid"/>
                                    <label for="blog_type">Blog Type</label>
                                    <select name="blog_type_id"  id="editblog_type_id" class="form-control">
                                    </select>
                                </div>
                            </div>
                    </div>
                    <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="blog_subject">Subject</label>
                                    <input type="text" name="blog_subject" id="editblog_subject" class="form-control" placeholder="Blog Subject"/>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="blog_content">Content</label>
                                    <textarea name="blog_content" id="editblog_content" cols="30" rows="6" class="form-control"></textarea>
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






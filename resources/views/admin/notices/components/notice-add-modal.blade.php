<div class="modal fade" id="noticeaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Post Notice</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form data-parsley-validate="" id="frmcreatenotice">
                <div class="modal-body">
                    {{csrf_field()}}
                    <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="notice_subject">Subject</label>
                                    <input type="text" name="notice_subject" id="notice_subject" class="form-control" placeholder="Notice Subject"/>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="notice_content">Content</label>
                                    <textarea name="notice_content" id="notice_content" cols="30" rows="6" class="form-control"></textarea>
                                    <!-- <input type="text" name="notice_content" id="notice_content"  class="form-control"> -->
                                </div>
                            </div>
                        </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="notice_date">Date</label>
                                <input type="date" class="form-control" id="notice_date" name="notice_date" placeholder="Publish Date" 
                                step = "any">
                                <!-- value="<?php //echo date('Y-m-d'); ?>" -->
                            </div>
                            <div class="col-md-4">
                                <label for="time">Time</label>
                                <input type="time" class="form-control" id="notice_time" name="notice_time" placeholder="Publish Time"
                                step = "any">
                                <!-- value="<?php //echo date('h:i:s'); ?>" -->
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="notice_type">Notice Type</label>
                                    <select name="notice_type_id"  id="notice_type_id" class="form-control">
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="recipient">Recipient</label>
                                    <select name="recipients_id"  id="recipients_id" class="form-control">
                                    </select>
                                </div>
                            </div>
          
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Post Notice</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
  </div>

<div class="modal fade" id="scheduleaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Workout Schedule</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form data-parsley-validate="" id="frmcreateschedule">
                <div class="modal-body">
                    {{csrf_field()}}
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                            <label for="schedule_type_id">Schedule Name</label>
                                    <select name="schedule_type_id"  id="schedule_type_id" class="form-control">
                                    </select>
                            </div>
                            <div class="col-md-6">
                            <label for="exercise_id">Exercise Name</label>
                                    <select name="exercise_id"  id="exercise_id" class="form-control">
                                    </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="reps">Reps</label>
                                <input type="text" class="form-control" id="reps" name="reps" placeholder="Reps">
                            </div>
                            <div class="col-md-6">
                                <label for="sets">Sets</label>
                                <input type="text" class="form-control" id="sets" name="sets" placeholder="Sets">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add Schedule</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
  </div>

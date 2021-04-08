<?php

namespace App\Repositories;

use App\Repositories\Contract\WorkoutScheduleRepositoryInterface;
use App\WorkoutSchedule;
use Auth;

class WorkoutScheduleRepository implements WorkoutScheduleRepositoryInterface
{

    public function fetchAll()
    {
    //    return WorkoutSchedule::all();
        return WorkoutSchedule::with(['workoutScheduleType','exercises'])->get();
    }

    public function fetch($id)
    {
    }

    public function create($data)
    {
        return WorkoutSchedule::create($data);
    }
    public function update($data, $id)
    {

        // $WorkoutSchedules = WorkoutSchedule::find($id);
        // $WorkoutSchedules->WorkoutSchedule_subject = $data['WorkoutSchedule_subject'];
        // $WorkoutSchedules->WorkoutSchedule_content = $data['WorkoutSchedule_content'];
        // $WorkoutSchedules->WorkoutSchedule_date = $data['WorkoutSchedule_date'];
        // $WorkoutSchedules->WorkoutSchedule_time = $data['WorkoutSchedule_time'];
        // $WorkoutSchedules->WorkoutSchedule_type_id = $data['WorkoutSchedule_type_id'];
        // $WorkoutSchedules->recipients_id = $data['recipients_id'];
        // $WorkoutSchedules->save();
        // return $WorkoutSchedules;

    }

    public function delete($id)
    {
        return WorkoutSchedule::where('id', $id)->delete();
    }
}

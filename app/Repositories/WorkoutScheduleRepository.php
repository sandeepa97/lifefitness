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

        $workoutSchedules = WorkoutSchedule::find($id);
        $workoutSchedules->schedule_type_id = $data['schedule_type_id'];
        $workoutSchedules->exercise_id = $data['exercise_id'];
        $workoutSchedules->reps = $data['reps'];
        $workoutSchedules->sets = $data['sets'];
        $workoutSchedules->save();
        return $workoutSchedules;

    }

    public function delete($id)
    {
        return WorkoutSchedule::where('id', $id)->delete();
    }
}

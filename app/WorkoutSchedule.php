<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkoutSchedule extends Model
{
    protected $table = 'workout_schedules';

    protected $fillable = ['schedule_type_id','exercise_id','reps','sets'];

    public function workoutScheduleType()
    {
        return $this->belongsTo(WorkoutScheduleType::class,'schedule_type_id','id');
    }
    public function exercises()
    {
        return $this->belongsTo(Exercise::class,'exercise_id','id');
    }
}

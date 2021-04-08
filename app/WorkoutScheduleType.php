<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkoutScheduleType extends Model
{
    protected $table = 'workout_Schedule_types';

    protected $fillable = ['schedule_type'];

    public function schedules()
    {
        return $this->hasMany(WorkoutSchedule::class,'schedule_type_id','id');
    }

}

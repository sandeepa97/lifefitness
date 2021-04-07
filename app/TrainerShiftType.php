<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainerShiftType extends Model
{
    protected $table = 'trainer_shifts_type';

    public function trainerShifts()
    {
        return $this->hasMany(TrainerShift::class,'shift_type_id','id');
    }
}

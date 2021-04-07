<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainerShift extends Model
{
    protected $table = 'trainer_shifts';

    protected $fillable = ['trainer_id','shift_date','shift_start_time','shift_end_time','shift_type_id'];

    public function trainers()
    {
        return $this->belongsTo(Trainer::class,'trainer_id','id');
    }
    public function trainerShiftTypes()
    {
        return $this->belongsTo(TrainerShiftType::class,'shift_type_id','id');
    }
}

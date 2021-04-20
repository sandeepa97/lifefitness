<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainerPayment extends Model
{
    protected $fillable = ['trainer_id','date','amount','created_by','updated_by'];

    public function trainer()
    {
        return $this->belongsTo(Trainer::class,'trainer_id','id');
    }

}

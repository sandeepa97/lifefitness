<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainerFeedback extends Model
{
    protected $table = 'trainer_feedbacks';

    protected $fillable = ['trainer_id','feedback_subject','feedback_content', 'feedback_date', 'feedback_time'];

    public function trainer()
    {
        return $this->belongsTo(Trainer::class,'trainer_id','id');
    }
}

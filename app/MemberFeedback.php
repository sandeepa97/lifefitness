<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberFeedback extends Model
{
    protected $table = 'member_feedbacks';

    protected $fillable = ['member_id','feedback_subject','feedback_content', 'feedback_date', 'feedback_time'];

    public function member()
    {
        return $this->belongsTo(Member::class,'member_id','id');
    }

}

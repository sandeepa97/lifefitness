<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $fillable = ['notice_subject','notice_content','notice_date','notice_time','notice_type_id','recipients_id'];

    public function noticeType()
    {
        return $this->belongsTo(NoticeType::class,'notice_type_id','id');
    }
    public function noticeRecipient()
    {
        return $this->belongsTo(NoticeRecipient::class,'recipients_id','id');
    }
}

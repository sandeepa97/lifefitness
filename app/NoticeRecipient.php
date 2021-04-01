<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NoticeRecipient extends Model
{
    protected $table = 'notice_recipients';

    protected $primaryKey = 'id';

    protected $guarded = [];

    public function notices()
    {
        return $this->hasMany(Notice::class,'recipients_id','id');
    }
}

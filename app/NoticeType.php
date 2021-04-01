<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NoticeType extends Model
{
    protected $table = 'notices_type';

    protected $primaryKey = 'id';

    protected $guarded = [];

    public function notices()
    {
        return $this->hasMany(Notice::class,'notice_type_id','id');
    }
}

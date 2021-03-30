<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberAttendance extends Model
{
    protected $fillable = ['member_id','member_in_date','member_in_time','created_by','updated_by'];

    public function member()
    {
        return $this->belongsTo(Member::class,'member_id','id');
    }
}

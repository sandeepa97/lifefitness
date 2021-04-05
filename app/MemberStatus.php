<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberStatus extends Model
{
    protected $table = 'member_status';

    protected $fillable = ['member_id', 'height_cm', 'weight_kg', 'bmi', 'member_status_type_id'];

    public function member()
    {
        return $this->belongsTo(Member::class,'member_id','id');
    }
    public function memberStatusType()
    {
        return $this->belongsTo(MemberStatusType::class,'member_status_type_id','id');
    }
}

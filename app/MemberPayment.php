<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberPayment extends Model
{
    public function member()
    {
        return $this->belongsTo(Member::class,'member_id','id');
    }
    public function memberPayments()
    {
        return $this->belongsTo(PaymentType::class,'payment_type_id','id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
       /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    public function memberPayments()
    {
        return $this->hasMany(MemberPayment::class, 'member_id','id');
    }

    public function members()
    {
        return $this->hasMany(Member::class,'payment_type_id','id');
    }

}

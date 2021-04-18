<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentType extends Model
{


        /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'payments_type';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    public function payments()
    {
        return $this->hasMany(MemberPayment::class,'payment_type_id','id');
    }
}

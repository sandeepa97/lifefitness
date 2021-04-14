<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OnlineCoach extends Model
{
    protected $table = 'online_coach';

    protected $fillable = ['fname','lname','gender','location','contact','email','online_coach_package_id'];

    public function coachPackage()
    {
        return $this->belongsTo(OnlineCoachPackage::class,'online_coach_package_id','id');
    }
}

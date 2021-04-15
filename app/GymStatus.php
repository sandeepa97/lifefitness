<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GymStatus extends Model
{
    protected $table = 'gym_status';

    protected $fillable = ['current_status', 'current_trainer'];
}

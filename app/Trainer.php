<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Trainer extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['fname','lname','gender','nic','address','contact','email','password','created_by','updated_by'];
}

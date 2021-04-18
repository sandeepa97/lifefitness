<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    protected $fillable = ['fname','lname','gender','nic','address','contact','email','password','created_by','updated_by'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FitnessBlog extends Model
{
    protected $table = 'fitness_blog';

    public function blogType()
    {
        return $this->belongsTo(FitnessBlogType::class,'blog_type_id','id');
    }
}

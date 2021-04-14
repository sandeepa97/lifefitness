<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FitnessBlog extends Model
{
    protected $table = 'fitness_blog';

    protected $fillable = ['blog_type_id','blog_subject','blog_content'];

    public function blogType()
    {
        return $this->belongsTo(FitnessBlogType::class,'blog_type_id','id');
    }
}

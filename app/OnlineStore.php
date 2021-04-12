<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OnlineStore extends Model
{
    protected $table = 'online_store';

    public function itemCategory()
    {
        return $this->belongsTo(OnlineStoreItemCategory::class,'item_category_id','id');
    }
}

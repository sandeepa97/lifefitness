<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OnlineStore extends Model
{
    protected $table = 'online_store';

    protected $fillable = ['item_name', 'item_category_id', 'item_description', 'manufacturer', 'price'
    // , 'img_url'
    ];

    public function itemCategory()
    {
        return $this->belongsTo(OnlineStoreItemCategory::class,'item_category_id','id');
    }
}

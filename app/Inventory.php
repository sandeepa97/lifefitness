<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $table = 'inventory';

    protected $primaryKey = 'id';

    public function itemCategory()
    {
        return $this->belongsTo(InventoryItemCategory::class,'item_category_id','id');
    }
}

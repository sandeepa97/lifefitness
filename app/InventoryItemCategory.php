<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventoryItemCategory extends Model
{
    protected $table = 'inventory_item_category';

    protected $primaryKey = 'id';

    protected $guarded = [];

    public function inventory()
    {
        return $this->hasMany(Inventory::class,'item_category_id','id');
    }
}

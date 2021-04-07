<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $table = 'inventory';

    protected $fillable = ['item_name', 'item_category_id', 'quantity', 'service_date', 'manufacturer', 'manufacturer_contact', 'created_by', 'updated_by'];

    public function itemCategory()
    {
        return $this->belongsTo(InventoryItemCategory::class,'item_category_id','id');
    }
}

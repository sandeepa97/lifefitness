<?php

namespace App\Repositories;

use App\Repositories\Contract\InventoryRepositoryInterface;
use App\Inventory;
use Auth;

class InventoryRepository implements InventoryRepositoryInterface
{

    public function fetchAll()
    {
        // return Inventory::all();
        return Inventory::with(['itemCategory'])->get();
    }

    public function fetch($id)
    {
    }

    public function create($data)
    {
        return Inventory::create($data);
    }
    public function update($data, $id)
    {
        $inventory = Inventory::find($id);
        $inventory->item_name = $data['item_name'];
        $inventory->item_category_id = $data['item_category_id'];
        $inventory->quantity = $data['quantity'];
        $inventory->service_date = $data['service_date'];
        $inventory->manufacturer = $data['manufacturer'];
        $inventory->manufacturer_contact = $data['manufacturer_contact'];
        $inventory->updated_by = Auth::id();
        $inventory->save();
        return $inventory;
    }

    public function delete($id)
    {
        return Inventory::where('id', $id)->delete();
    }
}

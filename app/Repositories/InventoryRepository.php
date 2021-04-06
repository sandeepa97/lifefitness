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
        // $inventory = Inventory::find($id);
        // $Inventory->fname = $data['fname'];
        // $inventory->lname = $data['lname'];
        // $inventory->gender = $data['gender'];
        // $inventory->nic = $data['nic'];
        // $inventory->address = $data['address'];
        // $members->contact = $data['contact'];
        // $members->email = $data['email'];
        // $members->updated_by = Auth::id();
        // $members->save();
        // return $members;
    }

    public function delete($id)
    {
        return Inventory::where('id', $id)->delete();
    }
}

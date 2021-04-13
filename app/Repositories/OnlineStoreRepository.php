<?php

namespace App\Repositories;

use App\Repositories\Contract\OnlineStoreRepositoryInterface;
use App\OnlineStore;
use Auth;

class OnlineStoreRepository implements OnlineStoreRepositoryInterface
{

    public function fetchAll()
    {
        // return OnlineStore::all();
        return OnlineStore::with(['itemCategory'])->get();
    }

    public function fetch($id)
    {
    }

    public function create($data)
    {
        return OnlineStore::create($data);
    }
    public function update($data, $id)
    {
        $onlineStore = OnlineStore::find($id);
        $onlineStore->item_name = $data['item_name'];
        $onlineStore->item_category_id = $data['item_category_id'];
        $onlineStore->item_description = $data['item_description'];
        $onlineStore->manufacturer = $data['manufacturer'];
        $onlineStore->price = $data['price'];
        // $onlineStore->img_url = $data['img_url'];
        $onlineStore->save();
        return $onlineStore;
    }

    public function delete($id)
    {
        return OnlineStore::where('id', $id)->delete();
    }
}

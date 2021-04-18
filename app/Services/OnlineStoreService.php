<?php

namespace App\Services;

use App\Repositories\Contract\OnlineStoreRepositoryInterface;
use App\Services\Contract\ServiceInterface;
use App\OnlineStore;
use Auth;

class OnlineStoreService implements ServiceInterface
{

    protected $onlineStoreRepository;
    function __construct(OnlineStoreRepositoryInterface $onlineStoreRepository)
    {
        $this->onlineStoreRepository = $onlineStoreRepository;
    }
    public function fetchAll()
    {
        $onlineStore = $this->onlineStoreRepository->fetchAll();

        return $onlineStore;
    }

    /**
     * Fetch User by ID
     *
     * @param [type] $id
     * @return void
     */
    public function fetch($id)
    {
    }

    /**
     * Create new user
     *
     * @param [type] $data
     * @return void
     */
    public function store($data)
    {
        $array = [
            'item_name' => $data['item_name'],
            'item_category_id' => $data['item_category_id'],
            'item_description' => $data['item_description'],
            'manufacturer' => $data['manufacturer'],
            'price' => $data['price'],
            // 'img_url' => $data['img_url'],
        ];
        return $this->onlineStoreRepository->create($array);
    }

    /**
     * Update existing user
     *
     * @param [type] $data
     * @param [type] $id
     * @return void
     */
    public function update($data, $id)
    {
        return $this->onlineStoreRepository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->onlineStoreRepository->delete($id);
    }
}

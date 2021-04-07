<?php

namespace App\Services;

use App\Repositories\Contract\InventoryRepositoryInterface;
use App\Services\Contract\ServiceInterface;
use App\Inventory;
use Auth;

class InventoryService implements ServiceInterface
{

    protected $inventoryRepository;
    function __construct(InventoryRepositoryInterface $inventoryRepository)
    {
        $this->inventoryRepository = $inventoryRepository;
    }
    public function fetchAll()
    {
        $inventory = $this->inventoryRepository->fetchAll();

        return $inventory;
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
            'quantity' => $data['quantity'],
            'service_date' => $data['service_date'],
            'manufacturer' => $data['manufacturer'],
            'manufacturer_contact' => $data['manufacturer_contact'],
            'created_by' =>Auth::id(),
            'updated_by' =>Auth::id(),
        ];
        return $this->inventoryRepository->create($array);
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
        return $this->inventoryRepository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->inventoryRepository->delete($id);
    }
}

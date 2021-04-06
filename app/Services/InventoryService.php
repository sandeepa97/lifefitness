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
        // $array = [
        //     'fname' => $data['fname'],
        //     'lname' => $data['lname'],
        //     'gender' => $data['gender'],
        //     'nic' => $data['nic'],
        //     'address' => $data['address'],
        //     'contact' => $data['contact'],
        //     'email' => $data['email'],
        //     'password'=>bcrypt($data['password']),
        //     'created_by' =>Auth::id(),
        //     'updated_by' =>Auth::id(),
        // ];
        // return $this->inventoryRepository->create($array);
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

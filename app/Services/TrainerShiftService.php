<?php

namespace App\Services;

use App\Repositories\Contract\RepositoryInterface;
use App\Services\Contract\ServiceInterface;
use App\TrainerShift;
use Auth;

class TrainerShiftService implements ServiceInterface
{

    protected $trainerShiftRepository;
    function __construct(RepositoryInterface $trainerShiftRepository)
    {
        $this->trainerShiftRepository = $trainerShiftRepository;
    }
    public function fetchAll()
    {
        $trainerShift = $this->trainerShiftRepository->fetchAll();

        return $trainerShift;
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
        //     'item_name' => $data['item_name'],
        //     'item_category_id' => $data['item_category_id'],
        //     'quantity' => $data['quantity'],
        //     'service_date' => $data['service_date'],
        //     'manufacturer' => $data['manufacturer'],
        //     'manufacturer_contact' => $data['manufacturer_contact'],
        //     'created_by' =>Auth::id(),
        //     'updated_by' =>Auth::id(),
        // ];
        // return $this->trainerShiftRepository->create($array);
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
        return $this->trainerShiftRepository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->trainerShiftRepository->delete($id);
    }
}

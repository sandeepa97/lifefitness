<?php

namespace App\Services;

use App\Repositories\Contract\TrainerShiftRepositoryInterface;
use App\Services\Contract\ServiceInterface;
use App\TrainerShift;
use Auth;

class TrainerShiftService implements ServiceInterface
{

    protected $trainerShiftRepository;
    function __construct(TrainerShiftRepositoryInterface $trainerShiftRepository)
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
        $array = [
            'trainer_id' => $data['trainer_id'],
            'shift_date' => $data['shift_date'],
            'shift_start_time' => $data['shift_start_time'],
            'shift_end_time' => $data['shift_end_time'],
            'shift_type_id' => $data['shift_type_id'],
        ];
        return $this->trainerShiftRepository->create($array);
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

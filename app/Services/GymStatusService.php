<?php

namespace App\Services;

use App\Repositories\Contract\GymStatusRepositoryInterface;
use App\Services\Contract\ServiceInterface;
use App\GymStatus;
use Auth;

class GymStatusService implements ServiceInterface
{

    protected $GymStatusRepository;
    function __construct(GymStatusRepositoryInterface $gymStatusRepository)
    {
        $this->gymStatusRepository = $gymStatusRepository;
    }
    public function fetchAll()
    {
        $gymStatus = $this->gymStatusRepository->fetchAll();

        return $gymStatus;
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
            'current_status'=>$data['current_status'],
            'current_trainer'=>$data['current_trainer'],
        ];
        return $this->gymStatusRepository->create($array);
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
        return $this->gymStatusRepository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->gymStatusRepository->delete($id);
    }
}

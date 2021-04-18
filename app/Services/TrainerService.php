<?php

namespace App\Services;

use App\Repositories\Contract\TrainerRepositoryInterface;
use App\Services\Contract\ServiceInterface;
use App\Trainer;
use Auth;

class TrainerService implements ServiceInterface
{

    protected $trainerRepository;
    function __construct(TrainerRepositoryInterface $trainerRepository)
    {
        $this->trainerRepository = $trainerRepository;
    }
    public function fetchAll()
    {
        $trainers = $this->trainerRepository->fetchAll();

        return $trainers;
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
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'gender' => $data['gender'],
            'nic' => $data['nic'],
            'address' => $data['address'],
            'contact' => $data['contact'],
            'email' => $data['email'],
            'password'=>bcrypt($data['password']),
            'created_by' =>Auth::id(),
            'updated_by' =>Auth::id(),
        ];
        return $this->trainerRepository->create($array);
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
        return $this->trainerRepository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->trainerRepository->delete($id);
    }
}

<?php

namespace App\Services;

use App\Repositories\Contract\OnlineCoachRepositoryInterface;
use App\Services\Contract\ServiceInterface;
use App\OnlineCoach;
use Auth;

class OnlineCoachService implements ServiceInterface
{

    protected $onlineCoachRepository;
    function __construct(OnlineCoachRepositoryInterface $onlineCoachRepository)
    {
        $this->onlineCoachRepository = $onlineCoachRepository;
    }
    public function fetchAll()
    {
        $onlineClients = $this->onlineCoachRepository->fetchAll();

        return $onlineClients;
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
            'location' => $data['location'],
            'contact' => $data['contact'],
            'email' => $data['email'],
            'online_coach_package_id' => $data['online_coach_package_id'],

        ];
        return $this->onlineCoachRepository->create($array);
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
        return $this->onlineCoachRepository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->onlineCoachRepository->delete($id);
    }
}

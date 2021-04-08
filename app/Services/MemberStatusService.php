<?php

namespace App\Services;

use App\Repositories\Contract\MemberStatusRepositoryInterface;
use App\Services\Contract\ServiceInterface;
use App\MemberStatus;
use Auth;

class MemberStatusService implements ServiceInterface
{

    protected $memberStatusRepository;
    function __construct(MemberStatusRepositoryInterface $memberStatusRepository)
    {
        $this->memberStatusRepository = $memberStatusRepository;
    }
    public function fetchAll()
    {
        $memberStatus = $this->memberStatusRepository->fetchAll();

        return $memberStatus;
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
            'member_id'=>$data['member_id'],
            'height_cm'=>$data['height_cm'],
            'weight_kg'=>$data['weight_kg'],
            'bmi'=>$data['bmi'],
            'member_status_type_id'=>$data['member_status_type_id'],

        ];
        return $this->memberStatusRepository->create($array);
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
        return $this->memberStatusRepository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->memberStatusRepository->delete($id);
    }
}

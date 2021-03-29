<?php

namespace App\Services;

use App\Repositories\Contract\MemberAttendanceRepositoryInterface;
use App\Services\Contract\ServiceInterface;
use App\MemberAttendance;
use Auth;

class MemberAttendanceService implements ServiceInterface
{

    protected $memberAttendanceRepository;
    function __construct(memberAttendanceRepositoryInterface $memberAttendanceRepository)
    {
        $this->memberAttendanceRepository = $memberAttendanceRepository;
    }
    public function fetchAll()
    {
        $memberAttendance = $this->memberAttendanceRepository->fetchAll();

        return $memberAttendance;
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
            'member_in_date'=>$data['member_in_date'],
            'member_in_time'=>$data['member_in_time'],
            'created_by' =>Auth::id(),
            'updated_by' =>Auth::id(),

        ];
        return $this->memberAttendanceRepository->create($array);
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
        return $this->memberAttendanceRepository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->memberAttendanceRepository->delete($id);
    }
}

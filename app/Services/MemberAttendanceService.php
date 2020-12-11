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
        $memberAttendances = $this->memberAttendanceRepository->fetchAll();

        return $memberAttendances;
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
            // 'member_id'=>$data['member_id'],
            // 'fname' => $data['fname'],
            // 'lname' => $data['lname'],
            // 'date'=> $data['date'],
            // 'payment_type_id' => $data['payment_type_id'],
            // 'amount' => $data['amount'],
            // 'created_by' =>Auth::id(),
            // 'updated_by' =>Auth::id(),
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

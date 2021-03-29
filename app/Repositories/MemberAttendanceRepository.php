<?php

namespace App\Repositories;

use App\Repositories\Contract\MemberAttendanceRepositoryInterface;
use App\MemberAttendance;
use Auth;

class MemberAttendanceRepository implements MemberAttendanceRepositoryInterface
{

    public function fetchAll()
    {
        return MemberAttendance::all();
    }

    public function fetch($id)
    {
    }

    public function create($data)
    {
        return MemberAttendance::create($data);
    }
    public function update($data, $id)
    {

        $memberAttendance = MemberAttendance::find($id);
        $memberAttendance->member_id = $data['member_id'];
        $memberAttendance->member_in_date = $data['member_in_date'];
        $memberAttendance->member_in_time = $data['member_in_time'];
        $memberAttendance->updated_by = Auth::id();
        $memberAttendance->save();
        return $memberAttendance;
    }

    public function delete($id)
    {
        return MemberAttendance::where('id', $id)->delete();
    }
}

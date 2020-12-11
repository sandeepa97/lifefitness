<?php

namespace App\Repositories;

use App\Repositories\Contract\MemberAttendanceRepositoryInterface;
use App\MemberAttendance;
use Auth;

class MemberAttendanceRepository implements MemberAttendanceRepositoryInterface
{

    public function fetchAll()
    {
        // return MemberAttendance::all();
    }

    public function fetch($id)
    {
    }

    public function create($data)
    {
        // return MemberAttendance::create($data);
    }
    public function update($data, $id)
    {
        // $members = MemberAttendance::find($id);
        // $members->fname = $data['fname'];
        // $members->lname = $data['lname'];
        // $members->gender = $data['gender'];
        // $members->nic = $data['nic'];
        // $members->address = $data['address'];
        // $members->contact = $data['contact'];
        // $members->email = $data['email'];
        // $members->updated_by = Auth::id();
        // $members->save();
        // return $members;
    }

    public function delete($id)
    {
        // return MemberAttendance::where('id', $id)->delete();
    }
}

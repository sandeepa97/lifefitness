<?php

namespace App\Repositories;

use App\Repositories\Contract\RepositoryInterface;
use App\MemberStatus;
use Auth;

class MemberStatusRepository implements RepositoryInterface
{

    public function fetchAll()
    {
        // return MemberStatus::all();
        return MemberStatus::with(['member', 'memberStatusType'])->get();
    }

    public function fetch($id)
    {
    }

    public function create($data)
    {
        return MemberStatus::create($data);
    }
    public function update($data, $id)
    {

        // $memberStatus = MemberStatus::find($id);
        // $memberStatus->member_id = $data['member_id'];
        // $memberStatus->member_in_date = $data['member_in_date'];
        // $memberStatus->member_in_time = $data['member_in_time'];
        // $memberStatus->updated_by = Auth::id();
        // $memberStatus->save();
        // return $memberStatus;
    }

    public function delete($id)
    {
        return MemberStatus::where('id', $id)->delete();
    }
}

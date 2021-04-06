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

        $memberStatus = MemberStatus::find($id);
        $memberStatus->member_id = $data['member_id'];
        $memberStatus->height_cm = $data['height_cm'];
        $memberStatus->weight_kg = $data['weight_kg'];
        $memberStatus->bmi = $data['bmi'];
        $memberStatus->member_status_type_id = $data['member_status_type_id'];
        $memberStatus->save();
        return $memberStatus;
    }

    public function delete($id)
    {
        return MemberStatus::where('id', $id)->delete();
    }
}

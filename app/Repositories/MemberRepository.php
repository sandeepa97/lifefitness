<?php

namespace App\Repositories;

use App\Repositories\Contract\MemberRepositoryInterface;
use App\Member;
use Auth;

class MemberRepository implements MemberRepositoryInterface
{

    public function fetchAll()
    {
        return Member::all();
    }

    public function fetch($id)
    {
    }

    public function create($data)
    {
        return Member::create($data);
    }
    public function update($data, $id)
    {
        $members = Member::find($id);
        $members->fname = $data['fname'];
        $members->lname = $data['lname'];
        $members->gender = $data['gender'];
        $members->nic = $data['nic'];
        $members->address = $data['address'];
        $members->contact = $data['contact'];
        $members->email = $data['email'];
        $members->password = bcrypt($data['password']);
        $members->updated_by = Auth::id();
        $members->save();
        return $members;
    }

    public function delete($id)
    {
        return Member::where('id', $id)->delete();
    }
}

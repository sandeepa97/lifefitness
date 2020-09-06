<?php

namespace App\Repositories;

use App\Repositories\Contract\PaymentRepositoryInterface;
use App\MemberPayment;
use Auth;

class PaymentRepository implements PaymentRepositoryInterface
{

    public function fetchAll()
    {
       //return MemberPayment::all();
        return MemberPayment::with(['member', 'memberPayments'])->get();
    }

    public function fetch($id)
    {
    }

    public function create($data)
    {
        return MemberPayment::create($data);
    }
    public function update($data, $id)
    {
        // $members = MemberPayment::find($id);
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
        // return MemberPayment::where('id', $id)->delete();
    }
}

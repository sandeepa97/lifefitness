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
        $payments = MemberPayment::find($id);
        $payments->member_id = $data['member_id'];
        $payments->date = $data['date'];
        $payments->payment_type_id = $data['payment_type_id'];
        $payments->amount = $data['amount'];
        $payments->updated_by = Auth::id();
        $payments->save();
        return $payments;
    }

    public function delete($id)
    {
        // return MemberPayment::where('id', $id)->delete();
    }
}

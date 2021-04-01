<?php

namespace App\Repositories;

use App\Repositories\Contract\RepositoryInterface;
use App\Notice;
use Auth;

class NoticeRepository implements RepositoryInterface
{

    public function fetchAll()
    {
       //return MemberPayment::all();
        return Notice::with(['noticeType', 'noticeRecipient'])->get();
    }

    public function fetch($id)
    {
    }

    public function create($data)
    {
        return Notice::create($data);
    }
    public function update($data, $id)
    {
        // $payments = Notice::find($id);
        // $payments->member_id = $data['member_id'];
        // $payments->date = $data['date'];
        // $payments->payment_type_id = $data['payment_type_id'];
        // $payments->amount = $data['amount'];
        // $payments->updated_by = Auth::id();
        // $payments->save();
        // return $payments;
    }

    public function delete($id)
    {
        return Notice::where('id', $id)->delete();
    }
}

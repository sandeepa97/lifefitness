<?php

namespace App\Repositories;

use App\Repositories\Contract\TrainerPaymentRepositoryInterface;
use App\TrainerPayment;
use Auth;

class TrainerPaymentRepository implements TrainerPaymentRepositoryInterface
{

    public function fetchAll()
    {
       //return TrainerPayment::all();
        return TrainerPayment::with(['trainer'])->get();
    }

    public function fetch($id)
    {
    }

    public function create($data)
    {
        return TrainerPayment::create($data);
    }
    public function update($data, $id)
    {
        $trainerPayments = TrainerPayment::find($id);
        $trainerPayments->trainer_id = $data['trainer_id'];
        $trainerPayments->date = $data['date'];
        $trainerPayments->amount = $data['amount'];
        $trainerPayments->updated_by = Auth::id();
        $trainerPayments->save();
        return $trainerPayments;
    }

    public function delete($id)
    {
        return TrainerPayment::where('id', $id)->delete();
    }
}

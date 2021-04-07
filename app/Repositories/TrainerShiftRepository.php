<?php

namespace App\Repositories;

use App\Repositories\Contract\RepositoryInterface;
use App\TrainerShift;
use Auth;

class TrainerShiftRepository implements RepositoryInterface
{

    public function fetchAll()
    {
    //    return TrainerShift::all();
        return TrainerShift::with(['trainers','trainerShiftTypes'])->get();
    }

    public function fetch($id)
    {
    }

    public function create($data)
    {
        return TrainerShift::create($data);
    }
    public function update($data, $id)
    {

        // $trainerShifts = TrainerShift::find($id);
        // $trainerShifts->trainerShift_subject = $data['trainerShift_subject'];
        // $trainerShifts->trainerShift_content = $data['trainerShift_content'];
        // $trainerShifts->trainerShift_date = $data['trainerShift_date'];
        // $trainerShifts->trainerShift_time = $data['trainerShift_time'];
        // $trainerShifts->trainerShift_type_id = $data['trainerShift_type_id'];
        // $trainerShifts->recipients_id = $data['recipients_id'];
        // $trainerShifts->save();
        // return $trainerShifts;

    }

    public function delete($id)
    {
        return TrainerShift::where('id', $id)->delete();
    }
}

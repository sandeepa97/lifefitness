<?php

namespace App\Repositories;

use App\Repositories\Contract\TrainerShiftRepositoryInterface;
use App\TrainerShift;
use Auth;

class TrainerShiftRepository implements TrainerShiftRepositoryInterface
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

        $trainerShifts = TrainerShift::find($id);
        $trainerShifts->trainer_id = $data['trainer_id'];
        $trainerShifts->shift_date = $data['shift_date'];
        $trainerShifts->shift_start_time = $data['shift_start_time'];
        $trainerShifts->shift_end_time = $data['shift_end_time'];
        $trainerShifts->shift_type_id = $data['shift_type_id'];
        $trainerShifts->save();
        return $trainerShifts;

    }

    public function delete($id)
    {
        return TrainerShift::where('id', $id)->delete();
    }
}

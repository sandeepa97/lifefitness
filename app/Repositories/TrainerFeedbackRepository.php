<?php

namespace App\Repositories;

use App\Repositories\Contract\TrainerFeedbackRepositoryInterface;
use App\TrainerFeedback;
use Auth;

class TrainerFeedbackRepository implements TrainerFeedbackRepositoryInterface
{

    public function fetchAll()
    {
    //    return TrainerFeedback::all();
        return TrainerFeedback::with(['trainer'])->get();
    }

    public function fetch($id)
    {
    }

    public function create($data)
    {
        return TrainerFeedback::create($data);
    }
    public function update($data, $id)
    {

        $trainerFeedbacks = TrainerFeedback::find($id);
        $trainerFeedbacks->trainer_id = Auth::guard('trainer')->id();
        $trainerFeedbacks->feedback_subject = $data['feedback_subject'];
        $trainerFeedbacks->feedback_content = $data['feedback_content'];
        $trainerFeedbacks->feedback_date = $data['feedback_date'];
        $trainerFeedbacks->feedback_time = $data['feedback_time'];
        $trainerFeedbacks->save();
        return $trainerFeedbacks;

    }

    public function delete($id)
    {
        return TrainerFeedback::where('id', $id)->delete();
    }
}

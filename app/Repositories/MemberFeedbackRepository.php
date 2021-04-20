<?php

namespace App\Repositories;

use App\Repositories\Contract\MemberFeedbackRepositoryInterface;
use App\MemberFeedback;
use Auth;

class MemberFeedbackRepository implements MemberFeedbackRepositoryInterface
{

    public function fetchAll()
    {
    //    return MemberFeedback::all();
        return MemberFeedback::with(['member'])->get();
    }

    public function fetch($id)
    {
    }

    public function create($data)
    {
        return MemberFeedback::create($data);
    }
    public function update($data, $id)
    {

        $memberFeedbacks = MemberFeedback::find($id);
        $memberFeedbacks->member_id = Auth::guard('member')->id();
        $memberFeedbacks->feedback_subject = $data['feedback_subject'];
        $memberFeedbacks->feedback_content = $data['feedback_content'];
        $memberFeedbacks->feedback_date = $data['feedback_date'];
        $memberFeedbacks->feedback_time = $data['feedback_time'];
        $memberFeedbacks->save();
        return $memberFeedbacks;

    }

    public function delete($id)
    {
        return MemberFeedback::where('id', $id)->delete();
    }
}

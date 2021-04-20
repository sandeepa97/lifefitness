<?php

namespace App\Services;

use App\Repositories\Contract\MemberFeedbackRepositoryInterface;
use App\Services\Contract\ServiceInterface;
use App\MemberFeedback;
use Auth;

class MemberFeedbackService implements ServiceInterface
{

    protected $memberFeedbackRepository;
    function __construct(MemberFeedbackRepositoryInterface $memberFeedbackRepository)
    {
        $this->memberFeedbackRepository = $memberFeedbackRepository;
    }
    public function fetchAll()
    {
        $memberFeedbacks = $this->memberFeedbackRepository->fetchAll();

        return $memberFeedbacks;
    }

    /**
     * Fetch User by ID
     *
     * @param [type] $id
     * @return void
     */
    public function fetch($id)
    {
    }

    /**
     * Create new user
     *
     * @param [type] $data
     * @return void
     */
    public function store($data)
    {
        $array = [
            'member_id'=>Auth::guard('member')->id(),
            'feedback_subject'=>$data['feedback_subject'],
            'feedback_content'=>$data['feedback_content'],
            'feedback_date'=>$data['feedback_date'],
            'feedback_time'=>$data['feedback_time'],
        ];
        return $this->memberFeedbackRepository->create($array);
    }

    /**
     * Update existing user
     *
     * @param [type] $data
     * @param [type] $id
     * @return void
     */
    public function update($data, $id)
    {
        return $this->memberFeedbackRepository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->memberFeedbackRepository->delete($id);
    }
}

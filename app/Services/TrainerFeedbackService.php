<?php

namespace App\Services;

use App\Repositories\Contract\TrainerFeedbackRepositoryInterface;
use App\Services\Contract\ServiceInterface;
use App\TrainerFeedback;
use Auth;

class TrainerFeedbackService implements ServiceInterface
{

    protected $trainerFeedbackRepository;
    function __construct(TrainerFeedbackRepositoryInterface $trainerFeedbackRepository)
    {
        $this->trainerFeedbackRepository = $trainerFeedbackRepository;
    }
    public function fetchAll()
    {
        $trainerFeedbacks = $this->trainerFeedbackRepository->fetchAll();

        return $trainerFeedbacks;
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
            'trainer_id'=>Auth::guard('trainer')->id(),
            'feedback_subject'=>$data['feedback_subject'],
            'feedback_content'=>$data['feedback_content'],
            'feedback_date'=>$data['feedback_date'],
            'feedback_time'=>$data['feedback_time'],
        ];
        return $this->trainerFeedbackRepository->create($array);
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
        return $this->trainerFeedbackRepository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->trainerFeedbackRepository->delete($id);
    }
}

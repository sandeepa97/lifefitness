<?php

namespace App\Services;

use App\Repositories\Contract\WorkoutScheduleRepositoryInterface;
use App\Services\Contract\ServiceInterface;
use App\WorkoutSchedule;
use Auth;

class WorkoutScheduleService implements ServiceInterface
{

    protected $workoutScheduleRepository;
    function __construct(WorkoutScheduleRepositoryInterface $workoutScheduleRepository)
    {
        $this->workoutScheduleRepository = $workoutScheduleRepository;
    }
    public function fetchAll()
    {
        $workoutSchedules = $this->workoutScheduleRepository->fetchAll();

        return $workoutSchedules;
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
        // $array = [
        //     'workoutSchedule_subject'=>$data['workoutSchedule_subject'],
        //     'workoutSchedule_content'=>$data['workoutSchedule_content'],
        //     'workoutSchedule_date'=>$data['workoutSchedule_date'],
        //     'workoutSchedule_time'=>$data['workoutSchedule_time'],
        //     'workoutSchedule_type_id'=>$data['workoutSchedule_type_id'],
        //     'recipients_id'=>$data['recipients_id'],

        // ];
        // return $this->workoutScheduleRepository->create($array);
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
        return $this->workoutScheduleRepository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->workoutScheduleRepository->delete($id);
    }
}

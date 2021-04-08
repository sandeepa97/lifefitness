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
        $array = [
            'schedule_type_id'=>$data['schedule_type_id'],
            'exercise_id'=>$data['exercise_id'],
            'reps'=>$data['reps'],
            'sets'=>$data['sets'],

        ];
        return $this->workoutScheduleRepository->create($array);
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

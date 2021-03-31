<?php

namespace App\Services;

use App\Repositories\Contract\ExerciseRepositoryInterface;
use App\Services\Contract\ServiceInterface;
use App\Exercise;
use Auth;

class ExerciseService implements ServiceInterface
{

    protected $exerciseRepository;
    function __construct(exerciseRepositoryInterface $exerciseRepository)
    {
        $this->exerciseRepository = $exerciseRepository;
    }
    public function fetchAll()
    {
        $exercise = $this->exerciseRepository->fetchAll();

        return $exercise;
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
            'exercise_name'=>$data['exercise_name'],

        ];
        return $this->exerciseRepository->create($array);
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
        return $this->exerciseRepository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->exerciseRepository->delete($id);
    }
}

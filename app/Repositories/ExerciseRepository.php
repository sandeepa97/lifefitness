<?php

namespace App\Repositories;

use App\Repositories\Contract\ExerciseRepositoryInterface;
use App\Exercise;
use Auth;

class ExerciseRepository implements ExerciseRepositoryInterface
{

    public function fetchAll()
    {
        return Exercise::all();
    }

    public function fetch($id)
    {
    }

    public function create($data)
    {
        return Exercise::create($data);
    }
    public function update($data, $id)
    {

        $exercise = Exercise::find($id);
        $exercise->exercise_name = $data['exercise_name'];
        $exercise->save();
        return $exercise;
    }

    public function delete($id)
    {
        return Exercise::where('id', $id)->delete();
    }
}

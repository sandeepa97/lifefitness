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

        // $Exercise = Exercise::find($id);
        // $Exercise->member_id = $data['member_id'];
        // $Exercise->member_in_date = $data['member_in_date'];
        // $Exercise->member_in_time = $data['member_in_time'];
        // $Exercise->updated_by = Auth::id();
        // $Exercise->save();
        // return $Exercise;
    }

    public function delete($id)
    {
        return Exercise::where('id', $id)->delete();
    }
}

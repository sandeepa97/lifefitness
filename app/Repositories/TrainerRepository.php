<?php

namespace App\Repositories;

use App\Repositories\Contract\TrainerRepositoryInterface;
use App\Trainer;
use Auth;

class TrainerRepository implements TrainerRepositoryInterface
{

    public function fetchAll()
    {
        return Trainer::all();
    }

    public function fetch($id)
    {
    }

    public function create($data)
    {
        return Trainer::create($data);
    }
    public function update($data, $id)
    {
        $trainers = Trainer::find($id);
        $trainers->fname = $data['fname'];
        $trainers->lname = $data['lname'];
        $trainers->gender = $data['gender'];
        $trainers->nic = $data['nic'];
        $trainers->address = $data['address'];
        $trainers->contact = $data['contact'];
        $trainers->email = $data['email'];
        // $trainers->password = bcrypt($data['password']);
        $trainers->updated_by = Auth::id();
        $trainers->save();
        return $trainers;
    }

    public function delete($id)
    {
        return Trainer::where('id', $id)->delete();
    }
}

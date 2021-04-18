<?php

namespace App\Repositories;

use App\Repositories\Contract\GymStatusRepositoryInterface;
use App\GymStatus;
use Auth;

class GymStatusRepository implements GymStatusRepositoryInterface
{

    public function fetchAll()
    {
        return GymStatus::all();
        // return GymStatus::with(['trainer'])->get();
    }

    public function fetch($id)
    {
    }

    public function create($data)
    {
        return GymStatus::create($data);
    }
    public function update($data, $id)
    {

        $gymStatus = GymStatus::find($id);
        $gymStatus->current_status = $data['current_status'];
        $gymStatus->current_trainer = $data['current_trainer'];
        $gymStatus->save();
        return $gymStatus;
    }

    public function delete($id)
    {
        return GymStatus::where('id', $id)->delete();
    }
}

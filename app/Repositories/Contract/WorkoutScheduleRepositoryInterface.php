<?php

namespace App\Repositories\Contract;

interface WorkoutScheduleRepositoryInterface
{


    public function fetchAll();

    public function fetch($id);

    public function create($data);

    public function update($data, $id);

    public function delete($id);
}

<?php

namespace App\Repositories\Contract;

interface OnlineStoreRepositoryInterface
{


    public function fetchAll();

    public function fetch($id);

    public function create($data);

    public function update($data, $id);

    public function delete($id);
}

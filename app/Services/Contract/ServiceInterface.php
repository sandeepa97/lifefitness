<?php

namespace App\Services\Contract;

interface ServiceInterface{

    public function fetchAll();

    public function fetch($id);

    public function store($data);

    public function update($data,$id);

    public function delete($id);
}
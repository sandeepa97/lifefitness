<?php
namespace App\Services;

use App\Services\Contract\ServiceInterface;
use App\NoticeRecipient;

class NoticeRecipientService implements ServiceInterface{


     /**
     * Fetch All User
     *
     * @return void
     */
    public function fetchAll()
    {
        return NoticeRecipient::all();

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


    }

    /**
     * Update existing user
     *
     * @param [type] $data
     * @param [type] $id
     * @return void
     */
    public function update($data,$id)
    {

    }

    /**
     * Get Auth User
     *
     * @return void
     */
    public function getAuthUser()
    {

    }

      /**
     * Delete User Role
     *
     * @param [type] $id
     * @return void
     */
    public function delete($id)
    {

    }

}

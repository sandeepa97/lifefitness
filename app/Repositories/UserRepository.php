<?php

namespace App\Repositories;

use App\Repositories\Contract\UserRepositoryInterface;
use App\User;

class UserRepository implements UserRepositoryInterface
{

    /**
     * Fetch All User
     *
     * @return void
     */
    public function fetchAll()
    {
        return User::all();
    }

    /**
     * Fetch User by id
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
    public function create($data)
    {
        return User::create($data);
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



        $user = User::find($id);
        $user->fname = $data['fname'];
        $user->lname = $data['lname'];
        $user->gender = $data['lname'];
        $user->nic = $data['lname'];
        $user->address = $data['lname'];
        $user->contact = $data['mobile'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['txtpasswords']);
        $user->updated_by = Auth::id();
        $user->save();
        return $user;
    }

    /**
     * Delete existing user
     *
     * @param [type] $id
     * @return void
     */
    public function delete($id)
    {


        return User::where('id', $id)->delete();
    }
}

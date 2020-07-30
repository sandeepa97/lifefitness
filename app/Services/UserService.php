<?php
namespace App\Services;

use App\Repositories\Contract\UserRepositoryInterface;
use App\Services\Contract\ServiceInterface;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserService implements ServiceInterface
{

    protected $userRepository;
    /**
     * Constructor
     */
    function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Fetch All User
     *
     * @return void
     */
    public function fetchAll()
    {


        $users = $this->userRepository->fetchAll();
        // return response()->json($users);

        return $users;


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
            'fname'=>$data['fname'],
            'lname'=>$data['lname'],
            'lname'=>$data['lname'],
            'lname'=>$data['lname'],
            'mobile'=>$data['telephone'],
            'email'=>$data['email'],
            'password'=>bcrypt($data['txtpasswords']),
            'created_by'=>Auth::id(),
          ];
          return $this->userRepository->create($array);
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

    return $this->userRepository->update($data,$id);

    }

    /**
     * Get Auth User
     *
     * @return void
     */
    public function getAuthUser()
    {
        return response()->json(Auth::user());
    }

    /**
     * Delete User
     *
     * @param [type] $id
     * @return void
     */
    public function delete($id)
    {
        return $this->userRepository->delete($id);
    }

}

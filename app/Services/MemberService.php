<?php

namespace App\Services;

use App\Repositories\Contract\MemberRepositoryInterface;
use App\Services\Contract\ServiceInterface;
use App\Member;

class MemberService implements ServiceInterface
{

    protected $memberRepository;
    function __construct(memberRepositoryInterface $memberRepository)
    {
        $this->memberRepository = $memberRepository;
    }
    public function fetchAll()
    {
        $members = $this->memberRepository->fetchAll();

        return $members;
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
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'gender' => $data['gender'],
            'nic' => $data['nic'],
            'address' => $data['address'],
            'contact' => $data['contact'],
            'email' => $data['email'],
            'password'=>bcrypt($data['password']),
            'created_by' =>Auth::id(),
        ];
        return $this->memberRepository->create($array);
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
        return $this->memberRepository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->memberRepository->delete($id);
    }
}

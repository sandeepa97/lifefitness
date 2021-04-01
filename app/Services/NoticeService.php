<?php

namespace App\Services;

use App\Repositories\Contract\RepositoryInterface;
use App\Services\Contract\ServiceInterface;
use App\Notice;
use Auth;

class NoticeService implements ServiceInterface
{

    protected $noticeRepository;
    function __construct(RepositoryInterface $noticeRepository)
    {
        $this->noticeRepository = $noticeRepository;
    }
    public function fetchAll()
    {
        $notices = $this->noticeRepository->fetchAll();

        return $notices;
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
        // $array = [
        //     'member_id'=>$data['member_id'],
        //     // 'fname' => $data['fname'],
        //     // 'lname' => $data['lname'],
        //     'date'=> $data['date'],
        //     'payment_type_id' => $data['payment_type_id'],
        //     'amount' => $data['amount'],
        //     'created_by' =>Auth::id(),
        //     'updated_by' =>Auth::id(),
        // ];
        // return $this->paymentRepository->create($array);
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
        return $this->noticeRepository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->noticeRepository->delete($id);
    }
}

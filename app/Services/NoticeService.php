<?php

namespace App\Services;

use App\Repositories\Contract\NoticeRepositoryInterface;
use App\Services\Contract\ServiceInterface;
use App\Notice;
use Auth;

class NoticeService implements ServiceInterface
{

    protected $noticeRepository;
    function __construct(NoticeRepositoryInterface $noticeRepository)
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
        $array = [
            'notice_subject'=>$data['notice_subject'],
            'notice_content'=>$data['notice_content'],
            'notice_date'=>$data['notice_date'],
            'notice_time'=>$data['notice_time'],
            'notice_type_id'=>$data['notice_type_id'],
            'recipients_id'=>$data['recipients_id'],

        ];
        return $this->noticeRepository->create($array);
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

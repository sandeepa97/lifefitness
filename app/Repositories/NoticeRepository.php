<?php

namespace App\Repositories;

use App\Repositories\Contract\NoticeRepositoryInterface;
use App\Notice;
use Auth;

class NoticeRepository implements NoticeRepositoryInterface
{

    public function fetchAll()
    {
       //return MemberPayment::all();
        return Notice::with(['noticeType', 'noticeRecipient'])->get();
    }

    public function fetch($id)
    {
    }

    public function create($data)
    {
        return Notice::create($data);
    }
    public function update($data, $id)
    {

        $notices = Notice::find($id);
        $notices->notice_subject = $data['notice_subject'];
        $notices->notice_content = $data['notice_content'];
        $notices->notice_date = $data['notice_date'];
        $notices->notice_time = $data['notice_time'];
        $notices->notice_type_id = $data['notice_type_id'];
        $notices->recipients_id = $data['recipients_id'];
        $notices->save();
        return $notices;

    }

    public function delete($id)
    {
        return Notice::where('id', $id)->delete();
    }
}

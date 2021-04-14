<?php

namespace App\Repositories;

use App\Repositories\Contract\OnlineCoachRepositoryInterface;
use App\OnlineCoach;
use Auth;

class OnlineCoachRepository implements OnlineCoachRepositoryInterface
{

    public function fetchAll()
    {
        // return OnlineCoach::all();
        return OnlineCoach::with(['coachPackage'])->get();
    }

    public function fetch($id)
    {
    }

    public function create($data)
    {
        return OnlineCoach::create($data);
    }
    public function update($data, $id)
    {
        $onlineClients = OnlineCoach::find($id);
        $onlineClients->fname = $data['fname'];
        $onlineClients->lname = $data['lname'];
        $onlineClients->gender = $data['gender'];
        $onlineClients->location = $data['location'];
        $onlineClients->contact = $data['contact'];
        $onlineClients->email = $data['email'];
        $onlineClients->online_coach_package_id = $data['online_coach_package_id'];
        $onlineClients->save();
        return $onlineClients;
    }

    public function delete($id)
    {
        return OnlineCoach::where('id', $id)->delete();
    }
}

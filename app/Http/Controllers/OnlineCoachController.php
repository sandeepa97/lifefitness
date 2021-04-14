<?php

namespace App\Http\Controllers;

use App\Services\ApiResponseService;
use App\Services\OnlineCoachService;
use Illuminate\Http\Request;

class OnlineCoachController extends Controller
{

    protected $onlineCoachService;


    protected $apiResponse;



    function __construct(
        OnlineCoachService $onlineCoach,
        ApiResponseService $apiResponseService
    ) {
        $this->onlineCoachService = $onlineCoach;
        $this->apiResponse = $apiResponseService;
    }



    public function index()
    {
        return view('admin.online_coach.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 
        try {
            
            $onlineClients = $this->onlineCoachService->store($request->all());
            return $this->apiResponse->success(200, $onlineClients, 'Online Client Added Successfully');
        } catch (\Exception $e) {
      
            dd($e->getMessage());
            return $this->apiResponse->failed($e, 500, 'Error Occured');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $onlineClients = $this->onlineCoachService->update($request->all(), $id);
            return $this->apiResponse->success(200, $onlineClients, 'Online Client has been updated');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return $this->apiResponse->failed($e, 500, 'Error ocurred');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->onlineCoachService->delete($id);
            return $this->apiResponse->success(200, [], 'Online Client has been deleted');
        } catch (\Exception $e) {
            return $this->apiResponse->failed($e, 500, 'Online Client has not been deleted');
        }
    }
    public function getAllOnlineClients()
    {
        try {
            $onlineClients = $this->onlineCoachService->fetchAll();

            return response()->json(['data' => $onlineClients]);
        } catch (\Exception $e) {
            return $this->apiResponse->failed($e, 500, 'Error Occured');
        }
    }
}

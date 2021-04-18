<?php

namespace App\Http\Controllers;

use App\Services\ApiResponseService;
use App\Services\GymStatusService;

use Illuminate\Http\Request;

class GymStatusController extends Controller
{
    protected $gymStatusService;


    protected $apiResponse;



    function __construct(
        GymStatusService $gymStatus,
        ApiResponseService $apiResponseService
    ) {
        $this->gymStatusService = $gymStatus;
        $this->apiResponse = $apiResponseService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('admin.gym_status.index');
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
        try{
            $gymStatus = $this->gymStatusService->store($request->all());
            return $this->apiResponse->success(200, $gymStatus, 'Status Marked Successfully');
        } catch (\Exception $e) {
            // dd($e->getMessage());
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
        try{
            $gymStatus = $this->gymStatusService->update($request->all(),$id);
            return $this->apiResponse->success(200, $gymStatus, 'Gym Status has been updated');
        } catch(\Exception $e) {
            return $this->apiResponse->failed($e, 500, 'Error occured');
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
        try{
            $this->gymStatusService->delete($id);
            return $this->apiResponse->success(200, [], 'Gym Status has been deleted');
        } catch (\Excepption $e) {
            return $this->apiResponse->failed($e,500,'Error Occured');
        }
    }

    public function getAllGymStatus()
    {
        try{
            
            $gymStatus = $this->gymStatusService->fetchAll();
            // dd($e->getMessage());
            
            return response()->json(['data' => $gymStatus]);
        } catch (\Exception $e){
            // dd($gymStatus);
            dd($e->getMessage());
            return $this->apiResponse->failed($e,500,'Error Occured');
        }
    }

}

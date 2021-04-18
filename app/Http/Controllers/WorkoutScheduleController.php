<?php

namespace App\Http\Controllers;

use App\Services\ApiResponseService;
use App\Services\WorkoutScheduleService;

use Illuminate\Http\Request;

class WorkoutScheduleController extends Controller
{


    protected $workoutScheduleService;


    protected $apiResponse;



    function __construct(
        WorkoutScheduleService $workoutSchedule,
        ApiResponseService $apiResponseService
    ) {
        $this->workoutScheduleService = $workoutSchedule;
        $this->apiResponse = $apiResponseService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.schedules.index');
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
            $workoutSchedule = $this->workoutScheduleService->store($request->all());
            return $this->apiResponse->success(200,$workoutSchedule, 'Schedule Added Successfully');
        }catch(\Exception $e){
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
            $workoutSchedules = $this->workoutScheduleService->update($request->all(), $id);
            return $this->apiResponse->success(200, $workoutSchedules, 'Schedule has been updated');
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
            $this->workoutScheduleService->delete($id);
            return $this->apiResponse->success(200, [], 'Schedule has been deleted');
        } catch (\Exception $e) {
            return $this->apiResponse->failed($e, 500, 'Schedule has not been deleted');
        }
    }

    public function getAllSchedules()
    {
        try {
            $workoutSchedules = $this->workoutScheduleService->fetchAll();
            return response()->json(['data' => $workoutSchedules]);
        } catch (\Exception $e) {
            return $this->apiResponse->failed($e, 500, 'Error Occured');
        }
    }
}

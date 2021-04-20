<?php

namespace App\Http\Controllers\Trainer;

use App\Services\ApiResponseService;
use App\Services\TrainerFeedbackService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrainerFeedbackController extends Controller
{


    protected $trainerFeedbackService;


    protected $apiResponse;



    function __construct(
        TrainerFeedbackService $trainerFeedback,
        ApiResponseService $apiResponseService
    ) {
        $this->trainerFeedbackService = $trainerFeedback;
        $this->apiResponse = $apiResponseService;
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
            $trainerFeedback = $this->trainerFeedbackService->store($request->all());
            return $this->apiResponse->success(200,$trainerFeedback, 'Trainer Feedback Posted Successfully');
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
            $trainerFeedbacks = $this->trainerFeedbackService->update($request->all(), $id);
            return $this->apiResponse->success(200, $trainerFeedbacks, 'Trainer Feedback has been updated');
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
            $this->trainerFeedbackService->delete($id);
            return $this->apiResponse->success(200, [], 'Trainer Feedback has been deleted');
        } catch (\Exception $e) {
            return $this->apiResponse->failed($e, 500, 'Trainer Feedback has not been deleted');
        }
    }

    public function getAllTrainerFeedbacks()
    {
        try {
            $trainerFeedbacks = $this->trainerFeedbackService->fetchAll();
            return response()->json(['data' => $trainerFeedbacks]);
        } catch (\Exception $e) {
            return $this->apiResponse->failed($e, 500, 'Error Occured');
        }
    }

    public function loadTrainerFeedbacksAdmin()
    {
        return view('admin.feedbacks.trainer');
    }

}

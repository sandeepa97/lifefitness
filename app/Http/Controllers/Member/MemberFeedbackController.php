<?php

namespace App\Http\Controllers\Member;

use App\Services\ApiResponseService;
use App\Services\MemberFeedbackService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MemberFeedbackController extends Controller
{


    protected $memberFeedbackService;


    protected $apiResponse;



    function __construct(
        MemberFeedbackService $memberFeedback,
        ApiResponseService $apiResponseService
    ) {
        $this->memberFeedbackService = $memberFeedback;
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
            $memberFeedback = $this->memberFeedbackService->store($request->all());
            return $this->apiResponse->success(200,$memberFeedback, 'Member Feedback Posted Successfully');
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
            $memberFeedbacks = $this->memberFeedbackService->update($request->all(), $id);
            return $this->apiResponse->success(200, $memberFeedbacks, 'Member Feedback has been updated');
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
            $this->memberFeedbackService->delete($id);
            return $this->apiResponse->success(200, [], 'Member Feedback has been deleted');
        } catch (\Exception $e) {
            return $this->apiResponse->failed($e, 500, 'Member Feedback has not been deleted');
        }
    }

    public function getAllmemberFeedbacks()
    {
        try {
            $memberFeedbacks = $this->memberFeedbackService->fetchAll();
            return response()->json(['data' => $memberFeedbacks]);
        } catch (\Exception $e) {
            return $this->apiResponse->failed($e, 500, 'Error Occured');
        }
    }

    public function loadMemberFeedbacksAdmin()
    {
        return view('admin.feedbacks.index');
    }

}

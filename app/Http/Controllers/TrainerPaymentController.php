<?php

namespace App\Http\Controllers;
use App\Services\ApiResponseService;
use App\Services\TrainerPaymentService;
use Illuminate\Http\Request;

class TrainerPaymentController extends Controller
{

    protected $trainerPaymentService;


    protected $apiResponse;



    function __construct(
        TrainerPaymentService $trainerPayment,
        ApiResponseService $apiResponseService
    ) {
        $this->trainerPaymentService = $trainerPayment;
        $this->apiResponse = $apiResponseService;
    }



    public function index()
    {
        return view('admin.trainer_payments.index');
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
        // dd($request);
        try {
            
            $trainerPayments = $this->trainerPaymentService->store($request->all());
            return $this->apiResponse->success(200, $trainerPayments, 'Trainer Payment Added Successfully');
        } catch (\Exception $e) {
            
            // dd($trainerPayments);
            // dd($e->getMessage());
            dd($e);
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
            $trainerPayments = $this->trainerPaymentService->update($request->all(), $id);
            return $this->apiResponse->success(200, $trainerPayments, 'Trainer Payment has been updated');
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
            $this->trainerPaymentService->delete($id);
            return $this->apiResponse->success(200, [], 'Trainer Payment has been deleted');
        } catch (\Exception $e) {
            return $this->apiResponse->failed($e, 500, 'Trainer Payment has not been deleted');
        }
    }
    public function getAllTrainerPayments()
    {
        try {
            $trainerPayments = $this->trainerPaymentService->fetchAll();
            return response()->json(['data' => $trainerPayments]);
        } catch (\Exception $e) {
            return $this->apiResponse->failed($e, 500, 'Error Occured');
        }
    }
}

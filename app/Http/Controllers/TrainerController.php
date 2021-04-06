<?php

namespace App\Http\Controllers;

use App\Services\ApiResponseService;
use App\Services\TrainerService;
use Illuminate\Http\Request;

class TrainerController extends Controller
{

    protected $trainerService;


    protected $apiResponse;



    function __construct(
        TrainerService $trainer,
        ApiResponseService $apiResponseService
    ) {
        $this->trainerService = $trainer;
        $this->apiResponse = $apiResponseService;
    }



    public function index()
    {
        return view('admin.trainer.index');
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
            
            $trainers = $this->trainerService->store($request->all());
            return $this->apiResponse->success(200, $trainers, 'Trainer Added Successfully');
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
            $trainers = $this->trainerService->update($request->all(), $id);
            return $this->apiResponse->success(200, $trainers, 'Trainer has been updated');
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
            $this->trainerService->delete($id);
            return $this->apiResponse->success(200, [], 'Trainer has been deleted');
        } catch (\Exception $e) {
            return $this->apiResponse->failed($e, 500, 'Trainer has not been deleted');
        }
    }
    public function getAllTrainers()
    {
        try {
            $trainers = $this->trainerService->fetchAll();

            return response()->json(['data' => $trainers]);
        } catch (\Exception $e) {
            return $this->apiResponse->failed($e, 500, 'Error Occured');
        }
    }
}

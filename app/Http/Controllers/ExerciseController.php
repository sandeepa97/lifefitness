<?php

namespace App\Http\Controllers;

use App\Services\ApiResponseService;
use App\Services\ExerciseService;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{


    protected $exerciseService;
    protected $apiResponse;

    function __construct(
        exerciseService $exercise,
        ApiResponseService $apiResponseService
    ){
        $this->exerciseService = $exercise;
        $this->apiResponse = $apiResponseService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            $exercise = $this->exerciseService->store($request->all());
            return $this->apiResponse->success(200, $exercise, 'Exercise Added Successfully');
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
        try{
            $exercise = $this->exerciseService->update($request->all(),$id);
            return $this->apiResponse->success(200, $exercise, 'Exercise has been updated');
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
            $this->exerciseService->delete($id);
            return $this->apiResponse->success(200, [], 'Exercise has been deleted');
        } catch (\Excepption $e) {
            return $this->apiResponse->failed($e,500,'Error Occured');
        }
    }

    public function getAllExercises()
    {
        try{
            $exercise = $this->exerciseService->fetchAll();
            return response()->json(['data'=>$exercise]);
        }catch(\Exception $e){
            return $this->apiResponse->failed($e,500,'Error Occured');
        }
    }

}

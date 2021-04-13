<?php

namespace App\Http\Controllers;

use App\Services\ApiResponseService;
use App\Services\FitnessBlogService;

use Illuminate\Http\Request;

class FitnessBlogController extends Controller
{


    protected $fitnessBlogService;


    protected $apiResponse;



    function __construct(
        FitnessBlogService $fitnessBlog,
        ApiResponseService $apiResponseService
    ) {
        $this->fitnessBlogService = $fitnessBlog;
        $this->apiResponse = $apiResponseService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.fitness_blog.index');
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
            $fitnessBlog = $this->fitnessBlogService->store($request->all());
            return $this->apiResponse->success(200,$fitnessBlog, 'Blog Posted Successfully');
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
            $fitnessBlogs = $this->fitnessBlogService->update($request->all(), $id);
            return $this->apiResponse->success(200, $fitnessBlogs, 'Blog has been updated');
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
            $this->fitnessBlogService->delete($id);
            return $this->apiResponse->success(200, [], 'Blog has been deleted');
        } catch (\Exception $e) {
            return $this->apiResponse->failed($e, 500, 'Blog has not been deleted');
        }
    }

    public function getAllBlogs()
    {
        try {
            $fitnessBlogs = $this->fitnessBlogService->fetchAll();
            return response()->json(['data' => $fitnessBlogs]);
        } catch (\Exception $e) {
            return $this->apiResponse->failed($e, 500, 'Error Occured');
        }
    }
}

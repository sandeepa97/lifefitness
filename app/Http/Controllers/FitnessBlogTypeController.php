<?php

namespace App\Http\Controllers;

use App\Services\ApiResponseService;
use App\Services\FitnessBlogTypeService;
use Illuminate\Http\Request;

class FitnessBlogTypeController extends Controller
{
    protected $fitnessBlogTypeService;

    protected $apiResponseService;

    /**
     * Constructor
     */
    function __construct(
        FitnessBlogTypeService $fitnessBlogTypeService,
        ApiResponseService $apiResponseService
        )
    {
        $this->fitnessBlogTypeService = $fitnessBlogTypeService;
        $this->apiResponseService = $apiResponseService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{

            $fitnessBlogType = $this->fitnessBlogTypeService->fetchAll();

            return $this->apiResponseService->success(200,$fitnessBlogType,'Data has been found');

        }catch(\Exception $e){
            return $this->apiResponseService->failed($e,500);
        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

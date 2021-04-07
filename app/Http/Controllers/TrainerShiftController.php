<?php

namespace App\Http\Controllers;

use App\Services\ApiResponseService;
use App\Services\TrainerShiftService;
use Illuminate\Http\Request;

class TrainerShiftController extends Controller
{
    protected $trainerShiftService;


    protected $apiResponse;



    function __construct(
        TrainerShiftService $trainerShift,
        ApiResponseService $apiResponseService
    ) {
        $this->trainerShiftService = $trainerShift;
        $this->apiResponse = $apiResponseService;
    }


    public function index()
    {
        return view('admin.trainer_shifts.index');
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
    public function getAllShifts()
    {
        try {
            $trainerShifts = $this->trainerShiftService->fetchAll();
            return response()->json(['data' => $trainerShifts]);
        } catch (\Exception $e) {
            dd($e->getMessage());
            return $this->apiResponse->failed($e, 500, 'Error Occured');
        }
    }
}

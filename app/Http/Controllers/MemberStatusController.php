<?php

namespace App\Http\Controllers;

use App\Services\ApiResponseService;
use App\Services\MemberStatusService;

use Illuminate\Http\Request;

class MemberStatusController extends Controller
{
    protected $memberStatusService;


    protected $apiResponse;



    function __construct(
        memberStatusService $memberStatus,
        ApiResponseService $apiResponseService
    ) {
        $this->memberStatusService = $memberStatus;
        $this->apiResponse = $apiResponseService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.member_status.index');
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
            $memberStatus = $this->memberStatusService->store($request->all());
            return $this->apiResponse->success(200, $memberStatus, 'Status Marked Successfully');
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
            $memberStatus = $this->memberStatusService->update($request->all(),$id);
            return $this->apiResponse->success(200, $memberStatus, 'Member Status has been updated');
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
            $this->memberStatusService->delete($id);
            return $this->apiResponse->success(200, [], 'Member Status has been deleted');
        } catch (\Excepption $e) {
            return $this->apiResponse->failed($e,500,'Error Occured');
        }
    }

    public function getAllMemberStatus()
    {
        try{
            
            $memberStatus = $this->memberStatusService->fetchAll();
            // dd($e->getMessage());
            
            return response()->json(['data' => $memberStatus]);
        } catch (\Exception $e){
            // dd($memberStatus);
            dd($e->getMessage());
            return $this->apiResponse->failed($e,500,'Error Occured');
        }
    }

}

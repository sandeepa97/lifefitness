<?php

namespace App\Http\Controllers;

use App\Services\ApiResponseService;
use App\Services\MemberAttendanceService;

use Illuminate\Http\Request;
use DB;
class MemberAttendanceController extends Controller
{
    protected $memberAttendanceService;


    protected $apiResponse;



    function __construct(
        memberAttendanceService $memberAttendance,
        ApiResponseService $apiResponseService
    ) {
        $this->memberAttendanceService = $memberAttendance;
        $this->apiResponse = $apiResponseService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.member_attendance.index');
    }
    public function viewAttendance()
    {
        return view('admin.member_attendance.viewAttendance');
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
            $memberAttendance = $this->memberAttendanceService->store($request->all());
            return $this->apiResponse->success(200, $memberAttendance, 'Attendance Marked Successfully');
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
            $memberAttendance = $this->memberAttendanceService->update($request->all(),$id);
            return $this->apiResponse->success(200, $memberAttendance, 'Member Attendance has been updated');
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
            $this->memberAttendanceService->delete($id);
            return $this->apiResponse->success(200, [], 'Member Attendance has been deleted');
        } catch (\Excepption $e) {
            return $this->apiResponse->failed($e,500,'Error Occured');
        }
    }

    public function getAllMemberAttendance()
    {
        try{
            
            $memberAttendance = $this->memberAttendanceService->fetchAll();
            // dd($e->getMessage());
            
            return response()->json(['data' => $memberAttendance]);
        } catch (\Exception $e){
            // dd($memberAttendance);
            dd($e->getMessage());
            return $this->apiResponse->failed($e,500,'Error Occured');
        }
    }

    public function getTodayAttendance()
    {
        try {
            $todayAttendance = DB::select(
            "   SELECT COUNT(id) total_attendance
                FROM member_attendances
                WHERE DATE(member_in_date) = DATE(CURRENT_DATE()) "
            );

            return response()->json(['data' => $todayAttendance]);

        } catch (\Exception $e) {
            // dd($e);
            return $this->apiResponse->failed($e, 500, 'Error Occured');
        }
    }

}

<?php

namespace App\Http\Controllers;

use App\Services\ApiResponseService;
use App\Services\NoticeService;

use Illuminate\Http\Request;
use DB;
class NoticeController extends Controller
{


    protected $noticeService;


    protected $apiResponse;



    function __construct(
        NoticeService $notice,
        ApiResponseService $apiResponseService
    ) {
        $this->noticeService = $notice;
        $this->apiResponse = $apiResponseService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.notices.index');
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
            $notice = $this->noticeService->store($request->all());
            return $this->apiResponse->success(200,$notice, 'Notice Posted Successfully');
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
            $notices = $this->noticeService->update($request->all(), $id);
            return $this->apiResponse->success(200, $notices, 'Notice has been updated');
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
            $this->noticeService->delete($id);
            return $this->apiResponse->success(200, [], 'Notice has been deleted');
        } catch (\Exception $e) {
            return $this->apiResponse->failed($e, 500, 'Notice has not been deleted');
        }
    }

    public function getAllNotices()
    {
        try {
            $notices = $this->noticeService->fetchAll();
            return response()->json(['data' => $notices]);
        } catch (\Exception $e) {
            return $this->apiResponse->failed($e, 500, 'Error Occured');
        }
    }
    public function getAllNoticesCount()
    {
        try {
            $noticesCount = DB::select(
            "   SELECT COUNT(id) total_notices
                FROM notices
             "
            );

            return response()->json(['data' => $noticesCount]);

        } catch (\Exception $e) {
            // dd($e);
            return $this->apiResponse->failed($e, 500, 'Error Occured');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Services\ApiResponseService;
use App\Services\MemberService;
use Illuminate\Http\Request;

class MemberController extends Controller
{

    protected $memberService;


    protected $apiResponse;



    function __construct(
        memberService $member,
        ApiResponseService $apiResponseService
    ) {
        $this->memberService = $member;
        $this->apiResponse = $apiResponseService;
    }



    public function index()
    {
        return view('admin.member.index');
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
        // $data = [
        //     'fname' => 'required',
        //     'lname' => 'required',
        //     'nic' => 'required',
        //     'address' => 'required',
        //     'contact' => 'required',
        //     'email' => 'required',
        //     'password' => 'required',
        //     'confirm' => 'required',
        // ];
        // $this->validate($request, $data);

        try {
            
            $members = $this->memberService->store($request->all());
            return $this->apiResponse->success(200, $members, 'Member Added Successfully');
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
            $members = $this->memberService->update($request->all(), $id);
            return $this->apiResponse->success(200, $members, 'Member has been updated');
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
            $this->memberService->delete($id);
            return $this->apiResponse->success(200, [], 'member has been deleted');
        } catch (\Exception $e) {
            return $this->apiResponse->failed($e, 500, 'member has not been deleted');
        }
    }
    public function getAllMembers()
    {
        try {
            $members = $this->memberService->fetchAll();

            return response()->json(['data' => $members]);
        } catch (\Exception $e) {
            return $this->apiResponse->failed($e, 500, 'Error Occured');
        }
    }
}

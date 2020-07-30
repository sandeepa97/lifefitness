<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }

    protected $userService;


    protected $apiResponse;


    /**
     * Constructor
     */
    function __construct(
        UserService $user,
        ApiResponseService $apiResponseService
    ) {
        $this->userService = $user;
        $this->apiResponse = $apiResponseService;
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
            
        $user = $this->userService->store($request->all());
        return $this->apiResponse->success(200,$user,'success');
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
            $user = $this->userService->update($request->all(), $id);
            return $this->apiResponse->success(200, $user, 'User has been updated');
        } catch (\Exception $e) {
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

            $this->userService->delete($id);

            return $this->apiResponse->success(200, [], 'User has been deleted');
        } catch (\Exception $e) {
            return $this->apiResponse->failed($e, 500, 'User has not been deleted');
        }
    }

    /**
     * Get all Users
     *
     * @return void
     */
    public function getAllMembers()
    {
        try {
            $users = $this->userService->fetchAll();

            return response()->json(['data' => $users]);
        } catch (\Exception $e) {
            return $this->apiResponse->failed($e, 500, 'Error Occured');
        }
    }

}

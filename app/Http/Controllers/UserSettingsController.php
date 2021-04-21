<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

use App\Services\ApiResponseService;
use App\Services\UserService;

class UserSettingsController extends Controller
{

    protected $userService;


    protected $apiResponse;



    function __construct(
        UserService $user,
        ApiResponseService $apiResponseService
    ) {
        $this->userService = $user;
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
    // public function loadProfile()
    // {
    //     return view('admin.user_settings.profile');
    // }
    public function loadSettings()
    {
        return view('admin.user_settings.settings');
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
        try {
            $users = $this->userService->update($request->all(), $id);
            return $this->apiResponse->success(200, $users, 'User has been updated');
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
        //
    }

    public function loadProfile()
    {
        $userId = Auth::id();
        
        $users = DB::table('users')->
                    where('id', $userId)->
                    get();
        // dd($payments);
        return view('admin.user_settings.profile',compact('users'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Services\ApiResponseService;
use App\Services\OnlineStoreService;

use Illuminate\Http\Request;

class OnlineStoreController extends Controller
{


    protected $onlineStoreService;


    protected $apiResponse;



    function __construct(
        OnlineStoreService $onlineStore,
        ApiResponseService $apiResponseService
    ) {
        $this->onlineStoreService = $onlineStore;
        $this->apiResponse = $apiResponseService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.online_store.index');
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
            $onlineStore = $this->onlineStoreService->store($request->all());
            return $this->apiResponse->success(200,$onlineStore, 'Item Added Successfully');
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
            $onlineStores = $this->onlineStoreService->update($request->all(), $id);
            return $this->apiResponse->success(200, $onlineStores, 'Item has been updated');
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
            $this->onlineStoreService->delete($id);
            return $this->apiResponse->success(200, [], 'Item has been deleted');
        } catch (\Exception $e) {
            return $this->apiResponse->failed($e, 500, 'Item has not been deleted');
        }
    }

    public function getAllOnlineStore()
    {
        try {
            $onlineStore = $this->onlineStoreService->fetchAll();
            return response()->json(['data' => $onlineStore]);
        } catch (\Exception $e) {
            return $this->apiResponse->failed($e, 500, 'Error Occured');
        }
    }
}


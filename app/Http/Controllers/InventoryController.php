<?php

namespace App\Http\Controllers;

use App\Services\ApiResponseService;
use App\Services\InventoryService;
use Illuminate\Http\Request;
use DB;

class InventoryController extends Controller
{
    protected $inventoryService;


    protected $apiResponse;



    function __construct(
        InventoryService $inventory,
        ApiResponseService $apiResponseService
    ) {
        $this->inventoryService = $inventory;
        $this->apiResponse = $apiResponseService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.inventory.index');
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
        try {
            
            $inventory = $this->inventoryService->store($request->all());

            return $this->apiResponse->success(200, $inventory, 'Equipment Added Successfully');
        } catch (\Exception $e) {

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
            // dd($inventory);
            $inventory = $this->inventoryService->update($request->all(), $id);
            return $this->apiResponse->success(200, $inventory, 'Inventory has been updated');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return $this->apiResponse->failed($e, 500, 'Error ocurred');
        }

        // try {
        //     $inventorys = $this->inventoryService->update($request->all(), $id);
        //     return $this->apiResponse->success(200, $inventorys, 'Inventory has been updated');
        // } catch (\Exception $e) {
        //     dd($e->getMessage());
        //     return $this->apiResponse->failed($e, 500, 'Error ocurred');
        // }

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
            $this->inventoryService->delete($id);
            return $this->apiResponse->success(200, [], 'Inventory has been deleted');
        } catch (\Exception $e) {
            return $this->apiResponse->failed($e, 500, 'Inventory has not been deleted');
        }
    }

    public function getAllInventory()
    {
        try {
            $inventory = $this->inventoryService->fetchAll();
            return response()->json(['data' => $inventory]);
        } catch (\Exception $e) {
            return $this->apiResponse->failed($e, 500, 'Error Occured');
        }
    }

    public function getNextService()
    {
        try {
            $nextService = DB::select(
            "   SELECT item_name, service_date
                FROM inventory
                WHERE service_date > NOW() 
                ORDER BY service_date 
                LIMIT 1
            "
            );

            return response()->json(['data' => $nextService]);

        } catch (\Exception $e) {
            // dd($e);
            return $this->apiResponse->failed($e, 500, 'Error Occured');
        }
    }
}

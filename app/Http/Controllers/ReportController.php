<?php

namespace App\Http\Controllers;
use App\Services\ApiResponseService;
use Illuminate\Http\Request;
use DB;
// use Response;

class ReportController extends Controller
{

    protected $apiResponse;



    function __construct(
        ApiResponseService $apiResponseService
    ) {
        $this->apiResponse = $apiResponseService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.reports.index');
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

    public function loadPaymentReports()
    {
        return view('admin.reports.paymentReports');
    }
    public function loadAttendanceReports()
    {
        return view('admin.reports.attendanceReports');
    }
    public function loadMemberReports()
    {
        return view('admin.reports.memberReports');
    }

    public function paymentReports(Request $data)
    {
        try {
            // dd($data);
            $dateFrom = $data['date_from'];
            $dateTo = $data['date_to'];
            $paymentType = $data['payment_type_id'];

            $paymentReport = DB::select(
            "   SELECT * 
                FROM lifefitness.member_payments
                inner join members on members.id = member_payments.member_id
                inner join payments_type on payments_type.id = member_payments.payment_type_id
                WHERE payment_type_id= '$paymentType'
                and date >= '$dateFrom' and date <= '$dateTo'
            "
            );

            return response()->json(['data' => $paymentReport]);
            return $paymentReport->paymentReportsResult();

        } catch (\Exception $e) {
            // dd($e);
            return $this->apiResponse->failed($e, 500, 'Error Occured');
        }
    }
    public function paymentReportsResult()
    {
        try {
            return response()->json(['data' => $paymentReport]);

        } catch (\Exception $e) {
            dd($paymentReport);
            return $this->apiResponse->failed($e, 500, 'Error Occured');
        }
    }
    // public function paymentReports()
    // {
    //     try {
    //         $paymentReport = DB::select(
    //         "   SELECT * 
    //             FROM lifefitness.member_payments
    //             inner join members on members.id = member_payments.member_id
    //             inner join payments_type on payments_type.id = member_payments.payment_type_id
    //             WHERE payment_type_id=2 
    //             and date >= '2021-02-01' and date <= '2021-04-01'
    //         "
    //         );

    //         return response()->json(['data' => $paymentReport]);

    //     } catch (\Exception $e) {
    //         // dd($e);
    //         return $this->apiResponse->failed($e, 500, 'Error Occured');
    //     }
    // }
}

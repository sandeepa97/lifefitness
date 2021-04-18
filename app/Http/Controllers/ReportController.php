<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

class ReportController extends Controller
{

    public function index()
    {
        return view('admin.reports.index');
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


    public function checkPaymentReport(Request $request){
        // dd($request);
        if ($request->payment_type_id != "0" && $request->date_from != null && $request->date_to != null){

            $payment_type_id = $request->payment_type_id;
            $dateFrom = $request->date_from;
            $dateTo = $request->date_to;

            $payments = DB::table('member_payments')->
                        join('payments_type', 'payments_type.id', '=', 'member_payments.payment_type_id')->
                        join('members', 'members.id', '=', 'member_payments.member_id')->
                        where('payment_type_id',$payment_type_id)->whereBetween('date',[$dateFrom, $dateTo])->get();
            $sum = DB::table('member_payments')->where('payment_type_id',$payment_type_id)->whereBetween('date',[$dateFrom, $dateTo])->sum('amount');
            return view('admin.reports.resultsPaymentReport',compact('payments','sum','payment_type_id','dateFrom','dateTo'));
        
        } else if($request->payment_type_id != "0" && $request->date_from == null && $request->date_to == null) {

            $payment_type_id = $request->payment_type_id;
            $payments = DB::table('member_payments')->
                        join('payments_type', 'payments_type.id', '=', 'member_payments.payment_type_id')->
                        join('members', 'members.id', '=', 'member_payments.member_id')->
                        where('payment_type_id',$payment_type_id)->get();
            $sum = DB::table('member_payments')->where('payment_type_id',$payment_type_id)->sum('amount');
            return view('admin.reports.resultsPaymentReport',compact('payments','sum','payment_type_id'));

        } else if($request->date_from != null && $request->date_to != null) {

            $dateFrom = $request->date_from;
            $dateTo = $request->date_to;
            $payments = DB::table('member_payments')->
                        join('payments_type', 'payments_type.id', '=', 'member_payments.payment_type_id')->
                        join('members', 'members.id', '=', 'member_payments.member_id')->
                        whereBetween('date',[$dateFrom, $dateTo])->get();
            $sum = DB::table('member_payments')->whereBetween('date',[$dateFrom, $dateTo])->sum('amount');
            return view('admin.reports.resultsPaymentReport',compact('payments','sum','dateFrom','dateTo')); 

        }
        else {
            $payments = DB::table('member_payments')->
                        join('payments_type', 'payments_type.id', '=', 'member_payments.payment_type_id')->
                        join('members', 'members.id', '=', 'member_payments.member_id')->
                        get();

            $sum = DB::table('member_payments')->sum('amount');

            return view('admin.reports.resultsPaymentReport',compact('payments','sum')); 
        }

    }


    public function checkAttendanceReport(Request $request){
        // dd($request);
        if ($request->member_id != "0" && $request->date_from != null && $request->date_to != null){

            $member_id = $request->member_id;
            $dateFrom = $request->date_from;
            $dateTo = $request->date_to;

            $attendances = DB::table('member_attendances')->
                        join('members', 'members.id', '=', 'member_attendances.member_id')->
                        where('member_id',$member_id)->whereBetween('member_in_date',[$dateFrom, $dateTo])->get();
            $count = count($attendances);
            return view('admin.reports.resultsAttendanceReport',compact('attendances','count','member_id','dateFrom','dateTo'));
        
        } else if ($request->member_id == "0" && $request->date_from != null && $request->date_to != null){

            $dateFrom = $request->date_from;
            $dateTo = $request->date_to;

            $attendances = DB::table('member_attendances')->
                        join('members', 'members.id', '=', 'member_attendances.member_id')->
                        whereBetween('member_in_date',[$dateFrom, $dateTo])->get();
            $count = count($attendances);
            return view('admin.reports.resultsAttendanceReport',compact('attendances','count','dateFrom','dateTo'));
        
        } else if ($request->member_id != "0" && $request->date_from == null && $request->date_to == null){

            $member_id = $request->member_id;

            $attendances = DB::table('member_attendances')->
                        join('members', 'members.id', '=', 'member_attendances.member_id')->
                        where('member_id',$member_id)->get();
            $count = count($attendances);
            return view('admin.reports.resultsAttendanceReport',compact('attendances','count','member_id'));
        
        } else {

            $attendances = DB::table('member_attendances')->
                        join('members', 'members.id', '=', 'member_attendances.member_id')
                        ->get();
            $count = count($attendances);
            return view('admin.reports.resultsAttendanceReport',compact('attendances','count'));

        }

    }

    public function checkMemberReport(Request $request){
        // dd($request);
        if ($request->member_id != "0"){

            $member_id = $request->member_id;

            $members = DB::table('members')->
                        where('id',$member_id)->get();
            $count = count($members);
            return view('admin.reports.resultsMemberReport',compact('members','count'));
        
        } else {

            $members = DB::table('members')->get();
            $count = count($members);
            return view('admin.reports.resultsMemberReport',compact('members','count'));

        }

    }


    

}

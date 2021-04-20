<?php

namespace App\Http\Controllers\Trainer;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class TrainerDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('trainer.dashboard.index');
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

    public function loadWorkoutSchedules()
    {
        return view('trainer.workout_schedules.index');
    }
    public function loadPaymentDetails()
    {
        $trainerId = Auth::guard('trainer')->user()->id;
        
        $payments = DB::table('trainer_payments')->
                    where('trainer_id', $trainerId)->
                    select('trainer_payments.id as paymentId', 'trainer_payments.*')->
                    get();
        // dd($payments);
        return view('trainer.payment_details.index',compact('payments'));
    }
    public function loadNotifications()
    {
        return view('trainer.notifications.index');
    }
    public function loadFeedbacks()
    {
        return view('trainer.feedbacks.index');
    }
    public function loadShifts()
    {
        $trainerId = Auth::guard('trainer')->user()->id;
        
        $shifts = DB::table('trainer_shifts')->
                    join('trainer_shifts_type', 'trainer_shifts_type.id', '=', 'trainer_shifts.shift_type_id')->
                    where('trainer_id', $trainerId)->
                    get();

        return view('trainer.shifts.index',compact('shifts'));
    }
}

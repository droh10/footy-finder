<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Models\RegisterSchedule;
use Illuminate\Support\Facades\Schema;

class RegisterScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, Schedule $schedule)
    {
        $user_id = rand(1,10);
        $schedule->registerSchedules()->create([
            'user_id'=>$user_id
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RegisterSchedule  $registerSchedule
     * @return \Illuminate\Http\Response
     */
    public function show(RegisterSchedule $registerSchedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RegisterSchedule  $registerSchedule
     * @return \Illuminate\Http\Response
     */
    public function edit(RegisterSchedule $registerSchedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RegisterSchedule  $registerSchedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RegisterSchedule $registerSchedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RegisterSchedule  $registerSchedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(RegisterSchedule $registerSchedule)
    {
        //
    }
}

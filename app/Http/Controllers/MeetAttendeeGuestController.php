<?php

namespace App\Http\Controllers;

use App\Models\Meet_attendee_guest;
use Illuminate\Http\Request;
use Session;

class MeetAttendeeGuestController extends Controller
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
    public function store(Request $request)
    {
        try{
            $result=Meet_attendee_guest::firstorcreate([
                'meeting_id'=>$request->meeting_id,
                'attendee_id'=>$request->attendee_id,
                'creator_id'=>$request->creator_id,
                'rsvp'=>'pending'
            ]);
            Session::flash('message', "The user has been successfully invited");
            return redirect()->route('home');
           return $result;
           
    } catch(Exception $e) {
         return response(['Deletion Not Successful'],401) ->header('Content-Type', 'text/plain');;
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meet_attendee_guest  $meet_attendee_guest
     * @return \Illuminate\Http\Response
     */
    public function show(Meet_attendee_guest $meet_attendee_guest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Meet_attendee_guest  $meet_attendee_guest
     * @return \Illuminate\Http\Response
     */
    public function edit(Meet_attendee_guest $meet_attendee_guest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Meet_attendee_guest  $meet_attendee_guest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meet_attendee_guest $meet_attendee_guest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meet_attendee_guest  $meet_attendee_guest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meet_attendee_guest $meet_attendee_guest)
    {
        //
    }
}

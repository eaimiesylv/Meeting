<?php

namespace App\Http\Controllers;

use App\Models\Meet_attendee_guest;
use Illuminate\Http\Request;
use App\Models\Meeting;
use App\Models\Meeting_attendee;
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
    public function create($meeting)
    {
       
        return view('meeting.guest_create',array('meeting'=>$meeting)); 
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
    public function show(Request $request)
    {
        $id=Meeting::select('id')->where('url',$request->url)->get();
       
        $names=Meet_attendee_guest::where('meeting_id',$id[0]->id)->where('attendee_id',"$request->name")->get();
        if(count($names)>0){
             $meeting=Meet_attendee_guest::where('attendee_id',$names[0]->attendee_id)
            ->with('meeting','meeting.user')
            ->get();
            return view('meeting.guest_rsvp',array('meeting'=>$meeting));
         }
        else{
            Session::flash('message', "This guest user does not exit");
            return redirect()->route('meeting');
        }
                //return \DB::getQueryLog();
        return $names;
        return $request->all();
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
        $rsvp=explode("#",$request->rsvp);
        $id=$rsvp[0];
        $val=$rsvp[1];
        $attendee=$rsvp[2];
        $product=Meet_attendee_guest::where('attendee_id',$attendee)->first();
        $product->update(['rsvp'=>$val]);
        Session::flash('message', "Rsvp invitation has been responded to");
        return redirect()->route('meeting');
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

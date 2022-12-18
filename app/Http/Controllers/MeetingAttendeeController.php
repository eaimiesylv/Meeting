<?php

namespace App\Http\Controllers;

use App\Models\Meeting_attendee;
use Illuminate\Http\Request;
use Auth;
use Session;
class MeetingAttendeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
      public function index()
    {
        return Meeting_attendee::paginate(20);
    }

    public function create()
    {
        
    }

   
    public function store(Request $request)
    {
       
        $str=(explode("#",$request->accesssibility));
       
   
           try{
			    $result=Meeting_attendee::firstorcreate([
                    'meeting_id'=>$str[0],
                    'attendee_id'=>$str[1],
                    'creator_id'=>$str[2],
                    'rsvp'=>'pending'
                ]);
                Session::flash('message', "The user has been successfully invited");
                return redirect()->route('home');
			   return $result;
               
        } catch(Exception $e) {
             return response(['Deletion Not Successful'],401) ->header('Content-Type', 'text/plain');;
        }
    }

    
    public function show($id)
    {
        return Meeting_attendee::findorFail($id);
    }

    
    public function edit()
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //return 'ok';
        $rsvp=explode("#",$request->rsvp);
        $id=$rsvp[0];
        $val=$rsvp[1];
        $product=Meeting_attendee::findorFail($id);
        $product->update(['rsvp'=>$val]);
        return redirect()->route('rsvp');
        return $product;
    }

   
    public function destroy($id)
    {
        try {
            $game =Meeting_attendee::findorFail($id)->delete();
            return response(['Deletion Successful'],200) ->header('Content-Type', 'text/plain');
        } catch(Exception $e) {
             return response(['Deletion Not Successful'],401) ->header('Content-Type', 'text/plain');;
        }
    }
    public function rsvp(){
       
        $meeting=Meeting_attendee::where('attendee_id',Auth::user()->id)
        ->with('meeting','meeting.user')
        ->get();
       // return $meeting;
        return view('meeting.rsvp',array('meeting'=>$meeting));
    }
}

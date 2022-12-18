<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Models\Meet_attendee_guest;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Auth;
use Session;

class MeetingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
      public function index()
    {
        $user_id=Auth::user()->id;
        $meeting=Meeting::where('user_id',$user_id)->get();
        $user=User::select(DB::raw("CONCAT(firstname,' ',lastname) AS fullname,id"))
        ->where('id','!=',$user_id)
        

        ->get();
       
       return view('meeting.index',array('meeting'=>$meeting,'user'=>$user));
    }

    public function create()
    {
       return view('meeting.create'); 
    }

   
    public function store(Request $request)
    {
        
        $request->validate([

            'name'=>'required|string',
            'description'=>['required', 'string', 'max:20'],
            'date'=>'required|date',
            'time'=>'required|string',
            'accesssibility'=>'required|string',
            'url'=>'required|string|unique:meetings',
          
           
           ]);
           try{
                $form=array_merge(array('user_id'=>Auth::user()->id),$request->except('_method', '_token'));
			    $result=Meeting::firstorcreate($form);
                Session::flash('message', "Meet has been created successfully");
                return redirect()->route('home');
			     return $result;
               
        } catch(Exception $e) {
             return response(['Deletion Not Successful'],401) ->header('Content-Type', 'text/plain');;
        }
    }

    
    public function show($id)
    {
        $meet_id=Meeting::findorFail($id);
        return view('meeting.show',array('meeting'=>$meet_id));
    }
    public function attendee($id)
    {
        $meet_id=Meeting::with('attendee','attendee.user')->findorFail($id);
        $guest=Meet_attendee_guest::where('meeting_id',$id)->get();
        return view('meeting.attendee',array('meeting'=>$meet_id,'guest'=>$guest));
    }

    
    public function edit()
    {
       
    }

   
    public function update(Request $request, $id)
    {
        
        $product=Meeting::findorFail($id);
        $product->update($request->all());
        return redirect()->route('home');
        return $product;
    }

   
    public function destroy($id)
    {
    
        try {
            $game =Meeting::findorFail($id)->delete();
            return redirect()->route('home');
            return response(['Deletion Successful'],200) ->header('Content-Type', 'text/plain');
        } catch(Exception $e) {
             return response(['Deletion Not Successful'],401) ->header('Content-Type', 'text/plain');;
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Meeting_poll_count;
use Illuminate\Http\Request;
use Session;

class MeetingPollCountController extends Controller
{
      public function index()
    {
        return Meeting_poll_count::paginate(20);
    }

    public function create()
    {
        
    }

   
    public function store(Request $request)
    {
        $val=explode('#',$request->poll);
       
        /*$request->validate([

            'attendee_id'=>'',
            'poll_question_id'=>'required|integer',
            'option_id'=>'required|integer',
            
           
           ]);*/
           try{
			    $result=Meeting_poll_count::Create([
                    'poll_question_id'=>$val[1],
                    'option_id'=>$val[2],  
                ]);
                Session::flash('message', "Poll has been submitted successfully");
                return redirect()->back();
			   return $result;
               
        } catch(Exception $e) {
             return response(['Deletion Not Successful'],401) ->header('Content-Type', 'text/plain');;
        }
    }

    
    public function show($id)
    {
        return Meeting_poll_count::findorFail($id);
    }

    
    public function edit()
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        $product=Meeting_poll_count::findorFail($id);
        $product->update($request->all());
        return $product;
    }

   
    public function destroy($id)
    {
        try {
            $game =Meeting_poll_count::findorFail($id)->delete();
            return response(['Deletion Successful'],200) ->header('Content-Type', 'text/plain');
        } catch(Exception $e) {
             return response(['Deletion Not Successful'],401) ->header('Content-Type', 'text/plain');;
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Meeting_poll;
use App\Models\Meeting;
use Illuminate\Http\Request;
use Auth;
use Session;

class MeetingPollController extends Controller
{
      public function index()
    {
       // $url=url()->full();
        $poll=Meeting_poll::with('meeting')->get();
        foreach($poll as $key=>$value){
             $poll[$key]['url']=url()->full()."/".$poll[$key]->id;
        }
    
        return view('poll.index',array('poll'=>$poll));
    }

    public function create()
    {
        $user_id=Auth::user()->id;
        $meeting=Meeting::select('id','name')->where('user_id',$user_id)->get();
        return view('poll.create',array('meeting'=>$meeting));
    }

   
    public function store(Request $request)
    {
       
        $request->validate([

            'meeting_id'=>'required|integer',
            'poll_question'=>'required|string',
           
           ]);
           try{
               $form=array_merge($request->except('_token'),array('creator_id'=>Auth::user()->id));
			$result=Meeting_poll::firstorcreate($form);
            Session::flash('message', "Poll has been created successfully");
            return redirect()->route('poll');
			   return $result;
               
        } catch(Exception $e) {
             return response(['Deletion Not Successful'],401) ->header('Content-Type', 'text/plain');;
        }
    }

    
    public function show($id)
    {
        $meeting_poll=Meeting_poll::select('id','poll_question')->with('poll_questions')->findorFail($id);
        $query="select count(option_id) as count,option_id as option 
        FROM meeting_poll_counts where poll_question_id = $id group by option_id ";
         $res=\DB::select($query);
        if(count($res)>0){
         foreach($res as $k=>$value){
           
             $map[]=["s".$value->option=>$value->count];
             
         }
       
        foreach($meeting_poll['poll_questions'] as $k=>$value){
             
             $p_id=$value['id'];
             $val="s".$p_id;
             if(isset($map[$k][$val])){
                  $optin_c=$map[$k][$val];
                  $meeting_poll['poll_questions'][$k]['count']=$optin_c;
             }
           
        }
    }
      // return $meeting_poll;
        return view('poll',array('meeting_poll'=>$meeting_poll));
    }

    
    public function edit()
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        $product=Meeting_poll::findorFail($id);
        $product->update($request->all());
        return $product;
    }

   
    public function destroy($id)
    {
        try {
            $game =Meeting_poll::findorFail($id)->delete();
            return response(['Deletion Successful'],200) ->header('Content-Type', 'text/plain');
        } catch(Exception $e) {
             return response(['Deletion Not Successful'],401) ->header('Content-Type', 'text/plain');;
        }
    }
}

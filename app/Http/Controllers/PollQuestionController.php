<?php

namespace App\Http\Controllers;

use App\Models\Poll_question;
use Illuminate\Http\Request;
use Session;

use Auth;

class PollQuestionController extends Controller
{
      public function index()
    {
        return Poll_question::paginate(20);
    }

    public function create($id,$name)
    {
        
        $poll=array('id'=>$id, 'name'=>$name);
        return view('poll_question.create',$poll);
    }

   
    public function store(Request $request)
    {
       
        $request->validate([

            'option'=>'required|string',
            'meeting_poll_id'=>'required|integer',
            'creator_id'=>'required|integer',
            
           ]);
           try{
            
			    $result=Poll_question::firstorcreate($request->except('_token'));
               
            Session::flash('message', "Poll Option has been created successfully");
            return redirect()->back();
			   return $result;
               
        } catch(Exception $e) {
             return response(['Deletion Not Successful'],401) ->header('Content-Type', 'text/plain');;
        }
    }

    
    public function show($id)
    {
        return Poll_question::findorFail($id);
    }

    
    public function edit()
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        $product=Poll_question::findorFail($id);
        $product->update($request->all());
        return $product;
    }

   
    public function destroy($id)
    {
        try {
            $game =Poll_question::findorFail($id)->delete();
            return response(['Deletion Successful'],200) ->header('Content-Type', 'text/plain');
        } catch(Exception $e) {
             return response(['Deletion Not Successful'],401) ->header('Content-Type', 'text/plain');;
        }
    }
}

@extends('layouts.app')

@section('content')
<div class="container content" style="">
	<div class="row"> 
		
			<h2 class="text-center mt-3">Poll Question:{{$name}}</h2>
		<div class="mt-2  col-sm-12 col-md-8 offset-2">
				@if (Session::has('message'))
					<div class="alert alert-success">{{ Session::get('message') }}</div>

				
				@endif

				
				  <form method="POST"  class="mt-3" action="/poll_question/store">
                        @csrf
						
						
                        <div class="row mb-2">


                         
                                <input type="hidden" value ="{{$id}}"  name="meeting_poll_id" readonly>
								 <input type="hidden" value ="{{Auth::user()->id}}"  name="creator_id" readonly>
                              

                            <label for="poll option" class="col-md-12 col-form-label text-md-start">{{ __('Poll option') }}</label>

                            <div class="col-md-12">
                                <input id="option" type="text" class="form-control @error('option') is-invalid @enderror" name="option" required autocomplete="current-poll_question">

                                @error('option')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Add Option
                                </button>
             
                            </div>
                        </div>
                    </form>
				
		
	    </div>
			  
    </div>
  
      
    
</div>
@endsection

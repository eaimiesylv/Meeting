@extends('layouts.app')

@section('content')
<div class="container content" style="">
	<div class="row"> 
		
			<h2 class="text-center mt-3">Create a new poll</h2>
		<div class="mt-2  col-sm-12 col-md-8 offset-2">
				
				  <form method="POST"  class="mt-3" action="/poll/store">
                        @csrf
						
                        <div class="row mb-2">
                            <label for="Meeting" class="col-md-12 col-form-label text-md-start">{{ __('Meeting') }}</label>

                            <div class="col-md-12">
                                <select class="form-select" name="meeting_id" aria-label="Default select example">
								<option disable>Select Meeting</option>
									@foreach($meeting as $key)
									<option value="{{$key->id}}">{{$key->name}}</option>
								
								@endforeach
								
							  </select>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="poll question" class="col-md-12 col-form-label text-md-start">{{ __('Poll question') }}</label>

                            <div class="col-md-12">
                                <input id="poll_question" type="poll_question" class="form-control @error('poll_question') is-invalid @enderror" name="poll_question" required autocomplete="current-poll_question">

                                @error('poll_question')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Create Poll
                                </button>
             
                            </div>
                        </div>
                    </form>
				
		
	    </div>
			  
    </div>
  
      
    
</div>
@endsection

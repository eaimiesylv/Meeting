@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
		@if (Session::has('message'))
					<div class="alert alert-success">{{ Session::get('message') }}</div>

				
				@endif
        <div class="col-md-8 m-3 p-3" style="background:white;">
			<h3 style="text-align:center">pick an option</h3>
			<h2 style="text-align:center;font-weight:bold;">This  Poll is on {{$meeting_poll->poll_question}}</h2>
			
			
            @foreach($meeting_poll->poll_questions as $key)
			  <div class="row">
			  
				  <div class="col-md-9" style="font-size:1.2em;margin:1em;">
				   <form action="/poll_count/store" method="post">
			   @csrf
				<input type="radio" onchange="this.form.submit()" 
							name="poll" 
							value="{{$key->option}}#{{$meeting_poll->id}}#{{$key->id}}"/> {{$key->option}}
					</form> 
					
				</div>
				
				<div class="col-md-1 "style="font-size:1.2em;margin:1em"></div>
			 </div>
			@endforeach
       </div>
           
    </div>
</div>
@endsection

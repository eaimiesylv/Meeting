@extends('layouts.app')

@section('content')
<div class="container content">
	<div class="row"> 
	
		  <a href="/poll/create">
			<button type="button" class="btn btn-primary m-2" style="width:150px">
				<!--<i class="fa-solid fa-plus"></i>-->
				Create poll
			</button>
		  </a>

			<div class="mt-2 col-sm-12 col-md-12">
				@if (Session::has('message'))
					<div class="alert alert-success">{{ Session::get('message') }}</div>

				
				@endif

					 @if(isset($poll))
					
					<p style="display:none">{{ $i=0 }}</p>
					 <table class="table table-striped">
						<tr>
							<th>No</th>
							<th>Meeting</th>
							<th>Poll question</th>
							<th>Poll Url</th>
							<th>Action</th>
							
							
						</tr>
						
						@foreach($poll as $key)
						  <tr>
							<td>{{ ++$i }}</td>
							<td>{{ $key->meeting->name}}</td>
							<td>{{ $key->poll_question}}</td>
							<td><a  href="{{ $key->url}}">{{ $key->url}}</a></td>
							<td>
								
								
								 
								  <a href="/poll_question/{{$key->id}}/{{$key->poll_question}}/create">Add Option</a>
								  
								
								
							</td>
							
						  </tr>
						 @endforeach
						 @else
							 <h5 class="alert alert-danger">Create a meet first</h5>
						 @endif
					
					 </table>
					
			</div>
		   
         
          
      </div>
      
      
    
</div>
@endsection


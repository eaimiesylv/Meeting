@extends('layouts.app')

@section('content')
<div class="container content" style="">
	<div class="row"> 
		
		
		<div class="mt-2  col-sm-12 col-md-8 offset-2">
			<div class="mt-2 col-sm-12 col-md-12">
					 <h2 class="text-center mt-3">Meeting Detail</h2>
					 
					 <table class="table table-striped">
						<tr>
							
							<th>Meeting</th>
							<th>Description</th>
							<th>Accessibility</th>
							<th>Date</th>
							<th>Time</th>
							<th>Url</th>
							
						</tr>
						<tr>
							
							<td>{{ $meeting->name }}</td>
							<td>{{ $meeting->description}}</td>
							<td>{{ $meeting->accesssibility}}</td>
							<td>{{ $meeting->date}}</td>
							<td>{{ $meeting->time}}</td>
							<td>{{ $meeting->url}}</td>
						</tr>
					 </table>
					 @if(isset($meeting->attendee))
					 <h4 class="text-center mt-3">Meeting Invitee</h4>
					<p style="display:none">{{ $i=0 }}</p>
					 <table class="table table-striped">
						<tr>
							<th>No</th>
							<th>Fullname</th>
							<th>Rsvp</th>
							
						</tr>
						 @if(count($meeting->attendee))
							@foreach($meeting->attendee as $key)
							  <tr>
								<td>{{ ++$i }}</td>
								<td>{{ $key->user->firstname." ".$key->user->lastname  }}</td>
								<td>{{ $key->rsvp  }}</td>
							  </tr>
							@endforeach
						  @else
							 <td colspan="3"><b></td>
						  @endif
						   @if(count($guest))
							@foreach($guest as $key)
							  <tr>
								<td>{{ ++$i }}</td>
								<td>{{ $key->attendee_id }}</td>
								<td>{{ $key->rsvp  }}</td>
							  </tr>
							@endforeach
						  @else
							 <td colspan="3"></td>
						  @endif
					 </table>
					 @endif


			</div>		
				  
	    </div>
			  
    </div>
  
      
    
</div>
@endsection

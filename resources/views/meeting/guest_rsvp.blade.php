@extends('layouts.app')

@section('content')
<div class="container content">
	<div class="row"> 
			<h3 class="text-center mt-3">Guest Meeting Invitations awaiting acceptance</h3>

			<div class="mt-2 col-sm-12 col-md-12">
			
					 @if(count($meeting))
					 
					<p style="display:none">{{ $i=0 }}</p>
					 <table class="table table-striped">
						<tr>
							<th>No</th>
							<th>Host Name</th>
							<th>Meeting</th>
							<th>Description</th>
							<th>Date</th>
							<th>Time</th>
							<th>Url</th>
							
							
							<th>Invitation</th>
						</tr>
						@foreach($meeting as $key)
						  <tr>
							<td>{{ ++$i }}</td>
							<td>{{ $key->meeting->user->firstname." ".$key->meeting->user->lastname }}</td>
							<td>{{ $key->meeting->name}}</td>
							<td>{{ $key->meeting->description}}</td>
							
			
							<td>{{ $key->meeting->date}}</td>
							<td>{{ $key->meeting->time}}</td>
							<td>{{ $key->meeting->url}}</td>
						
							<td>
							
								
							
								  <form action="guest_attendee/store" method="post" id="">
								    @csrf
								  @method('PUT')
									   <select class="form-select" onchange="this.form.submit()" name="rsvp" aria-label="Default select example">
									
									
												<option disabled selected>Pending</option>
												<option value="{{$key->id.'#'.'accepted'.'#'.$key->attendee_id}}" 
		{{ ( $key->rsvp == "accepted" ) ? 'selected' : '' }}>Accept</option>
												<option value="{{$key->id.'#'.'declined'.'#'.$key->attendee_id}}"
		{{ ( $key->rsvp == "declined" ) ? 'selected' : '' }}>Declined</option>
												
										 
								     
									   </select>
								
								  
								</form>
							</td>
						  </tr>
						@endforeach
					 </table>
					@else
					  No meeting Invitation at the moment
					@endif 

			</div>
		   
         
          
      </div>
      
      
    
</div>
@endsection
<script>
 /* 
window.onload = function() {
  //let frm = document.getElementById('search-theme-form') || null;
  //frm.action = "/charge";
      
};
function setattendee(a){
	//let action_name=a;
	let form = document.getElementById('meeting_attendee') || null;
    form.action = "attendee/store";
	 let hiddenInput = document.createElement('input');
	  hiddenInput.setAttribute('type', 'text');
	  hiddenInput.setAttribute('name', 'meeting');
	  hiddenInput.setAttribute('value', a.value);
	  form.appendChild(hiddenInput);
  form.submit();
  
}*/
</script>

@extends('layouts.app')

@section('content')
<div class="container content">
	<div class="row"> 
		  <a href="/meeting/create">
			<button type="button" class="btn btn-primary m-2" style="width:150px">
				<!--<i class="fa-solid fa-plus"></i>-->
				Create Meeting
			</button>
		  </a>

			<div class="mt-2 col-sm-12 col-md-12">
				@if (Session::has('message'))
					<div class="alert alert-success">{{ Session::get('message') }}</div>

				
				@endif

					 @if(count($meeting))
					 
					<p style="display:none">{{ $i=0 }}</p>
					 <table class="table table-striped">
						<tr>
							<th>No</th>
							<th>Meeting</th>
							<th>Description</th>
							<th>Accessibility</th>
							<th>Date</th>
							<th>Time</th>
							<th>Url</th>
							<th>View</th>
							<th>Update</th>
							<th>Delete</th>
							<th>Invitation</th>
						</tr>
						@foreach($meeting as $key)
						  <tr>
							<td>{{ ++$i }}</td>
							<td>{{ $key->name }}</td>
							<td>{{ $key->description}}</td>
							<td>{{ $key->accesssibility}}</td>
							<td>{{ $key->date}}</td>
							<td>{{ $key->time}}</td>
							<td>{{ $key->url}}</td>
							<td><a href="meeting/{{$key->id}}/attendee"><i class="fa-solid fa-eye"></i></a></td>
							<td><a href="meeting/{{$key->id}}/show"><i class="fa-solid fa-edit"></i></a></td>
							<td>
								
								<form action="meeting/{{$key->id}}" method="post">
								  @csrf
								  @method('DELETE')
								  <button class="btn" type="submit"><i class="fa-solid fa-trash"></i></button>
								  
								</form>
								
							</td>
							<td>
								
								  
								  @if($key->accesssibility == "private")
									  <form action="attendee/store" method="post" id="meeting_attendee">
								       @csrf
									   <select class="form-select" onchange="this.form.submit()" name="accesssibility" aria-label="Default select example">
									 @if(count($user)) 
										  
												<option disabled selected>Select Invitee</option>
												@foreach($user as $users)
												
												 <option value="{{$key->id.'#'.$users->id.'#'.$key->user_id}}">{{$users->fullname}}</option>
												@endforeach
										 
								      @else
											<option disable>No user available for invitation</option>
									 @endif
									   </select>
								 @else
									  <form action="guest_attendee/store" method="post" id="meeting_attendee">
										 @csrf
									 <input id="url" type="text" name="attendee_id" class="form-control" placeholder="enter invitee name"/>
									 <input type="hidden" name="meeting_id" value="{{$key->id}}"/>
									 <input type="hidden" name="creator_id" value="{{$key->user_id}}"/>
									  <input type="hidden" name="rsvp" value="pending"/>
									  
									 <input type="submit" class="btn btn-primary mt-1" value="invite"/>
								 @endif
								  
								</form>
							</td>
						  </tr>
						@endforeach
					 </table>
					@else
					  No meeting has been created
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

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
							<td><a href="meeting/{{$key->id}}/show"><i class="fa-solid fa-edit"></i></a></td>
							<td>
								
								<form action="meeting/{{$key->id}}" method="post">
								  @csrf
								  @method('DELETE')
								  <button class="btn" type="submit"><i class="fa-solid fa-trash"></i></button>
								  
								</form>
								
							</td>
							<td>
								
								  <form action="meeting/{{$key->id}}" method="post">
								  @if($key->accesssibility == "public")
									   <select class="form-select" onchange="setpayment(this)" name="accesssibility" aria-label="Default select example">
									 @if(count($user)) 
										  
												<option disabled selected>Select Inviteed</option>
												@foreach($user as $users)
												
												 <option value="{{$users->id.'#'.$key->user_id.'#'.$key->id}}">{{$users->fullname}}</option>
												@endforeach
										 
								      @else
											<option disable>No user has been added</option>
									 @endif
									   </select>
								 @else
									 <input id="url" type="text" class="form-control" placeholder="enter invitee name"/>
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
  
window.onload = function() {
  //let frm = document.getElementById('search-theme-form') || null;
  //frm.action = "/charge";
      
};
function setpayment(a){
	//let action_name=a;
	alert(a.value);
   /*
   let frm = document.getElementById('search-theme-form') || null;
 if(frm) {
  

    if( action_name=="stripe" ) {
          frm.action = "/charge";
      }
      else if( action_name=="paystack" ) {
          frm.action = "/pay";
      }
      else {
        frm.action = "/charge";
      }
  }*/
}
</script>

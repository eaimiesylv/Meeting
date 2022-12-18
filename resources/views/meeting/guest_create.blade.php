@extends('layouts.app')

@section('content')
<div class="container content" style="">
	<div class="row"> 
			@if (Session::has('message'))
					<div class="alert alert-danger">{{ Session::get('message') }}</div>

				
				@endif
			<h2 class="text-center mt-3">Search for guest invitation on {{$meeting}} meeting</h2>
		<div class="mt-2  col-sm-12 col-md-8 offset-2">
		
				  <form method="POST"  class="mt-3" action="/meet_url/show">
                        @csrf

                        <div class="row mb-2">
                            <label for="Guest name" class="col-md-12 col-form-label text-md-start">{{ __('Guest name') }}</label>

                            <div class="col-md-12">
                                <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Enter guest name"required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
							<input type="hidden" name="url" value="{{$meeting}}"/>
                        </div>

                       

                      

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Continue
                                </button>
             
                            </div>
                        </div>
                    </form>
		
	    </div>
			  
    </div>
  
      
    
</div>
@endsection

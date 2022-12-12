@extends('layouts.app')

@section('content')
<div class="container content" style="">
	<div class="row"> 
		
			<h2 class="text-center mt-3">Schedule a New meeting</h2>
		<div class="mt-2  col-sm-12 col-md-8 offset-2">
					
				  <form method="POST"  class="mt-3" action="/meeting/{{$meeting->id}}">
                        @csrf
						 @method('PUT')
                        <div class="row mb-2">
                            <label for="Meeting" class="col-md-12 col-form-label text-md-start">{{ __('Meeting') }}</label>

                            <div class="col-md-12">
                                <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name')?? $meeting->name}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="Description" class="col-md-12 col-form-label text-md-start">{{ __('Description') }}</label>

                            <div class="col-md-12">
                                <input id="description" type="description" class="form-control @error('description') is-invalid @enderror" 
								name="description" value="{{ old('description')?? $meeting->description}}" required autocomplete="current-description">

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="date" class="col-md-12 col-form-label text-md-start">{{ __('Date') }}</label>

                            <div class="col-md-12">
                                <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" required autocomplete="current-date" value="{{ old('date')?? $meeting->date}}">

                                @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-2">
                            <label for="time" class="col-md-12 col-form-label text-md-start">{{ __('Time') }}</label>

                            <div class="col-md-12">
                                <input id="time" type="time" class="form-control @error('time') is-invalid @enderror" name="time" required autocomplete="current-time" value="{{ old('time')?? $meeting->time}}">

                                @error('time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        

                        <div class="row mb-2">
                            <label for="accessibility" class="col-md-12 col-form-label text-md-start">{{ __('Accessibility') }}</label>

                            <div class="col-md-12">
							    
                                <select class="form-select" name="accesssibility" aria-label="Default select example">
								
								<option value="public"> Public</option>
								<option value="private">Private</option>
							  </select>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="url" class="col-md-12 col-form-label text-md-start">{{ __('Url') }}</label>

                            <div class="col-md-12">
                                <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url"
								required autocomplete="current-url"  value="{{ old('url')?? $meeting->url}}"      >

                                @error('url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update Meeting
                                </button>
             
                            </div>
                        </div>
                    </form>
		
	    </div>
			  
    </div>
  
      
    
</div>
@endsection

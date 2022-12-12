@extends('layouts.app')

@section('content')
<div class="container bg-light" style="!important;height:80vh !important">
<div class="row"> 
    <div class="card bg-primary text-white col-sm-12 col-md-12">
        <div class="card-body"></div>
    </div>

    <div class="card mt-2  bg-light text-dark col-sm-12 col-md-12">
        <div class="card-body">
        <form method="post" action="/charge" name="search-theme-form" id="search-theme-form">
                  @csrf
            <h5>Change Mode of Payment:</h5>
            <select class="form-select" name="payment" onchange="setpayment(this)" aria-label="Default select example">
            <option disable>Change Payment Method</option>
            <option value="stripe" selected>Stripe</option>
            <option value="paystack">Paystack</option>
          </select>

        </div>
    </div>
   
          <div class="card mt-2  col-sm-12 col-md-12">
          
              <div class="card-body">
                <h4 class="card-title"> </h4>
                <p class="card-text"> 
                </p>
                
                  <input type="submit"  class="btn btn-success pay" value="Continue">
                </form>
                </div>
          </div>
          
      </div>
      </div>
      
    
</div>
@endsection

@extends('layouts.auth')

@section('title','Sign Up')

@section('content')

  <div class="row m-b-20">
      <div class="col-md-12">
          <h3 class="text-center txt-primary">Sign up</h3>
      </div>
  </div>
  <div class="form-group form-primary">
      <input type="text" name="name" class="form-control" required="" placeholder="Your Full Name">
      <span class="form-bar"></span>
  </div>
  <div class="form-group form-primary">
      <input type="email" name="email" class="form-control" required="" placeholder="Your Email Address">
      <span class="form-bar"></span>
  </div>
  <div class="row">
      <div class="col-sm-6">
          <div class="form-group form-primary">
              <input type="password" name="password" class="form-control" required="" placeholder="Password">
              <span class="form-bar"></span>
          </div>
      </div>
      <div class="col-sm-6">
          <div class="form-group form-primary">
              <input type="password" name="cpassword" class="form-control" required="" placeholder="Confirm Password">
              <span class="form-bar"></span>
          </div>
      </div>
  </div>
  <div class="form-group form-primary">
      <input type="text" name="address" class="form-control" required="" placeholder="Your Address">
      <span class="form-bar"></span>
  </div>
  <div class="form-group form-primary">
      <input type="text" name="mobile" class="form-control" required="" placeholder="Your Mobile Number">
      <span class="form-bar"></span>
  </div>
  <div class="row m-t-30">
      <div class="col-md-12">
          <button class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Sign up now</button>
      </div>
  </div>

@endsection

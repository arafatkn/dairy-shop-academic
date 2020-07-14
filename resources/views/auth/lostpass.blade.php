@extends('layouts.auth')

@section('title','Log In')

@section('content')

    <div class="row m-b-20">
        <div class="col-md-12">
            <h3 class="text-center">Lost Password?</h3>
        </div>
    </div>
    <div class="form-group form-primary">
        <input type="email" name="email" class="form-control" placeholder="Your Email" required>
        <span class="form-bar"></span>
    </div>
    <div class="row m-t-30">
        <div class="col-md-12">
            <button class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">Send Verification Email</button>
        </div>
    </div>

@endsection

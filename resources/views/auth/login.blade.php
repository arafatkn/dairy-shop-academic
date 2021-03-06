@extends('layouts.auth')

@section('title','Log In')

@section('content')

    <div class="row m-b-20">
        <div class="col-md-12">
            <h3 class="text-center">Sign In</h3>
        </div>
    </div>
    <div class="form-group form-primary">
        <input type="text" name="email" class="form-control" required="" placeholder="Your Email">
        <span class="form-bar"></span>
    </div>
    <div class="form-group form-primary">
        <input type="password" name="password" class="form-control" required="" placeholder="Password">
        <span class="form-bar"></span>
    </div>
    <div class="row m-t-25 text-left">
        <div class="col-12">
            <div class="checkbox-fade fade-in-primary d-">
                <label>
                    <input type="checkbox" value="" name="rem">
                    <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                    <span class="text-inverse">Remember me</span>
                </label>
            </div>
            <div class="forgot-phone text-right f-right">
                <a href="./lostpass" class="text-right f-w-600"> Forgot Password?</a>
            </div>
        </div>
    </div>
    <div class="row m-t-30">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">Sign In</button>
        </div>
    </div>

@endsection

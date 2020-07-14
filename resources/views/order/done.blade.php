@extends('layouts.user')

@section('title','Order Placed')

@section('content')

<div class="row">
    <div class="col-sm-12">

        <div class="card">
            <div class="card-block">
                <div class="confirmation">
                    <div class="text-primary m-b-20">
                        <div class="fa fa-check fa-2x"></div>
                    </div>
                    <div class="confirmation-content text-center">
                        <h3>Congratulations! Your Order has been placed.</h3>
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <p>

                                </p>
                                <button class="btn btn-primary m-y">Track Order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


@endsection
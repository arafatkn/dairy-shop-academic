@extends('layouts.user')

@section('title','Shipping Details')

@section('content')

<div class="row">
    <div class="col-sm-12">

        <div class="card">
            <div class="card-header">
                <h5>Enter Receiver's Details</h5>
            </div>
            <div class="card-block">
                <form method="post" action="">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Receiver Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" value="{{ old('name',$user->name) }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Receiver Address</label>
                        <div class="col-sm-10">
                            <input type="text" name="address" class="form-control" value="{{ old('address',$user->address) }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Mobile Number</label>
                        <div class="col-sm-10">
                            <input type="text" name="mobile" class="form-control" value="{{ old('mobile',$user->mobile) }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Order Type</label>
                        <div class="col-sm-10">
                            <select name="type" class="form-control" id="type">
                                <option value="onetime">One Time</option>
                                <option value="subscription">Subscription</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row d-none" id="typerow">
                        <label class="col-sm-2 col-form-label">Ending Date</label>
                        <div class="col-sm-10">
                            <input type="date" name="end_date" class="form-control" value="{{ old('end_date') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Message for us</label>
                        <div class="col-sm-10">
                            <textarea name="message" class="form-control">{{ old('message') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10"><button class="btn btn-primary">Continue to Payment</button></div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>


@endsection

@section('script')

<script type="text/javascript">

    $( document ).ready(function() {
        // DOM ready
        $('#type').change(function(e) {

            if($('#type').val()=="subscription")
            {
                $("#typerow").removeClass('d-none');
            }
            else
            {
                $("#typerow").addClass('d-none');
            }
        });
    });

</script>

@endsection
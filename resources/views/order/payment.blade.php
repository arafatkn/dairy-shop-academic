@extends('layouts.user')

@section('title','Last Step - Payment')

@section('content')

<div class="row">
    <div class="col-sm-12">

        <div class="card">
            <div class="card-header">
                <h5>Enter Payment Details</h5>
            </div>
            <div class="card-block">
                <form method="post" action="">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Card Number</label>
                        <div class="col-sm-10">
                            <input type="number" name="cardnum" class="form-control" value="{{ old('cardnum') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10"><button class="btn btn-primary">Pay Now</button></div>
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
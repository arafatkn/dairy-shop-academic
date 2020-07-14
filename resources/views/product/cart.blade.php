@extends('layouts.user')

@section('title','Shopping Cart')

@section('content')

<div class="row">
    <div class="col-sm-12">

        <div class="card">
            <div class="card-header">
                <h5>Shopping cart</h5>
            </div>
            <div class="card-block">
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Amount</th>
                                <th>Qty</th>
                                <th>Total Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($cart as $i=>$item)
                            <tr>
                                <td><img src="{{ url('/storage/images/products/'.$item->image) }}" width="100" /></td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->price }} Taka</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->price*$item->quantity }} Taka</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a role="button" class="btn btn-sm btn-warning" href="{{ $route }}/cart/remove/{{ $i }}">
                                            Remove
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <a role="button" href="{{ route('order.shipping') }}" class="btn btn-primary pull-right">Checkout</a>
                <a role="button" href="{{ route('index') }}" class="btn btn-primary pull-right m-r-10">Continue to Shopping</a>
            </div>
        </div>

    </div>
</div>


@endsection

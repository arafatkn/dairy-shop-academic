@extends('layouts.admin')

@section('title',$statusFull.' Orders')

@section('content')

<div class="row">
    <div class="col-sm-12">

        <div class="card">
            <div class="card-header">
                <h5>{{ $statusFull }} Orders</h5>
                <span></span>
            </div>
            <div class="card-block">
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User Name</th>
                                <th>Products</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Type</th>
                                <th>Shipping</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->user->name }}</td>
<?php $item->products=collect(json_decode($item->products)); ?>
                                <td>
                                @foreach($item->products as $product)
                                    {{ $product->name }} - {{ $product->quantity }} {{ $product->unit }} x {{ $product->price }} Taka
                                @endforeach
                                </td>
                                <td>{{ $item->amount }} Taka</td>
                                <td>{{ $item->status() }}<br/>{{ $item->payment() }}</td>
                                <td>{{ ucfirst($item->type) }}{{ $item->type=="subscription"?"<br/>".$item->end_date:"" }}</td>
                                <td>Name: {{ $item->name }}<br/>
                                    Address: {{ $item->address }}<br/>
                                    Mobile: {{ $item->mobile }}
                                </td>
                                <td>
                                    <div class="dropdown">
                                      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Mark As
                                      </button>
                                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    @foreach($statuslist as $k=>$v)
                                        <a class="dropdown-item" href="{{ $route }}/{{ $item->id }}/status/{{ $k }}">{{ $v }}</a>
                                    @endforeach
                                      </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('others')

    <div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="DeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-danger" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Are you sure?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Do you really want to delete?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <form action="./1" method="POST" id="delform">
                        @method('DELETE')
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@endsection

@section('script')

<script type="text/javascript">

	function deleteData(id)
    {
        $("#delform").attr('action', '{{ $route }}/'+id);
    }

</script>
@endsection

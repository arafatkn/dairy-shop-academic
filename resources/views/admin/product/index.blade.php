@extends('layouts.admin')

@section('title','Products')

@section('content')

<div class="row">
    <div class="col-sm-12">

        <div class="card">
            <div class="card-header">
                <h5>Products</h5>
                <span></span>
                <a href="{{ $route }}/create" role="button" class="btn btn-sm btn-primary pull-right"><i class="fa fa-plus-circle"></i> Add Product
                </a>
            </div>
            <div class="card-block">
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $item)
                            <tr>
                                <td><img src="{{ url('/storage/images/products/'.$item->image) }}" width="100" /></td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->stock }} {{ $item->unit }}</td>
                                <td>{{ $item->status() }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a role="button" class="btn btn-sm btn-primary" href="{{ $route }}/{{ $item->id }}/edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button class="btn btn-sm btn-danger" onclick="deleteData({{ $item->id }})" data-toggle="modal" data-target="#DeleteModal">
                                            <i class="fa fa-trash-o "></i>
                                        </button>
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

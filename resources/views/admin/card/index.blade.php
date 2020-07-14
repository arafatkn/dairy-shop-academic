@extends('layouts.admin')

@section('title','Cards')

@section('content')

<div class="row">
    <div class="col-sm-12">

        <div class="card">
            <div class="card-header">
                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#AddModal"><i class="fa fa-plus-circle"></i> Add New</button>
            </div>
            <div class="card-block">
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>Card Number</th>
                                <th>Amount</th>
                                <th>Remaining Balance</th>
                                {{-- <th>Status</th> --}}
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($cards as $item)
                            <tr>
                                <td>{{ $item->cardnum }}</td>
                                <td>{{ $item->amount }}</td>
                                <td>{{ $item->balance }}</td>
                                {{-- <td>{{ $item->status() }}</td> --}}
                                <td>
                                    <div class="btn-group" role="group">
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
    
    <div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="AddModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-primary" role="document">
            <div class="modal-content">
              <form action="{{ $route }}" method="POST" id="addform">
                <div class="modal-header">
                    <h4 class="modal-title">Add New Language</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label>Initial Balance:</label>
                      <input type="number" class="form-control" name="amount" required>
                    </div>
                    <div class="form-group">
                      <label>Quantity:</label>
                      <input type="number" class="form-control" name="quantity" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Cards</button>
                </div>
              </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

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

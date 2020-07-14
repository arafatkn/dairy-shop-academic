@extends('layouts.admin')

@section('title','Seminar Venue: '.$venue->name)

@section('card-header')
	<i class="fa fa-edit"></i> Seminar Venue: <i>{{ $venue->name }}</i>
	<div class="card-header-actions">
		<a role="button" class="btn btn-sm btn-primary" href="{{ $route }}"><i class="fa fa-arrow-left"></i> Back to List</a>
	</div>
@endsection
@section('card-body')
	<div class="row">
		<div class="col-sm-12 table-responsive">
			<table class="table table-striped table-bordered no-footer" style="border-collapse: collapse !important">
				<tbody>
					<tr>
						<th>Venue Name</th>
						<td>{{ $venue->name }}</td>
					</tr>
					<tr>
						<th>Number of Seat</th>
						<td>{{ $venue->seat }}</td>
					</tr>
					<tr>
						<th>Status</th>
						<td>{{ $venue->status() }}</td>
					</tr>
					<tr>
						<th>Actions</th>
						<td>
							<button class="btn btn-sm btn-info" data-toggle="modal" data-target="#EditModal">
								<i class="fa fa-edit"></i>
							</button>
							<button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#DeleteModal">
								<i class="fa fa-trash-o "></i> Delete
							</button>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12 table-responsive">
			<h5>Seminars in <i>{{ $venue->name }}</i></h5>
			<table class="table table-striped table-bordered no-footer" style="border-collapse: collapse !important">
				<thead>
					<tr role="row">
						<th>Date</th>
						<th>Seminar Title</th>
						<th>Speaker</th>
						<th>Duration</th>
						<th>Total Seat</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
				@if(isset($seminars) && $seminars->count()>0)
					@foreach ($seminars as $seminar)
					<tr>
						<td>{{ Carbon\Carbon::parse($seminar->date)->toDayDateTimeString() }}</td>
						<td><a href="{{ $route }}/{{ $seminar->id }}">{{ $seminar->title }}</a></td>
						<td><a href="/admin/users/{{ $seminar->speaker->id }}">{{ $seminar->speaker->name }}</a></td>
						<td>{{ $seminar->duration }} Minitues</td>
						<td>{{ $seminar->seat }}</td>
						<td>{{ $seminar->status() }}</td>
					</tr>
					@endforeach
				@else
					<tr colspan="7">
						<td>No Seminar in this venue</td>
					</tr>
				@endif
				</tbody>
			</table>
			{{ $seminars->links() }}
		</div>
	</div>
@endsection

@section('others')
		<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="EditModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-info" role="document">
			<div class="modal-content">
			  <form action="" method="POST" id="editform">
				<div class="modal-header">
					<h4 class="modal-title">Edit Seminar Venue</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  	<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					@method('PUT')
					{{ csrf_field() }}
					<div class="form-group">
				      <label for="usr">Venue Name:</label>
				      <input type="text" class="form-control" name="name" value="{{ $venue->name }}" required>
					</div>
					<div class="form-group">
				      <label>Number of Seat:</label>
				      <input type="number" class="form-control" name="seat" value="{{ $venue->seat }}" required>
					</div>
					<div class="form-group">
				      <label>Status:</label>
				      <select name="status" class="form-control" id="edit_status" required>
				      	@foreach ($statuslist as $k=>$v)
				      		<option value="{{ $k }}"{{ $venue->status==$k?" selected":"" }}>{{ $v }}</option>
				      	@endforeach
				      </select>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-info">Edit Venue</button>
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
					<p>Do you really want to delete <b id="delname">{{ $venue->name }}</b>?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<form action="{{ $route }}/{{ $venue->id }}" method="POST" id="delform">
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

	$( document ).ready(function() {
		// DOM ready

	});

</script>
@endsection
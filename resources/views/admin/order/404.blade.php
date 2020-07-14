@extends('admin.master')

@section('title','Department Not Found')

@section('card-header')
	<i class="fa fa-warning"></i> Not Found
	<div class="card-header-actions">
		<a role="button" class="btn btn-sm btn-primary" href="{{ $route }}"><i class="fa fa-arrow-left"></i> Back to Departments</a>
	</div>
@endsection
@section('card-body')
	<div class="row">
		<div class="col-sm-12">
			<h4>Department Not Found</h4>
		</div>
	</div>
@endsection
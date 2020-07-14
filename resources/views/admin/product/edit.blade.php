@extends('layouts.admin')

@section('title','Edit Product')

@section('content')

<div class="row">
    <div class="col-sm-12">

        <div class="card">
            <div class="card-block">
                <form method="post" action="{{ $route }}/{{ $product->id }}" enctype="multipart/form-data">
                	@csrf
                	@method('PUT')
                	<div class="form-group row">
				        <label class="col-sm-2 col-form-label">Product Image</label>
				        <div class="col-sm-10">
				            <input type="file" name="image" class="form-control" value="{{ old('image',$product->image) }}">
				        </div>
				    </div>
				    <div class="form-group row">
				        <label class="col-sm-2 col-form-label">Product Name</label>
				        <div class="col-sm-10">
				            <input type="text" name="name" class="form-control" value="{{ old('name',$product->name) }}">
				        </div>
				    </div>
				    <div class="form-group row">
				        <label class="col-sm-2 col-form-label">Product Price</label>
				        <div class="col-sm-10">
				            <input type="number" name="price" class="form-control" value="{{ old('price',$product->price) }}">
				        </div>
				    </div>
				    <div class="form-group row">
				        <label class="col-sm-2 col-form-label">Stock Quantity</label>
				        <div class="col-sm-10">
				            <input type="number" name="stock" class="form-control" value="{{ old('stock',$product->stock) }}">
				        </div>
				    </div>
				    <div class="form-group row">
				        <label class="col-sm-2 col-form-label">Unit</label>
				        <div class="col-sm-10">
				            <input type="text" name="unit" class="form-control" value="{{ old('unit',$product->unit) }}">
				        </div>
				    </div>
				    <div class="form-group row">
				        <label class="col-sm-2 col-form-label">Status</label>
				        <div class="col-sm-10">
				            <select name="status" class="form-control">
				            @foreach($statuslist as $k=>$v)
				                <option value="{{ $k }}"{{ $k==old('status',$product->status)?' selected':'' }}>{{ $v }}</option>
				            @endforeach
				            </select>
				        </div>
				    </div>
				    <div class="form-group row">
				        <label class="col-sm-2 col-form-label">Product Description</label>
				        <div class="col-sm-10">
				            <textarea name="description" class="form-control">{{ old('description',$product->description) }}</textarea>
				        </div>
				    </div>
				    <div class="form-group row">
				    	<div class="col-sm-2"></div>
				        <div class="col-sm-10"><button class="btn btn-primary">Edit Product</button></div>
				    </div>
				</form>
            </div>
        </div>
    </div>
</div>
@endsection
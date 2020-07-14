@extends('layouts.user')

@section('title', $product->name.' - Dairy Shop')

@section('content')

<div class="row">
    <div class="col-md-12">

        <div class="card product-detail-page">
            <div class="card-block">
                <div class="row">
                    <div class="col-lg-5 col-xs-12">
                        <div class="port_details_all_img row">
                            <div class="col-lg-12 m-b-15">
                                <div id="big_banner">
                                    <div class="port_big_img">
                                        <img class="img img-fluid" src="{{ url('/storage/images/products/'.$product->image) }}" alt="Big_ Details">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 product-right">
                                <div id="small_banner">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-xs-12 product-detail" id="product-detail">
                        <div class="row">
                            <div>
                                <div class="col-lg-12">
                                    <span class="txt-muted d-inline-block">Product Code: <a href="#!"> DS{{ $product->id }} </a> </span>
                                    <span class="f-right">Availablity : <a href="#!"> {{ $product->stock?'In Stock':'Out of Stock' }} </a> </span>
                                </div>
                                <div class="col-lg-12">
                                    <h4 class="pro-desc">{{ $product->name }}</h4>
                                </div>
                                <div class="stars stars-example-css m-t-15 detail-stars col-lg-12">
                                    {!! $product->ratingFA() !!}
                                </div>
                                <div class="col-lg-12">
                                    <span class="text-primary product-price"><i class="icofont icofont-cur-dollar"></i>{{ $product->price }} Taka <small>per {{ $product->unit }}</small></span> {{ $product->old_price?'<span class="done-task txt-muted">'.$product->old_price.' Taka</span>':'' }}
                                    <hr>
                                    <p>{{ $product->description }}</p>
                                    <hr>
                                    <h6 class="f-16 f-w-600 m-t-10 m-b-10">Quantity</h6>
                                </div>
                            <form method="post" action="{{ url('/products/cart') }}">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <div class="col-xl-8 col-sm-12">
                                    <div class="p-l-0 m-b-25">
                                        <div class="input-group">
                                            <input type="number" name="quantity" class="form-control input-number text-center" value="1">
                                            <span class="input-group-btn">
<button type="button" class="btn btn-default btn-number shadow-none btn-sm">{{ $product->unit }}
                                            </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-12 mob-product-btn">
                                    <button class="btn btn-primary waves-effect waves-light m-r-20">
                                        <i class="icofont icofont-cart-alt f-16"></i><span class="m-l-10">ADD TO CART</span>
                                    </button>
                                    </a>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="card product-detail-page">
    <ul class="nav nav-tabs md-tabs tab-timeline" role="tablist">
        <li class="nav-item">
            <a class="nav-link active f-18 p-b-0" data-toggle="tab" href="#description" role="tab">Description</a>
            <div class="slide"></div>
        </li>
        <li class="nav-item m-b-0">
            <a class="nav-link f-18 p-b-0" data-toggle="tab" href="#review" role="tab">Reviews</a>
            <div class="slide"></div>
        </li>
        <li class="nav-item m-b-0">
            <a class="nav-link f-18 p-b-0" data-toggle="tab" href="#addreview" role="tab">Add Review</a>
            <div class="slide"></div>
        </li>
    </ul>
</div>

<div class="card">
    <div class="card-block">

        <div class="tab-content bg-white">
            <div class="tab-pane active" id="description" role="tabpanel">
                <p>{{ $product->description }}</p>
            </div>
            <div class="tab-pane" id="review" role="tabpanel">
                <div class="row"> 
            @foreach($product->reviews as $review)
                <div class="col-md-6">
                    <div class="card text-center text-black bg-c-light">
                        <div class="card-block">
                            <div class="rating" align="left">{!! $review->ratingFA() !!}</div>
                            <div class="review" align="left">{{ $review->text }}</div>
                            <div class="user" align="right">By {{ $review->user->name }}, {{ $review->created_at->diffForHumans() }}</div>
                        </div>
                    </div>
                </div>
            @endforeach
                </div>
            </div>
            <div class="tab-pane" id="addreview" role="tabpanel">
            @guest
                <p><h6>You must <a href="{{ url('/auth/login?redir='.urlencode(url()->full())) }}">logged in</a> to post review.</h6></p>
            @endguest
            @auth
                <form method="post" action="{{ $route }}/reviews">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Rating</label>
                        <div class="col-sm-10">
                            <select name="rating" class="form-control">
                            @for($i=5;$i>0;$i--)
                                <option value="{{ $i }}"{{ $i==old('rating')?' selected':'' }}>{{ $i }}</option>
                            @endfor
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Review/Opinion</label>
                        <div class="col-sm-10">
                            <textarea name="text" class="form-control">{{ old('text') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10"><button class="btn btn-primary">Post Product</button></div>
                    </div>
                </form>
            @endauth
            </div>
        </div>
    </div>
</div>

@endsection

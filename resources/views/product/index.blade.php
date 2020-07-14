@extends('layouts.user')

@section('title','Dairy Shop')

@section('content')

<div class="row">
    @foreach($products as $item)
    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div class="card prod-view">
            <div class="prod-item text-center">
                <div class="prod-img">
                    <a href="{{ route('products.show',$item->id) }}" class="hvr-shrink">
                        <img src="{{ url('/storage/images/products/'.$item->image) }}" class="img-fluid o-hidden" alt="prod1.jpg">
                    </a>
                @if($item->old_price > $item->price)
                    <div class="p-sale"><a href=""> Sale </a></div>
                @elseif($item->created_at > now()->addDay(-7))
                    <div class="p-new"><a href="{{ route('products.show',$item->id) }}"> New </a></div>
                @endif
                </div>
                <div class="prod-info">
                    <a href="{{ route('products.show',$item->id) }}" class="txt-muted"><h4>{{ $item->name }}</h4></a>
                    <div class="m-b-10">
                        <label class="label label-success">{{ number_format( $item->reviews->sum('rating') / $item->reviews->where('rating','>',0)->count() , 2 ) }} <i class="fa fa-star"></i></label><a class="text-muted f-w-600">{{ $item->reviews->where('rating','>',0)->count() }} Ratings &amp; {{ $item->reviews->count() }} Reviews</a>
                    </div>
                    <span class="prod-price"><i class="icofont icofont-cur-taka"></i>
                        {{ $item->price }} <small>per {{ $item->unit }}</small>
                        @if($item->old_price)
                        <small class="old-price"><i class="icofont icofont-cur-taka"></i>{{ $item->old_price }}</small>
                        @endisset
                    </span>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection

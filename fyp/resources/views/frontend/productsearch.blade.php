@extends('frontend.main')
@section('content')
<div class="row" style="height:100vh;">
@if ($item->count() > 0)
            @foreach ($item as $ani)
            
               
                <div class="col-lg-3 text-center">
                    <div class="card border-0 bg-light mb-2">
                        <div class="card-body">
                            <img src="{{asset('uploads/product/images/'. $ani->image)}}" class="img-fluid" alt="">
                        </div>
                    </div>
                    <h6>{{$ani->name}}</h6>
                    <p>{{$ani->cost_price}}</p>
                    <p>{{$ani->description}} </p>
                    <a  class="btn btn-modern btn-primary mt-1 btn-wishlist"
                    user="@if (Auth::user()) {{ Auth::user()->id }} @else 0 @endif"
                    item="{{ $ani->id }}"><i class="fa fa-heart"></i>Wishlist </a>
                    <a  class="btn btn-modern btn-primary mt-1 btn-cart"
                    user="@if (Auth::user()) {{ Auth::user()->id }} @else 0 @endif"
                    item="{{ $ani->id }}"><i class="fa fa-heart"></i>Add to cart </a>
                   
                </div>
           
                @endforeach
                @else
                <div class="text-center">
                    <h5>No Results Found</h5>
                </div>
                
                @endif
</div>
        @endsection
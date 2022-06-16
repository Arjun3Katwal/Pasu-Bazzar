@extends('frontend.main')
@section('content')
<section class="top-banner">
  <div class="container py-5">
    <div class="row py-5">
      <div class="col-lg-7 pt-5 text-center">
        <h1 class ="pt-5" style= "font-size: 30px;"> “Until one has loved an animal, a part of one’s soul remains unawakened.”</h1>
      </div>
    </div>
  </div>
</section>

<section class="product">
        <div class="container py-6">
            <div class="row py-5">
                <div class="col-lg-5 m-auto text-center">
                    <h1>Welcome to New Animals</h1>
                    <h6 style="color: red;">pet animals</h6>
                </div>
            </div>
            
            <div class="row ">
            @foreach ($animal as $ani)
               
                <div class="col-lg-3 text-center mt-5">
                    <div class="card border-0 bg-light mb-2">
                        <div class="card-body">
                           <a href="{{url('/details', $ani->id)}}"  class="hre"><img style="height: 250px; width:500px"  src="{{asset('uploads/product/images/'. $ani->image)}}" class="img-fluid" alt="">
                           </a></div>
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
        </div>
            
        </div>
        
    </section>

@endsection
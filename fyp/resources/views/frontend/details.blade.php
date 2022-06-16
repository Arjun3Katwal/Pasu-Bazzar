@extends('frontend.main')
@section('content')
<style>
   
.rating-css div {
    color: #ffe400;
    font-size: 30px;
    font-family: sans-serif;
    font-weight: 800;
    text-align: center;
    text-transform: uppercase;
    padding: 20px 0;
  }
  .rating-css input {
    display: none;
  }
  .rating-css input + label {
    font-size: 50px;
    text-shadow: 1px 1px 0 #8f8420;
    cursor: pointer;
  }
  .rating-css input:checked + label ~ label {
    color: #b4afaf;
  }
  .rating-css label:active {
    transform: scale(0.8);
    transition: 0.3s ease;
  }
   </style>


<section class="container sproduct my-5 pt-5">
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
       <form action="{{ route('add-rating') }}" method="POST">
          @csrf
          <input type="hidden" name="items_id" value="{{$item->id}}">
         <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Rate {{$item->name}}</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <div class="rating-css">
               <div class="star-icon">
               @php 
                  $total = 5;
                  @endphp
                  @if ($my_rating)
                     @for ($i = 1; $i <= $my_rating->stars_rated; $i++)
                     <input type="radio" value="{{$i}}" name="product_rating" checked id="rating{{$i}}">
                     <label for="rating{{$i}}" class="fa fa-star"></label>
                     @endfor
                     
                  @php 
                  $total = 5 - $my_rating->stars_rated;
                  @endphp
                  @endif
                  
                  
                  
                  @for ($j = $item->stars_rated + 1; $j <= $total; $j++)
                     <input type="radio" value="{{$j}}" name="product_rating" id="rating{{$j}}">
                     <label for="rating{{$j}}" class="fa fa-star"></label> 
                  @endfor
                  
            </div>
         </div>
      </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
         <button type="submit" class="btn btn-primary">Submit</button>
         </div>
      </form>
    </div>
  </div>
</div>
   <div class="row row-sm">
      <div class="col-md-5">
         <img class="img-fluid w-30" style=" height:300px;" src="{{asset('uploads/product/images/'.$item->image)}}" alt="">
        
      </div>

      <div class="col-md-6">
            <div class="_product-detail-content">
               <p class="_p-name">{{$item->name}}  </p>
                  @php
                     $rate = number_format($avg);
                  @endphp
               <div>
                  
                  @for ($i = 1; $i <= $rate; $i++)
                     <i class="fa fa-star checked text-warning"></i>
                  @endfor

                  @for ($j = $rate + 1; $j <= 5; $j++)
                     <i class="fa fa-star"></i>
                  @endfor
                  
                  <span>{{ $rating->count() }} Ratings</span>
               </div>

               <div class="_p-price-box">
                  <div class="p-list">
                     <span class="price">{{$item->cost_price}}   </span>
                  </div>
                  <div class="_p-features">
                     <span>{{$item->description}} </span>
                                  
                  </div>
                  @if (Auth::check())
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                     Rate this Pet Animal
                  </button>
                  @endauth
                  
               </div>
            </div>
         </div>

      
</section>





@endsection
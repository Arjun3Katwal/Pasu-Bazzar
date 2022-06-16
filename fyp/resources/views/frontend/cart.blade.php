@extends('frontend.main')
@section('content')
    <main class="main">
         <div class="page-content">
            <div class="container">
            @if ($animal->count() > 0)
            <div class="col-lg-9">
                <table class="table table-cart table-amn">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th> 
                        </tr>
                    </thead>

                    <tbody>
                        @php $total = 0; 
                        @endphp
                        @foreach ($animal as $ani)
                            <tr>

                                <td>
                                    <img src="{{ asset('uploads/product/images/') }}/{{$ani->image}}" alt=""
                                        style="height:60px; width:100px; border-radius:10% " />
                                </td>
                                <td class="name-col mt-4"> {{ $ani->name }}</td>
                                <td class="name-col mt-4"> {{ $ani->description}}</td>
                                <td class="price-col mt-4"> {{ $ani->cost_price }}</td>
                                <td class="action-col">
                                </td>
                                <td class="remove-col"><a href="{{ route('removecart', $ani->id) }}"> <i class="fa fa-times" aria-hidden="true" style="margin-right: 30%"></i></a></td>
                                <!-- <td class="remove-col"><a href="{{ route('removewishlist', $ani->id) }}"
                                        class="btn btn-modern mt-2"><i class="icon-close"><i
                                                class="fa fa-trash-o"></i></a></td> -->
                            </tr>
                            
                            @php $total += $ani->cost_price ;
                            @endphp
                            
                        @endforeach
                        
                          

                    </tbody>
                    
                </table><!-- End .table table-wishlist -->
                </div>
                <div class="container m-2" >
                    <div class="container"style="padding-left:75%;">
                    <h5 >
                     your Total Amount:   {{$total}}
                    </h5>
                <a href="{{url('/')}}" class="name-col mt-4 btn btn-primary"> Continue Shopping</a>
            
                   <a href="{{url('/checkout')}}"  class="name-col mt-4 btn btn-primary"> Proceed to Checkout</a>
                
                    </div>
                    </div>
                @else
                <div class="text-center m-5">
                    <h5>No Data</h5>
                </div>
                
                @endif

            </div><!-- End .container -->
           
        </div><!-- End .page-content -->
        
    </main><!-- End .main -->
@endsection
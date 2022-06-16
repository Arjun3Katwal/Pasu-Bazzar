@extends('frontend.main')
@section('content')
    <main class="main">
         <div class="page-content">
            <div class="container">
                @if ($animal->count() > 0)

                <table class="table table-wishlist table-anm">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th> 
                        </tr>
                    </thead>

                    <tbody>

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
                                    <!-- <a style="margin-top: 10px;" class="btn btn-modern btn-primary mt-1 btn-cart"
                                        user="@if (Auth::user()) {{ Auth::user()->id }} @else 0 @endif"
                                        product="{{ $ani->id }}"> </i>Add to cart <i class="fa fa-shopping-cart"></i>
                                    </a> -->

                                </td>
                                <td class="remove-col"><a href="{{ route('removewishlist', $ani->id) }}"> <i class="fa fa-times" aria-hidden="true" style="margin-right: 30%"></i></a></td>
                                <!-- <td class="remove-col"><a href="{{ route('removewishlist', $ani->id) }}"
                                        class="btn btn-modern mt-2"><i class="icon-close"><i
                                                class="fa fa-trash-o"></i></a></td> -->
                            </tr>
                        @endforeach

                    </tbody>
                </table><!-- End .table table-wishlist -->
                @else
                <div class="text-center">
                    <h5>No Data</h5>
                </div>
                
                @endif

            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection
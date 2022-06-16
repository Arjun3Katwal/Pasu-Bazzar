@extends('vendor.header')
@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Products show</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Show Products</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
         
            <div class="col-sm-6">
                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <h5 class="card-title">Product Info</h5><br>
                        <div class="card-body">
                            <table class="table table-sm table-bordered">
                         
                                <tr>
                                    <td>Product Name</td>
                                    <td>{{$product->name}}</td>
                                </tr>
                                <tr>
                                    <td>Category</td>
                                    <td>{{$product->category['name']}}</td>
                                </tr>
                               
                                <tr>
                                    <td>Cost Price($)</td>
                                    <td>{{$product->cost_price}}</td>
                                </tr>
                               
                                <tr>
                                    <td>Description</td>
                                    <td>{{$product->description}}</td>
                                </tr>
                                

                             
                                
                               
                            </table>
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-sm btn-dark" href="{{route('viewProduct')}}"><i class="fa fa-arrow-left"></i></a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="c0l-sm-6">
                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <h5 class="card-title">Image</h5><br>
                        <div class="card-body text-center">
                            <img width="200px" src="{{asset('uploads/product/images/'.$product->image)}}">
                        </div>
                    </div>

                </div>
             
            </div>
        
        </div>

        <!-- /.col-md-6 -->
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->

@endsection
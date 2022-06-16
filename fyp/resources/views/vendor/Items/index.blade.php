@extends('vendor.header')
@section('content')


<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Products</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('createProduct')}}">Home</a></li>
                    <li class="breadcrumb-item active">Product List</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">


                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <h5 class="card-title">Product List</h5><br>

                        <a href="{{route('createProduct')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add Product</a><br><br>

                        <table class="table table-bordered datatable">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Images</th>
                                    <th>Category</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                     <th>Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($product as $pro)
                                <tr>
                                    <th scope="row">{{$i++}}</th>
                                    <td ><img  style="height:100px; width:100px;" src="{{asset('uploads/product/images/'.$pro->image)}}"></td>
                                    <td>{{$pro->category['name']}}</td>
                                    <td>{{$pro->name}}</td>
                                    <td>{{$pro->description}}</td>
                                    <td>{{$pro->cost_price}}</td>
                                    
<td>
                <?php if($pro->status == '1'){ ?>
                 <a href="{{route('statusproduct',$pro->id)}}" class="btn btn-success">Active</a>

                 <?php }else{ ?>
                <a href="{{route('statusproduct',$pro->id)}}" class="btn btn-danger">Inactive</a>
                <?php } ?>
                </td>
                                
                                    
                                    


                                    <td>

                                    <a href="{{route('showProduct', $pro->id)}}" class="btn btn-sm btn-primary">
                                            <i class="fa fa-desktop"></i>show
                                        </a>
                                        <a href="{{route('editProduct', $pro->id)}}" class="btn btn-sm btn-info">
                                            <i class="fa fa-edit"></i>Edit
                                        </a>

                                        <a href="{{route('deleteProduct', $pro->id)}}" class="btn btn-sm btn-danger sa-delete" data-form-id="product-delete-{{$pro->id}}">
                                            <i class="fa fa-trash"></i>Delete
                                        </a>

                                        <form id="product-delete-{{$pro->id}}" action="{{route('deleteProduct', $pro->id)}}">
                                            @csrf
                                            @method('DELETE')

                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!-- /.card -->
            </div>
            <!-- /.col-md-6 -->

            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->

    @endsection
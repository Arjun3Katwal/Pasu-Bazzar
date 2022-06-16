@extends('vendor.header')
@section('content')


<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Categories</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('createCategory')}}">Home</a></li>
                    <li class="breadcrumb-item active">Category List</li>
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
                        <h5 class="card-title">Category List</h5><br>

                        <a href="{{route('createCategory')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>  Add Category</a><br><br>

                        <table id="datatable" class="table table-bordered datatable">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th> Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($category as $cate)
                                <tr>
                                <th scope="row">{{$i++}}</th>
                                    <td>{{$cate->name}}</td>
                                   
                                    <td>
                                        <a href="{{route('editCategory', $cate->id)}}" class="btn btn-sm btn-info">
                                            <i class="fa fa-edit"></i>Edit
                                        </a>

                                        <a href="{{route('deleteCategory', $cate->id)}}"class="btn btn-sm btn-danger sa-delete" data-form-id="category-delete-{{$cate->id}}">
                                            <i class="fa fa-trash"></i>Delete
                                        </a>

                                        <form  id= "category-delete-{{$cate->id}}" action="{{route('deleteCategory', $cate->id)}}">
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
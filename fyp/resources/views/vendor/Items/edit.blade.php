@extends('vendor.header')
@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
<button type="button" class="btn btn-primary btn-sm mt-3 float-right repeatBtn" onclick="hello()"><i class="fa fa-plus "></i>Add Item</button>
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Products</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Edit</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<div class="content">
  <div class="container-fluid">
  <form action="{{route('updateProduct', $pro->id)}}"  method="POST" enctype="multipart/form-data">
    <div class="row">
      <div class="col-sm-6">


        <div class="card card-primary card-outline">
          <div class="card-body">
            <h5 class="card-title">Edit Product</h5><br>

           
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label>Category<span class="text-danger">*</span></label>
                  <select class=" form-control" aria-label="Default select example" name="category_id">
                    @foreach($category as $cate)
                    <option value="{{$cate->id}}">{{$cate->name}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label>NAME<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="name" placeholder="Enter product name" value="{{$pro->name}}">
                </div>

                <div class="form-group">
                  <label class="form-control-label" for="input-image">Images</label>
                  <input type="file" name="image" class="form-control">
                </div>

                <div class="form-group">
                  <label>Cost Price($)<span class="text-danger">*</span></label>
                  <input type="number" class="form-control" name="cost_price" placeholder="0" value="{{$pro->cost_price}}">
                </div>

                <div class="form-group">
                  <label>Description<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="description" placeholder="Enter description" value="{{$pro->description}}">
                </div>

                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>
              </div>
          </div>

        </div>
      </div><!-- /.card -->

  

      <div class="card-footer">
       
      </div>
      
    </div>
    <!-- /.col-md-6 -->
    </form>
    <!-- /.col-md-6 -->
  </div>
  <!-- /.row -->
</div><!-- /.container-fluid -->

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
<script>
  function hello() {
    var source = $('.repeat:first');
    clone = source.clone();
    clone.appendTo('.append-repeat');
  }

  function deleteDiv() {
    $(".repeat:first").remove()
  }
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('select').selectpicker();
    });
</script>
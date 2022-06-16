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
        <h1 class="m-0">Products</h1>
        <button type="button" class="btn btn-primary btn-sm mt-3 float-left repeatBtn" onclick="hello()"><i class="fa fa-plus "></i>Add Item</button>
      </div><!-- /.col -->
    
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<div class="content">
  <div class="container-fluid">
    <form action="/storeProduct" method="POST" enctype="multipart/form-data">
      <div class="row">
        <div class="col-sm-6">


          <div class="card card-primary card-outline">
            <div class="card-body">
              <h5 class="card-title">Create Product</h5><br>


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
                  <input type="text" class="form-control" name="name" placeholder="Enter product name">
                  @if($errors->has('name'))
                  <span class="text-danger">{{$errors->first('name')}}</span>
                  @endif
                </div>


                <div class="form-group">
                  <label class="form-control-label" for="input-image">Images</label>
                  <input type="file" name="image" class="form-control">
                </div>

                <div class="form-group">
                  <label>Cost Price($)<span class="text-danger">*</span></label>
                  <input type="number" class="form-control" name="cost_price" placeholder="0">
                  @if($errors->has('cost_price'))
                  <span class="text-danger">{{$errors->first('cost_price')}}</span>
                  @endif
                </div>

              


              

                <div class="form-group">
                  <label>Description<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="description" placeholder="Enter description">
                  @if($errors->has('description'))
                  <span class="text-danger">{{$errors->first('description')}}</span>
                  @endif
                </div>

                <div class="card-footer">
          <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>
        </div>
              </div>
            </div>

          </div>
        </div><!-- /.card -->

       

      

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
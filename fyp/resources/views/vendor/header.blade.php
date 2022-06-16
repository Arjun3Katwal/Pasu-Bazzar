<!DOCTYPE html>
<html lang="en">
@include('vendor.head')
<body>
   @include('vendor.sidenav') 
   <div class="main-content" id="panel">
   @include('vendor.navbar')
@yield('content')
</div>

   @include('vendor.script')
</body>

</html>
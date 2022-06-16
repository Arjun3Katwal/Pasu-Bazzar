<!DOCTYPE html>
<html lang="en">
@include('adminDashboard.head')
<body>
   @include('adminDashboard.sidenav') 
   <div class="main-content" id="panel">
   @include('adminDashboard.navbar')
@yield('content')
</div>

   @include('adminDashboard.script')
</body>

</html>
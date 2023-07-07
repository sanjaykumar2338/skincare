<!DOCTYPE html>
<html lang="en">
<head>
   @include('includes.head')
</head>
<body>
   @include('includes.header')
   @yield('content')

   <div class="about-section-3">
       @include('includes.map')
   </div>
   
   @include('includes.footer')
</body>
</html>
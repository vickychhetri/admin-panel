<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="_____Name_____">
    <link rel="icon" href="{{ asset('assets/logo/fav.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/logo/fav.png') }}" type="image/x-icon">
     <title>Welcome to Insurance - @yield('title')</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    
    
    @include('layouts.css')

    {{-- toastr --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    @yield('style') 
  </head>
  <body>
    <!-- login page start-->
    @yield('content')  
    <!-- latest jquery-->
    @include('layouts.script') 
    
   
    @if ( session('failed'))
      <script>
        $(document).ready(function(){
          toastr.error("{{session('failed')}}", 'Warning');
        });
      </script>
    @endif
    @if ( session('banned'))
    <h1>banned</h1>
      <script>
        $(document).ready(function(){
        toastr.error("{{session('banned')}}", 'Warning');
        });
      </script>
    @endif

    
    
    {{-- toastr --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  </body>
</html>
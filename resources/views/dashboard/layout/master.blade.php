<!doctype html>
<html lang="en">
  <head>
  	<title>Sidebar 04</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="{{ asset('backend/css/style.css') }}" rel="stylesheet">
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
        @include('dashboard.layout.sidenav')
        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
      @yield('content')
      </div>
		</div>

  
    <script src="{{ asset('backend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/js/popper.js') }}"></script>
    <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/js/main.js') }}"></script>

  </body>
</html>
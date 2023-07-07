<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
      <!-- jQuery -->
      <title>Ejobs4pros | Admin Dashboard</title>
      <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>
      <link href="{{url('/asset/chat/css/style.css')}}" rel="stylesheet" id="bootstrap-css">

      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	  <!-- Font Awesome -->
	  <link rel="stylesheet" href="{{url('/asset/customer/plugins/fontawesome-free/css/all.min.css')}}">
	  <!-- Ionicons -->
	  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	  <!-- Tempusdominus Bootstrap 4 -->
	  <link rel="stylesheet" href="{{url('/asset/customer/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
	  <!-- iCheck -->
	  <link rel="stylesheet" href="{{url('/asset/customer/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
	  <!-- JQVMap -->
	  <link rel="stylesheet" href="{{url('/asset/customer/plugins/jqvmap/jqvmap.min.css')}}">
	  <!-- Theme style -->
	  <link rel="stylesheet" href="{{url('/asset/customer/dist/css/adminlte.min.css')}}">
	  <!-- overlayScrollbars -->
	  <link rel="stylesheet" href="{{url('/asset/customer/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
	  <!-- Daterange picker -->
	  <link rel="stylesheet" href="{{url('/asset/customer/plugins/daterangepicker/daterangepicker.css')}}">
	  <!-- summernote -->
	  <link rel="stylesheet" href="{{url('/asset/customer/plugins/summernote/summernote-bs4.min.css')}}">
	  <style type="text/css">
	    .alert-info{
	      text-align: center;
	    }
	  </style>
      <style>
         .modal-dialog {
         width: 400px;
         margin: 30px auto;	
         }
      </style>
   </head>

   <body class="hold-transition sidebar-mini layout-fixed">
      

      <input type="hidden" name="main_url" id="main_url" value="{{url('/')}}">
      <input type="hidden" name="token" id="token" value="{{ csrf_token() }}">
   </body>

   <script src="{{url('/asset/chat/js/chat.js')}}?v={{time()}}"></script>  
</html>
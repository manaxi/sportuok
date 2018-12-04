<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
     <!-- Bootstrap core CSS-->
     <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

     <!-- Custom fonts for this template-->
     <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
 
     <!-- Page level plugin CSS-->
     <link href="/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
     <!-- Custom styles for this template-->
     <link href="/vendor/css/sb-admin.css" rel="stylesheet">   
</head>
<body id="page-top">
        @include('inc.navbar')   
        <div id="wrapper">
        @include('inc.sidebar')
    
          <div id="content-wrapper">
    
            <div class="container-fluid">
                @include('inc.messages')
                @yield('content')
    
            </div>
            <!-- /.container-fluid -->
    
    
          </div>
          <!-- /.content-wrapper -->
    
        </div>
        <!-- /#wrapper -->
    
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
          <i class="fas fa-angle-up"></i>
        </a>
   
    <!-- Bootstrap core JavaScript-->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="/vendor/chart.js/Chart.min.js"></script>
    <script src="/vendor/datatables/jquery.dataTables.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/vendor/js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="/vendor/js/demo/datatables-demo.js"></script>
    <script src="/vendor/js/demo/chart-area-demo.js"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
</body>
</html>

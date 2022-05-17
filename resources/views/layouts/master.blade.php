<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="icon" href="#" type="image/png">

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('/AdminLTE-2/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/AdminLTE-2/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/AdminLTE-2/dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('/AdminLTE-2/dist/css/skins/_all-skins.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('/AdminLTE-2/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    @stack('css')
</head>
<style type="text/css">
    * {
            margin: 0px auto;
            /*supaya layer otomatis mengisi dan ke tengah*/
        }

        body {
            font-family: calibri, verdana, sans-serif;
        }

        #wrapper {
            width: 100%;
        }

        #header {
            background: #0CC3AD;
            padding: 10px;
            z-index: 1000;

        }

        #header a {
            color: white;
            padding: inherit;
        }

        .sticky {
            position: fixed;
            top: 0;
            width: 100%;
        }


        #header a.title {
            color: #ffffff;
            font-weight: bold;
            text-decoration: none;
            font-size: 30px;
            line-height: 60px;
            padding: 0px 20px;
            /*mengatur jarak antara di kiri dan kanan saja*/
        }

        /* #content {
            position: relative;
            background: #eee;
            min-height: 1500px;
            /*tujuannya supaya konten terlihat berisi. Kalau sudah diisi teks, baris ini harus dihapus.*/
        margin: 0px 20px;
        }

        */ #footer {
            position: relative;
            background: #FF0000;
            height: 40px;
        }

        #footer a.title {
            color: #ffffff;
            text-decoration: none;
            font-size: 30px;
            line-height: 40px;
            float: right;
            padding: 0px 20px;
        }
</style>
<body class="hold-transition skin-purple-light sidebar-mini">
    <div class="wrapper" style="overflow:visible visible;">

        @includeIf('layouts.header')

        @includeIf('layouts.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    @yield('title')
                </h1>
                <ol class="breadcrumb">
                    @section('breadcrumb')
                        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                    @show
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                
                @yield('content')

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        @includeIf('layouts.footer')
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="{{ asset('AdminLTE-2/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('AdminLTE-2/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- Moment -->
    <script src="{{ asset('AdminLTE-2/bower_components/moment/min/moment.min.js') }}"></script>

    <!-- DataTables -->
    <script src="{{ asset('AdminLTE-2/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('AdminLTE-2/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('AdminLTE-2/dist/js/adminlte.min.js') }}"></script>
    <!-- Validator -->
    <script src="{{ asset('js/validator.min.js') }}"></script>

    <script>
       

         window.onscroll = function() {
            myFunction()
        };

        var widget = document.getElementById('header');
        var sticky = widget.offsetTop;

        function myFunction() {
            if (window.pageYOffset >= sticky) {
                widget.classList.add("sticky")
            } else {
                widget.classList.remove("sticky");
            }
        }
    </script>
    @stack('scripts')
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- <link rel="icon" href="#" type="image/png"> -->
    <link rel="icon" href="https://i.ibb.co/PWDXyMq/JAminilogo.png" type="image/png">

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

    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{ asset('/AdminLTE-2/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body>
<div class="wrapper">
    <section class="content">
        <h2 class="text-center text-bold">Cancel Transaction List</h2>
        <p>Period : {{ $from_date }} - {{ $to_date }}</p>                
        <table class="table table-bordered table-hover">
            <thead class="text-primary">
                <tr>
                    <th width="1%">Date</th>
                    <th width="1%">Invoice</th>
                    <th width="4%">Status</th>
                    <th width="13%">Product</th>
                    <th width="1%" class="text-right">Qty</th>
                    <th width="1%">Time</th>
                    <th width="12%">Reason</th>
                </tr>
            </thead>
            <tbody>
                @foreach($print_list as $list)
                    <tr>                
                        <td>{{ date("d/m/y",strtotime($list['date'])) }}</td>
                        <td>{{ $list['invoice'] }}</td>
                        <td style="background-color: #dd4b39;color: white;">{{ $list['status_trans'] }}</td>
                        <td>{{ $list['product'] }}</td>                         
                        <td class="text-right">{{ $list['qty'] }}</td>
                        <td>{{ $list['time'] }}</td>
                        <td>{{ $list['reason'] }}</td>
                    </tr>
                @endforeach()
            </tbody>
        </table>        
    </section>
</div>

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
<!-- bootstrap datepicker -->
<script src="{{ asset('/AdminLTE-2/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>  
<script>
    window.print();
</script>  
</body>
</html>

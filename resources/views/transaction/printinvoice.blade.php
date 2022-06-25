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
        <h2 class="text-center text-bold">{{ $company }}</h2>
        <div class="row">
            @foreach($transactionlist as $list)
            <div class="col-xs-4">
                <h4 class="text-bold">Customer:</h4>
                <p>{{ $list['company_name'] }}</p>
                <p>{{ $list['complete_address'] }}</p>
                <p>Contact {{ $list['contact'] }}</p>
            </div>
            <div class="col-xs-4">
                
            </div>
            <div class="col-xs-4">
                
            </div>
            <div class="col-xs-4 pull-right">
                <h4 class="text-bold">Receipt:</h4>
                <p>Invoice &nbsp;: {{ $list['invoice_number'] }}</p>
                <p>Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{ date("d/m/Y", strtotime($list['created_at'])) }}</p>
                <p>Method &nbsp;: {{ $list['payment_method'] }}</p>
                @if ($list['payment_method'] == 'transfer')
                    <p>Paid At &nbsp;&nbsp; : {{ date("d/m/Y H:m:s", strtotime($list['paid_at'])) }}</p>
                @else
                    <p>Paid At &nbsp;&nbsp; : </p>
                @endif
            </div>
            @endforeach
            <div class="col-lg-12">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="1%">No</th>
                            <th width="20%">Product Name</th>
                            <th width="8%" class="text-right">Price (Rp)</th>
                            <th width="1%" class="text-right">Qty</th>
                            <th width="1%">Unit</th>
                            <th width="8%" class="text-right">Total (Rp)</th>                                                                               
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transaction_item as $list)
                            <tr>                
                                <td width="1%">{{ $list['no'] }}</td>                            
                                <td>{{ $list['product_name'] }}</td>
                                <td class="text-right">{{ number_format($list['product_price']) }}</td>                           
                                <td class="text-right">{{ $list['product_qty'] }}</td>
                                <td>{{ $list['product_item'] }}</td>
                                <td class="text-right">{{ number_format($list['price_total']) }}</td>
                            </tr>
                        @endforeach()
                        <tr>                   
                            <th colspan="3" style="text-align: center;">GRAND TOTAL</th>
                            <th class="text-right">{{ $totqty }}</th> 
                            <th class="text-right" colspan="2">{{ $gtotal }}</th>
                        </tr>
                    </tbody>
                </table>    
            </div>            
        </div>
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

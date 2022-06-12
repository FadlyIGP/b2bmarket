@extends('layouts.master')

@section('title')
    Dashboard
    
    
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Dashboard</li>

@endsection

@section('content')
<style type="text/css">
    
</style>
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-4 col-xs-6" >
        <!-- small box -->
        <div class="small-box bg-aqua" style="border-radius: 5px;">
            <div class="inner">
                <h3>150</h3>
                <p>Products</p>
            </div>
            <div class="icon">
                <i class="fa fa-dropbox"></i>
            </div>
            <a href="#" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green" style="border-radius: 5px;">
            <div class="inner">
                <h3>1203</h3>
                <p>Transaction</p>
            </div>
            <div class="icon">
                <i class="fa fa-cart-arrow-down"></i>
            </div>
            <a href="#" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->    
    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red" style="border-radius: 5px;">
            <div class="inner">
                <h3>5</h3>
                <p>Contract</p>
            </div>
            <div class="icon" >
                <i class="fa fa-stumbleupon-circle"></i>
            </div>
            <a href="#" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>
<!-- /.row -->
<!-- Main row -->
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header with-border" style="border-radius: 20px;">
                <h3 class="box-title">Statistic Transaction</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="border-radius: 20px;">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="chart" style="height: 300px">
                            <!-- Sales Chart Canvas -->
                           <canvas id="myChart" style="width:50%;height: 300px"></canvas>
                        </div>
                        <!-- /.chart-responsive -->
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row (main row) -->
@endsection

@push('scripts')
<!-- ChartJS -->
{{-- <script src="{{ asset('AdminLTE-2/bower_components/chart.js/Chart.js') }}"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
{{-- <script>
var xValues = {!! json_encode($tanggal) !!};
var yValues = {!! json_encode($value) !!}; 

new Chart("myChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      fill: false,
      lineTension: 0,   
      backgroundColor: "rgba(0,0,255,1.0)",
      borderColor: "rgba(0,0,255,0.1)",
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    scales: {
      yAxes: [{ticks: {min: 0, max:50000}}],
    }
  }
});
</script> --}}

@endpush
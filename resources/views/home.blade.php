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
                <h3>{{ $summ_product }}</h3>
                <p>All Products</p>
            </div>
            <div class="icon">
                <i class="fa fa-dropbox"></i>
            </div>
            <a href="{{ url('/products') }}" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green" style="border-radius: 5px;">
            <div class="inner">
                <h3>{{ $summ_transaction }}</h3>
                <p>Today Transaction</p>
            </div>
            <div class="icon">
                <i class="fa fa-cart-arrow-down"></i>
            </div>
            <a href="{{ url('/transaction') }}" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->    
    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red" style="border-radius: 5px;">
            <div class="inner">
                <h3>5</h3>
                <p>All Contract</p>
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
        <!-- BAR CHART -->
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Monthly Statistic Transaction</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="chart">
                    <canvas id="barChart" style="height:285px"></canvas>
                </div>
            </div>
        </div>
    </div>
    <!-- /.col -->
</div>
<!-- /.row (main row) -->
@endsection

@push('scripts')
<!-- ChartJS -->
<script src="{{ asset('AdminLTE-2/bower_components/chart.js/Chart.js') }}"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script> -->

<script>
    $(function () {
        var areaChartData = {
          labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July', 
                    'August', 'September', 'October', 'november', 'December'],
          datasets: [
            {
              label               : 'Cancel Transaction',
              fillColor           : 'rgba(210, 214, 222, 1)',
              strokeColor         : 'rgba(210, 214, 222, 1)',
              pointColor          : 'rgba(210, 214, 222, 1)',
              pointStrokeColor    : '#c1c7d1',
              pointHighlightFill  : '#fff',
              pointHighlightStroke: 'rgba(220,220,220,1)',
              data                : {!! $data_cancelled !!}
            },
            {
              label               : 'Transaction Finished',
              fillColor           : 'rgba(60,141,188,0.9)',
              strokeColor         : 'rgba(60,141,188,0.8)',
              pointColor          : '#3b8bba',
              pointStrokeColor    : 'rgba(60,141,188,1)',
              pointHighlightFill  : '#fff',
              pointHighlightStroke: 'rgba(60,141,188,1)',
              data                : {!! $data_finished !!}
            }
          ]
        }

        //-------------
        //- BAR CHART -
        //-------------
        var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
        var barChart                         = new Chart(barChartCanvas)
        var barChartData                     = areaChartData
        barChartData.datasets[1].fillColor   = '#00a65a'
        barChartData.datasets[1].strokeColor = '#00a65a'
        barChartData.datasets[1].pointColor  = '#00a65a'
        var barChartOptions                  = {
          //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
          scaleBeginAtZero        : true,
          //Boolean - Whether grid lines are shown across the chart
          scaleShowGridLines      : true,
          //String - Colour of the grid lines
          scaleGridLineColor      : 'rgba(0,0,0,.05)',
          //Number - Width of the grid lines
          scaleGridLineWidth      : 1,
          //Boolean - Whether to show horizontal lines (except X axis)
          scaleShowHorizontalLines: true,
          //Boolean - Whether to show vertical lines (except Y axis)
          scaleShowVerticalLines  : true,
          //Boolean - If there is a stroke on each bar
          barShowStroke           : true,
          //Number - Pixel width of the bar stroke
          barStrokeWidth          : 2,
          //Number - Spacing between each of the X value sets
          barValueSpacing         : 5,
          //Number - Spacing between data sets within X values
          barDatasetSpacing       : 1,
          //String - A legend template
          legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
          //Boolean - whether to make the chart responsive
          responsive              : true,
          maintainAspectRatio     : true
        }

        barChartOptions.datasetFill = false
        barChart.Bar(barChartData, barChartOptions)
    })
</script>
@endpush
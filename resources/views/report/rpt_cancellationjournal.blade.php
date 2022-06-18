@extends('layouts.master')

@section('title')
Cancellation Journal
@endsection
@section('breadcrumb')
@parent
<li class="active">Cancellation Journal List</li>
@endsection

@section('content')
<div class="row">
	<div class="col-lg-2">
		<div class="box">			
			<div class="box-body">				
				<div class="form-group">
                	<label>From Date</label>
                	<div class="input-group date">
                  		<div class="input-group-addon">
                    		<i class="fa fa-calendar"></i>
                  		</div>
                  		<input type="text" class="form-control pull-right" id="datepicker1" name="fromdate" value="{{ $from_date }}" required>
                	</div>
              	</div>
              	<div class="form-group">
                	<label>To Date</label>
                	<div class="input-group date">
                  		<div class="input-group-addon">
                    		<i class="fa fa-calendar"></i>
                  		</div>
                  		<input type="text" class="form-control pull-right" id="datepicker2" name="todate" value="{{ $to_date }}" required>
                	</div>
              	</div>              	
              	<div class="form-group">
                	<a href="#" class="form-control btn btn-default" style="background-color: #2196f3;color: white;" id="search">
						<i class="fa fa-search"> Search</i> 
					</a> 
              	</div>              	
			</div>
		</div>
	</div>
	<div class="col-lg-10">
		<div class="box">	
		<a href="#" class="btn btn-primary btn-xs" id="print"><i class="fa fa-print"></i> Print</a>
			<div id="print_rpt">
				<h3 class="text-primary" style="text-align: center;"><b>Cancel Transaction List</b></h3>			
				<div class="box-body table-responsive">
					<table class="table table-bordered table-hover">
						<thead class=" text-primary">
							<tr>
								<th width="3%">Date</th>
								<th width="8%">Invoice</th>
								<th width="4%">Status</th>
								<th width="10%">Product</th>
								<th width="1%">Qty</th>
								<th width="1%">Time</th>
								<th width="10%">Reason</th>																				
							</tr>
						</thead>
						<tbody id="getdata">
							<!-- Data From rpt_cancellationlist.blade.php -->
						</tbody>
					</table>
					
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@push('scripts')
<script>
	$(function() {
		//Date picker
	    $('#datepicker1').datepicker({
	      autoclose: true
	    });
	    $('#datepicker2').datepicker({
	      autoclose: true
	    });
	});	
</script>

<script>
	/* Get Data  */
	$(document).on('click','#search', function(e){
	    e.preventDefault();

	    var from_date = document.getElementById('datepicker1').value;
	    var to_date   = document.getElementById('datepicker2').value;	  

      	$.ajax({
	        url: '/report/transaction/loadcancellation/',		               
	        type: 'GET',
	        data:{
	        	fromdate: from_date,
	        	todate: to_date
	        },
	        success: function(response){
    			$('#getdata').html(response);    			
        	}
	    });	   
	});		
</script>

<script>
	$(function () {
    $('#table_id').DataTable({
      'paging'      : false,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : false,
      'info'        : false,
      'autoWidth'   : false,
      'responsive'	: true
    })
  })
</script>

<script>
	$(document).on('click','#print', function(e){
	    e.preventDefault();

	    var from_date = document.getElementById('datepicker1').value;
	    var to_date   = document.getElementById('datepicker2').value;	  

	    var a = document.createElement('a');
	    a.href='/report/transaction/cancellation/print'+"?from_date="+from_date+"&to_date="+to_date;
	    a.target = '_blank';
	    document.body.appendChild(a);
	    a.click();  
	});
</script>
@endpush
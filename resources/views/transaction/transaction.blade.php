@extends('layouts.master')

@section('title')
Transactions
@endsection
@section('breadcrumb')
@parent
<li class="active">List Transactions</li>
@endsection

@section('content')
<style type="text/css">
    img {
        width:50%;height: 10%
    }
</style>
@if (session('success'))
	<div class="alert alert-info">
	  {{ session('success') }}
	  <a href="#" class="close" data-dismiss="alert" aria-label="close" style="color: #fff;">&times;</a>  
	</div>        
@endif 
@if (session('warning'))
	<div class="alert alert-warning">
	  {{ session('warning') }}
	  <a href="#" class="close" data-dismiss="alert" aria-label="close" style="color: #fff;">&times;</a>  
	</div>        
@endif 
<div class="row">
	<div class="col-lg-12">
		<div class="box">			
			<div class="box-body table-responsive">
				<table class="table table-bordered table-hover" id="table_id" width="100%">
					<thead class=" text-primary">
						<tr>
							<th width="1%">No</th>
							<th width="8%">Invoice</th>
							<th width="8%">Name</th>
							<th width="12%">Company</th>
							<th width="4%">Status</th>
							<th width="6%">Amount</th>												
							<th width="5%">Date</th>
							<th width="1%">Time</th>
							<th width="10%">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($transactionlist as $list)
						<tr>
							<td width="1%"></td>
							<td>{{ $list['invoice'] }}</td>
							<td>{{ $list['username'] }}</td>
							<td>{{ $list['company'] }}</td>
							@if ($list['status'] == 'New Order')
								<td style="background-color: #2196f3;color: white;">{{ $list['status'] }}</td>
							@elseif ($list['status'] == 'Processing')
								<td style="background-color: #605ca8;color: white;">{{ $list['status'] }}</td>
							@elseif ($list['status'] == 'On Delivery')
								<td style="background-color: #D81B60;color: white;">{{ $list['status'] }}</td>
							@elseif ($list['status'] == 'Finished')
								<td style="background-color: #00a65a;color: white;">{{ $list['status'] }}</td>
							@elseif ($list['status'] == 'Cancel Order')
								<td style="background-color: #dd4b39;color: white;">{{ $list['status'] }}</td>
							@endif	
							<td>{{ $list['amount'] }}</td>							
							<td>{{ date("d-M-Y",strtotime($list['created'])) }}</td>
							<td>{{ $list['time'] }}</td>
							<td>
								{!! Form::open() !!}								
								<a href="{{ url('/viewitem', $list['id']) }}" id="modal1" class="btn btn-xs btn-info" data-toggle="modal" data-id="{{ $list['id'] }}" title="View Detail">
									<i class="fa fa-list"></i>
								</a>									
								@if ($list['status'] == 'Processing')							
									<a href="#" id="modalupdatestat" data-target="#updatestat" class="btn btn-xs bg-maroon" data-toggle="modal" data-id="{{ $list['id'] }}" title="Upadte Status">
										<i class="fa fa-truck"></i>
									</a>
								@else
									<a href="#" class="btn btn-xs bg-maroon" title="Upadte Status" disabled>
										<i class="fa fa-truck"></i>
									</a>
								@endif								
								<a href="#" id="" data-target="#" class="btn btn-xs btn-primary" data-toggle="modal" data-id="{{ $list['id'] }}" title="Print Invoice">
									<i class="fa fa-print"></i>
								</a> 
								@if ($list['id_pay'] != '-1')
									<a href="#" id="modalpayment" class="btn btn-xs bg-orange" data-toggle="modal" data-id="{{ $list['id'] }}" title="View Payment">
										<i class="fa fa-money"></i>
									</a>        
								@else    
									<a href="#" class="btn btn-xs bg-orange" title="View Payment" disabled>
										<i class="fa fa-money"></i>
									</a> 
								@endif                  
								{!! Form::close()!!}
							</td>
						</tr>
						@endforeach()
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- Modal Transaction Item -->
<div class="modal fade" id="detailItem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
	        <div class="modal-header" style="background-color: #00c0ef">   
	            <h4 class="modal-title" style="color: white;">
	              <i class="fa fa-list"></i> Transaction Item
	              	<!-- <button class="close" type="button" data-dismiss="modal" aria-label="Close">
	              		<div class="pull-right" style="color: white;">x</div>
	        	  	</button> -->
	            </h4>                                
	        </div>
	        <div class="modal-body" id="body-item">
	            <!--Include showitem.blade.php here -->
	        </div>              
	        <div class="modal-footer">        		
                <a class="btn btn-default" data-dismiss="modal" aria-label="Close" style="border-radius: 5px;width:80px;background-color:#FF0000;color: white">
                    Back
                </a>
	        </div> 
	    </div>
 	</div>
</div>

<!-- Modal Update Status Transaction -->
<div class="modal fade" id="updatestat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
	        <div class="modal-header" style="background-color: #D81B60;">   
	            <h4 class="modal-title" style="color: white;">
	              <i class="fa fa-truck"></i> Transaction Update Status
	              	<!-- <button class="close" type="button" data-dismiss="modal" aria-label="Close">
	              		<div class="pull-right" style="color: white;">x</div>
	        	  	</button> -->
	            </h4>                                
	        </div>
	        {!! Form::open(['url'=>url('/transaction/updatestatus'),'method'=>'POST', 'autocomplete'=>'off']) !!}
	        <div class="modal-body" id="body-updatestat">
    			<div class="row">
    				<div class="col-sm-12">
    					<input type="hidden" name="idtrans" id="recid">
    					<div class="form-group">    						
    						<div class="col-sm-3">
		    					<div class="radio">
			                    	<label>
		                      			<input type="radio" name="radiostat" id="idradio0" value="0" disabled>
		                      			New Order
		                      		</label>
			                  	</div>
		                    </div>
		                    <div class="col-sm-3">
		    					<div class="radio">
			                    	<label>
		                      			<input type="radio" name="radiostat" id="idradio1" value="1" disabled>
	                      				Processing
		                      		</label>
			                  	</div>
		                    </div>
		                    <div class="col-sm-3">
		    					<div class="radio">
			                    	<label>
		                      			<input type="radio" name="radiostat" id="idradio2" value="2" checked>
	                      				Delivering
		                      		</label>
			                  	</div>
		                    </div>
		                    <div class="col-sm-3">
		    					<div class="radio">
			                    	<label>		                      			
	                      				<input type="radio" name="radiostat" id="idradio3" value="3" disabled>
	                      				Done
		                      		</label>
			                  	</div>
		                    </div>
	                  	</div>
    				</div>    				     				
    			</div>
	        </div>
	        <div class="modal-footer">
        		{!! Form::submit('Update', ['class'=>'btn btn-default','id' => 'check-send', 'style'=>'background-color:#32CD32;border-radius:5px;width:80px;color: white']) !!}
                &nbsp;&nbsp;
                &nbsp;&nbsp;
                <a class="btn btn-default" id="clearradio" data-dismiss="modal" aria-label="Close" style="border-radius: 5px;width:80px;background-color:#FF0000;color: white">
                    Cancel
                </a>
	        </div> 
	        {!! Form::close() !!}             
	    </div>
 	</div>
</div>

<!-- Modal Payment -->
<div class="modal fade" id="idviewpayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
	        <div class="modal-header" style="background-color: #FF851B">   
	            <h4 class="modal-title" style="color: white;">
	              <i class="fa fa-money"></i> Payment Detail
	              	<!-- <button class="close" type="button" data-dismiss="modal" aria-label="Close">
	              		<div class="pull-right" style="color: white;">x</div>
	        	  	</button> -->
	            </h4>                                
	        </div>

	        <div class="modal-body" id="body-payment">
	            <!--Include viewpayment.blade.php and Modal Footer here -->
	        </div>              
	        
	    </div>
 	</div>
</div>
@endsection

@push('scripts')
<script>
	/* Show Modal Detail Item Transaction */
	$('tbody').on('click','#modal1', function(e){
	    e.preventDefault();

	    const id = $(this).attr('data-id');
      	$.ajax({
	        url: 'viewitem/' + id,		               
	        dataType: 'html',
	        success: function(response){
    			$('#body-item').html(response);
        	}
	    });

	    $('#detailItem').modal('show');
	});

	/* Show Id Transaction */
	$('tbody').on('click','#modalupdatestat', function(e){
	    e.preventDefault();

	    const id = $(this).attr('data-id');
      	document.getElementById('recid').value = id;
	});	

	/* Show Modal Payment Detail */
	$('tbody').on('click','#modalpayment', function(e){
	    e.preventDefault();

	    const id = $(this).attr('data-id');
      	$.ajax({
	        url: 'viewpayment/' + id,		               
	        dataType: 'html',
	        success: function(response){
    			$('#body-payment').html(response);
        	}
	    });

	    $('#idviewpayment').modal('show');
	});
</script>

<script>
	//**datatable**//
	$(document).ready(function() {
		$('#table_id').DataTable({
			"columnDefs": [{
				"searchable": false,
				"ordering": true,
				"targets": 0,
				render: function(data, type, row, meta) {
					return meta.row + meta.settings._iDisplayStart + 1;
				}
			}],
			"aLengthMenu": [
				[5, 10, 25, 50, 75, 100, -1],
				[5, 10, 25, 50, 75, 100, "All"]
			],
			"iDisplayLength": 10,
			responsive: true,
		});

	});
</script>

<script>
    $(document).ready(function() {
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
            });
        }, 2500);
    });    
</script>
@endpush
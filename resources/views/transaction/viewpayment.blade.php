<!-- <div class="table-responsive">
	<table class="table table-bordered table-responsive table-hover" id="table_id" width="100%">
		<thead class=" text-primary">
			<tr>														
				<th width="15%">Method</th>
				<th width="10%">Account_No</th>
				<th width="10%">Bank_name</th>
				<th width="8%">Expected_Amount</th>			
				<th width="5%">Status</th>
				<th width="10%">Paid_At</th>
				<th width="10%">Picture</th>
				<th width="10%">Action</th>			
			</tr>
		</thead>
		<tbody>
				<tr>				
					<td>{{ $payment_list['payment_method'] }}</td>
					<td>{{ $payment_list['account_number'] }}</td>
					<td>{{ $payment_list['bank_code'] }}</td>
					<td>Rp {{ $payment_list['amount'] }}</td>
					<td>{{ $payment_list['status'] }}</td>							
					<td>{{ $payment_list['paid_at'] }}</td>	
					<td>{{ $payment_list['payment_picture'] }}</td>	
					<td>
						<a href="{{ url('/payment/updatestatus', $payment_list['id']) }}" class="btn btn-xs btn-success" title="Update Status">
							<i class="fa fa-check"> Update Status To Success</i>
						</a>
					</td>	
				</tr>
		</tbody>
	</table>
</div>
 -->

{!! Form::open(['url'=>url('/payment/payupdatestatus'),'method'=>'POST', 'autocomplete'=>'off']) !!}
<div class="row">	
	<input type="hidden" class="form-control" name="recidpay" id="idpay" value="{{ $payment_list['id'] }}">
	<input type="hidden" class="form-control" name="recidtrans" id="idtrans" value="{{ $payment_list['transaction_id'] }}">
	<div class="col-md-6">		
		<div class="form-group">          
          	<label>Method Payment</label>          
          	<input type="text" class="form-control" name="methodpay" id="idmethodpay" value="{{ $payment_list['payment_method'] }}" readonly>
        </div> 
        <div class="form-group">          
          	<label>Account Number</label>          
          	<input type="text" class="form-control" name="acctno" id="idacctno" value="{{ $payment_list['account_number'] }}" readonly>
        </div> 
        <div class="form-group">          
          	<label>Bank Name</label>          
          	<input type="text" class="form-control" name="bankname" id="idbankname" value="{{ $payment_list['bank_code'] }}" readonly>
        </div> 
        <div class="form-group">          
          	<label>Expected Amount</label>          
          	<input type="text" class="form-control text-bold" name="amount" id="idamount" value="Rp {{ $payment_list['amount'] }}" style="background: #00c0ef;" readonly>
        </div>      
        <div class="form-group">          
          	<label>Paid At</label>          
          	<input type="text" class="form-control" name="paid" id="idpaid" value="{{ $payment_list['paid_at'] }}" readonly>
        </div>   
	</div>
	<div class="col-md-6">		
		<div class="form-group">          
          	<label>Status Payment</label>  
          	@if ($payment_list['status'] == 'Waiting Payment')        
          		<input type="text" class="form-control" name="status" id="idstatus" value="{{ $payment_list['status'] }}" style="background: #2196f3;color: white;" readonly>
      		@elseif ($payment_list['status'] == 'Payment Check')
      			<input type="text" class="form-control" name="status" id="idstatus" value="{{ $payment_list['status'] }}" style="background: #fbc02d;color: white;" readonly>
  			@elseif ($payment_list['status'] == 'Success Payment')
      			<input type="text" class="form-control" name="status" id="idstatus" value="{{ $payment_list['status'] }}" style="background: #00a65a;color: white;" readonly>
  			@endif
        </div>         
        <div class="form-group">                    	
          	<img src="{{ url('/files/'.$payment_list['payment_picture']) }}" alt="image" style="width: 270px;height: 280px;">  
        </div>             
	</div>
</div>
<div class="modal-footer">    
	@if ($payment_list['status'] == 'Waiting Payment' OR $payment_list['status'] == 'Success Payment')    		
    	{!! Form::submit('Succes Payment', ['class'=>'btn btn-default','id'=>'check-send', 'style'=>'background-color:#32CD32;border-radius:5px;width:120px;color: white', 'disabled']) !!}
	@else
		{!! Form::submit('Succes Payment', ['class'=>'btn btn-default','id'=>'check-send', 'style'=>'background-color:#32CD32;border-radius:5px;width:120px;color: white;']) !!}
	@endif

    &nbsp;&nbsp;
    &nbsp;&nbsp;
    <a class="btn btn-default" id="clearradio" data-dismiss="modal" aria-label="Close" style="border-radius: 5px;width:80px;background-color:#FF0000;color: white">
        Cancel
    </a>
</div> 	        
{!! Form::close() !!}



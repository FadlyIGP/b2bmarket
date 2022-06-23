{!! Form::open(['url'=>url('/payment/payupdatestatus'),'method'=>'POST', 'autocomplete'=>'off']) !!}
<div class="row">	
	<input type="hidden" class="form-control" name="recidpay" id="idpay" value="{{ $payment_list['id'] }}">
	<input type="hidden" class="form-control" name="recidtrans" id="idtrans" value="{{ $payment_list['transaction_id'] }}">
	<div class="col-md-6">		
		<div class="form-group">          
          	<label>Method Payment</label>          
          	<input type="text" class="form-control" name="methodpay" id="idmethodpay" value="{{ $payment_list['payment_method'] }}" readonly>
        </div> 
        @if ($payment_list['account_number'] != '')
        <div class="form-group">          
          	<label>Virtual Account Number</label>          
          	<input type="text" class="form-control" name="acctno" id="idacctno" value="{{ $payment_list['account_number'] }}" readonly>
        </div> 
        @endif
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
  			@elseif ($payment_list['status'] == 'Cancelled Payment')
      			<input type="text" class="form-control" name="status" id="idstatus" value="{{ $payment_list['status'] }}" style="background: #dd4b39;color: white;" readonly>
  			@endif
        </div>
        <div class="form-group">          
          	<label>Phone/Telephone Number</label>          
          	<input type="text" class="form-control" name="paid" id="idpaid" value="{{ $payment_list['phone'] }} / {{ $payment_list['tel_number'] }}" readonly>
        </div>  
        @if ($payment_list['payment_method'] == 'transfer')
        <div class="form-group">                    	
          	<img src="{{ url('/paymentpicture/'.$payment_list['payment_picture']) }}" alt="image" style="width: 100%;">  
        </div>    
        @elseif ($payment_list['payment_method'] == 'tunai')  
        <div class="form-group">                      
            <img src="{{ url('/paymentpicture/method-tunai.jfif') }}" alt="image" style="width: 100%;">  
        </div> 
        @endif       
	</div>
</div>
<div class="modal-footer">    
  @if ($payment_list['payment_method'] == 'transfer')
  	@if ($payment_list['status'] == 'Waiting Payment' OR $payment_list['status'] == 'Success Payment' OR $payment_list['status'] == 'Cancelled Payment')
      	{!! Form::submit('Succes Payment', ['class'=>'btn btn-default','id'=>'check-send', 'style'=>'background-color:#32CD32;border-radius:5px;width:120px;color: white', 'disabled']) !!}
      	{!! Form::submit('Cancel Payment & Order', ['class'=>'btn btn-default','id'=>'check-cancel', 'style'=>'background-color:#dd4b39;border-radius:5px;width:170px;color: white', 'disabled']) !!}
    @else
    {!! Form::submit('Succes Payment', ['class'=>'btn btn-default','id'=>'check-send', 'style'=>'background-color:#32CD32;border-radius:5px;width:120px;color: white;']) !!}
    <a href="#" class="btn btn-default" style="background-color:#dd4b39;border-radius:5px;width:170px;color: white;" data-target="#cancelreason" data-toggle="modal" data-id="{{ $payment_list['id'] }}">Cancel Payment & Order</a>
    @endif
	@else
		{!! Form::submit('Processing Order', ['class'=>'btn btn-default','id'=>'check-send', 'style'=>'background-color:#32CD32;border-radius:5px;width:120px;color: white;']) !!}
		<!-- <a href="{{ url('/payment/payupdatestatus/cancelled', $payment_list['id']) }}" class="btn btn-default" style="background-color:#dd4b39;border-radius:5px;width:170px;color: white;" onclick="return confirm('Are you sure want to Cancel Payment and Order with Invoice {{ $payment_list['invoice'] }} ?')">Cancel Payment & Order</a> -->
    <a href="#" class="btn btn-default" style="background-color:#dd4b39;border-radius:5px;width:100px;color: white;" data-target="#cancelreason" data-toggle="modal" data-id="{{ $payment_list['id'] }}">Cancel Order</a>
	@endif
    <a class="btn btn-default" id="clearradio" data-dismiss="modal" aria-label="Close" style="border-radius: 5px;width:80px;background-color:#FF0000;color: white">
        Cancel
    </a>
</div> 	        
{!! Form::close() !!}

<!-- Modal Cancel Reason -->
{!! Form::open(['url'=>url('/payment/payupdatestatus/cancelled'),'method'=>'POST', 'autocomplete'=>'off']) !!}
<div class="modal fade" id="cancelreason" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header" style="background-color: #dd4b39">   
              <h4 class="modal-title" style="color: white;">
                <i class="fa fa-list"></i> Cancellation Payment & Order
                  <!-- <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <div class="pull-right" style="color: white;">x</div>
                </button> -->
              </h4>                                
          </div>
          <div class="modal-body">
              <div class="row">
                  <input type="hidden" class="form-control" name="recidpay" id="idpay" value="{{ $payment_list['id'] }}">
                  <input type="hidden" class="form-control" name="recidtrans" id="idtrans" value="{{ $payment_list['transaction_id'] }}">
                  <div class="col-md-12">    
                      <div class="form-group">
                          <label>Cancel Reason</label>          
                          <input type="text" class="form-control" name="cancelreason" id="idcancelreason" required>
                      </div>
                  </div> 
              </div>            
          </div>              
          <div class="modal-footer">  
                {!! Form::submit('Submit', ['class'=>'btn btn-default','id'=>'check-send', 'style'=>'background-color:#32CD32;border-radius:5px;width:80px;color: white;']) !!}

                <a class="btn btn-default" data-dismiss="modal" aria-label="Close" style="border-radius: 5px;width:80px;background-color:#FF0000;color: white">
                    Back
                </a>
          </div> 
      </div>
  </div>
</div>
{!! Form::close() !!}

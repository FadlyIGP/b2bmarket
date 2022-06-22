<style type="text/css">
	tr:nth-child(even) {
		background-color: transparent;
	}


</style>
<table id="" width="100%">
	<tbody>
		@foreach($listpesanan as $list)
			<tr>		
				<td width="10%">
					<center>
						<img src="{{ url('/files/'.$list['product_image']) }}" alt="defaultlogo" border="0" style="width: 50%;" />
					</center>
				</td>		
				<td width="20%">{{ $list['product_name'] }}</td>
				<td width="10%">Qty ( {{ $list['product_qty'] }} )</td>
				<td width="10%">{{ $list['price_total'] }}</td>
			</tr>
		@endforeach()
	</tbody>
</table>
<div style="padding-bottom: 5px"></div>
<table width="100%">
	<tbody>
		<tr>
			<td width="50%">
				Total 
			</td>
			<td width="50%">
				{{$expected_ammount}} 
			</td>
		</tr>
		<tr>
			<td width="50%">
				Bank Code
			</td>
			<td width="50%">
			   {{$payment->payment->bank_code}} 
			</td>
		</tr>
		<tr>
			<td width="50%">
				No Rek
			</td>
			<td width="50%">
			   {{$getrek->rek_number}} 
			</td>
		</tr>
	</tbody>
</table>
<div style="padding-bottom: 10px">
	<span style="color:#FF0000;font-family: 'Helvetica Neue';">
		Note: Silahkan transfer ke renening di atas dan upload bukti transfer ....
	</span>
</div>
<div>
	{!! Form::open(['url'=>url('/transactions'),'method'=>'POST', 'files'=>'true', 'class'=>'form-horizontal', 'autocomplete'=>'off','style'=>'margin-top:0px']) !!}
	<input type="hidden" name="tr_id" value="{{$payment->id}}">
	<input type="file" name="transfer_img" value="" required="">

	<button style="background-color: transparent;border-color: #FF0000;border-radius: 10px" type="submit">
		<span style="font-family: 'Helvetica Neue';color: orange">
			<b>
				Submit
			</b>
		</span>
	</button>
	{!! Form::close() !!}
</div>

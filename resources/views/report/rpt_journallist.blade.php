@foreach($journal_list as $list)
	<tr>				
		<td>{{ date("d/m/y",strtotime($list['date'])) }}</td>
		<td>{{ $list['invoice'] }}</td>
		@if ($list['status_trans'] == 'New Order')
			<td style="background-color: #2196f3;color: white;">{{ $list['status_trans'] }}</td>
		@elseif ($list['status_trans'] == 'Processing')
			<td style="background-color: #605ca8;color: white;">{{ $list['status_trans'] }}</td>
		@elseif ($list['status_trans'] == 'On Delivery')
			<td style="background-color: #D81B60;color: white;">{{ $list['status_trans'] }}</td>
		@elseif ($list['status_trans'] == 'Finished')
			<td style="background-color: #00a65a;color: white;">{{ $list['status_trans'] }}</td>
		@elseif ($list['status_trans'] == 'Cancel Order')
			<td style="background-color: #dd4b39;color: white;">{{ $list['status_trans'] }}</td>
		@endif	
		<td>{{ $list['product'] }}</td>
		<td>{{ $list['price'] }}</td>							
		<td>{{ $list['qty'] }}</td>
		<td>{{ $list['total'] }}</td>
		<td>{{ $list['time'] }}</td>
	</tr>
@endforeach()
<tr class="text-bold" style="background-color: #ffcc80;">					
	<td colspan="5" style="text-align: center;">GRAND TOTAL</td>
	<td>{{ $tot_qty }}</td>	
	<td>{{ $grand_total }}</td>
	<td></td>	
</tr>
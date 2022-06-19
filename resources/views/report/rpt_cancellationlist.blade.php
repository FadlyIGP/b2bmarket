
@foreach($journal_list as $list)
	<tr>				
		<td>{{ date("d/m/y",strtotime($list['date'])) }}</td>
		<td>{{ $list['invoice'] }}</td>
		<td style="background-color: #dd4b39;color: white;">{{ $list['status_trans'] }}</td>
		<td>{{ $list['product'] }}</td>							
		<td>{{ $list['qty'] }}</td>
		<td>{{ $list['time'] }}</td>
		<td>{{ $list['reason'] }}</td>
	</tr>
@endforeach()
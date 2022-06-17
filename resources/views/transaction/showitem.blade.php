<table class="table table-bordered table-responsive table-hover" id="table_id" width="100%">
	<thead class=" text-primary">
		<tr>														
			<th width="10%">Name</th>
			<th width="10%">Description</th>
			<th width="5%">Item</th>
			<th width="8%">Price</th>
			<th width="5%">Qty</th>
			<th width="8%">Total</th>
		</tr>
	</thead>
	<tbody>
		@foreach($transaction_item as $list)
			<tr>				
				<td width="10%">{{ $list['product_name'] }}</td>
				<td width="10%">{{ $list['product_descriptions'] }}</td>
				<td width="5%">{{ $list['product_item'] }}</td>
				<td width="8%">Rp {{ number_format($list['product_price']) }}</td>
				<td width="5%">{{ $list['product_qty'] }}</td>							
				<td width="8%">Rp {{ number_format($list['price_total']) }}</td>			
			</tr>
		@endforeach()
	</tbody>
</table>
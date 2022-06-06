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

<div class="row">
	<div class="col-lg-12">
		<div class="box">			
			<div class="box-body table-responsive">
				<table class="table table-bordered" id="table_id" width="100%">
					<thead class=" text-primary">
						<tr>
							<th width="1%">No</th>
							<th width="8%">Invoice</th>
							<th width="8%">Name</th>
							<th width="13%">Company</th>
							<th width="5%">Status</th>
							<th width="8%">Amount</th>												
							<th width="5%">Created</th>
							<th width="3%">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($transactionlist as $list)
						<tr>
							<td width="1%"></td>
							<td>{{$list['invoice']}}</td>
							<td>{{$list['username']}}</td>
							<td>{{$list['company']}}</td>
							<td>{{$list['status']}}</td>
							<td>{{$list['amount']}}</td>							
							<td>{{ date("d-M-Y",strtotime($list['created']))}}</td>
							<td>

							</td>
						</tr>
						@endforeach()
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection

@push('scripts')
<script>
	//**datatable**//
	$(document).ready(function() {
		$('#table_id').DataTable({
			"columnDefs": [{
				"searchable": false,
				"orderable": false,
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
@endpush
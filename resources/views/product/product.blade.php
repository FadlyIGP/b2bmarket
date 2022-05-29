@extends('layouts.master')

@section('title')
List Products
@endsection
@section('breadcrumb')
@parent
<li class="active">List Products</li>
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
			<div class="box-header with-border">
				<a href="{{ url('/products/create') }}" class="btn btn-info btn-xs btn-flat" style="border-radius: 5px"><i class="fa fa-plus-circle"></i>&nbsp; Add Product</a>
			</div>
			<div class="box-body table-responsive">
				<table class="table table-bordered" id="table_id" width="100%">
					<thead class=" text-primary">
						<tr>
							<th width="1%">No</th>
							<th width="4%">Name</th>
							<th width="10%">Descriptions</th>
							<th width="5%">Size</th>
							<th width="5%">Price</th>
							<th width="5%">Item</th>
							<th width="5%">Qty</th>
							<th width="10%">Image</th>
							<th width="5%">Created_at</th>
							<th width="5%">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($productlisting as $list)
						<tr>
							<td width="1%"></td>
							<td>{{$list['product_name']}}</td>
							<td>{{$list['product_descriptions']}}</td>
							<td>{{$list['product_size']}}</td>
							<td>{{$list['product_price']}}</td>
							<td>{{$list['product_item']}}</td>
							<td>{{$list['stock']}}</td>
							<td>
								<center>
									<img src="{{$list['image']}}" alt="Back to homepage" routerlink="main" class="responsive" tabindex="0" ng-reflect-router-link="main">
								</center>
							</td>
							<td>{{ date("d-M-Y",strtotime($list['created_at']))}}</td>
							<td>
								{!! Form::open() !!}
								<a href="{{ url('/products/edit',$list['id']) }}" value="" title="Edit Data" class="btn btn-xs btn-info btn-info"><i class="fa fa-pencil"></i>
								</a>
								<button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('yakin ingin menghapus data ini?')">
									<i class="fa fa-trash"></i>
								</button>
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
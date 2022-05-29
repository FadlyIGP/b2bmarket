@extends('layouts.master')

@section('title')
List Category
@endsection

@section('breadcrumb')
@parent

<li class="active">List Category</li>

@endsection

@section('content')


<div class="row">
	<div class="col-lg-12">
		<div class="box">
			<div class="box-header with-border">

				<a href="" class="btn btn-info btn-xs btn-flat" style="border-radius: 5px"><i class="fa fa-plus-circle"></i>&nbsp; Add Category</a>
			</div>
			<div class="box-body table-responsive">
				<table class="table table-bordered" id="table_id">
					<thead class=" text-primary">
						<tr>
							<th width="4%">No</th>
							<th scope="col">Name</th>
							<th scope="col">Company Name</th>
							<th scope="col">Created_at</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($categorylist as $list)
						<tr>
							<td width="4%"></td>
							<td>{{$list['name']}}</td>
							<td>{{$list['company_name']}}</td>
							<td>{{date("d-M-Y",strtotime($list['created_at']))}}</td>
							<td>
								{!! Form::open() !!}
								<a href="#" value="" title="Hapus Data" class="btn btn-xs btn-info btn-info"><i class="fa fa-pencil"></i>
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
	$(document).ready( function () {
		$('#table_id').DataTable({
			"columnDefs": [{
				"searchable": false,
				"orderable": false,
				"targets": 0,
				render: function (data, type, row, meta) {
					return meta.row + meta.settings._iDisplayStart + 1;
				}
			}],
			"aLengthMenu": [[5, 10, 25, 50, 75, 100, -1], [5, 10, 25, 50, 75, 100, "All"]],
			"iDisplayLength": 10,
			responsive: true,
		});

	});

</script>
@endpush

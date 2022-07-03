@extends('layouts.master')

@section('title')
List Contract
@endsection

@section('breadcrumb')
@parent
<li class="active">Product Offering</li>
@endsection

@section('content')

<div class="row">
	<div class="col-lg-12">
		<div class="box">
			<div class="box-header with-border">
				<a href="{{ url('#') }}" class="btn btn-primary btn-xs btn-flat" style="border-radius: 5px"><i class="fa fa-plus-circle"></i>&nbsp; Create</a>
			</div>
			<div class="box-body table-responsive">
				<table class="table table-bordered table-hover" id="table_id" style="width: 100%">
					<thead class=" text-primary">
						<tr>
							<th width="4%">No</th>
							<th scope="col">Title</th>
							<th scope="col">Mitra</th>
							<th scope="col">Created_at</th>
							<th scope="col">Product Name</th>
                            <th scope="col">Product Image</th>
                            <th scope="col">Product Price</th>
                            {{-- <th scope="col">Price Offering</th> --}}
                            {{-- <th scope="col">Price Quotation</th> --}}
                            <th scope="col">Action</th>

						</tr>
					</thead>
					<tbody>
						<tr>
                            @foreach($listdata as $list)
							<td width="4%"></td>
							<td>{{$list['title']}}</td>
							<td>{{$list['buyer_company']}}</td>
							<td>{{$list['created_at']}}</td>
							<td>{{$list['product_name']}}</td>
                            <td width="20%">
                                 <center>
                                    <img src="{{url('/files/'.$list['product_image'])}}" alt="Product img" class="responsive" style="width: 20%">
                                </center>

                            </td>
                            <td>{{$list['product_price']}}</td>
                            {{-- <td>{{$list['price_offering']}}</td> --}}
                            {{-- <td>{{$list['price_quotation']}}</td> --}}
                            <td><button>More</button> </td>
                            @endforeach()
						</tr>
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
				"ordering": true,
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

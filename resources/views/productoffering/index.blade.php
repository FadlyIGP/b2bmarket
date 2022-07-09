@extends('layouts.master')

@section('title')
List Contract
@endsection

@section('breadcrumb')
@parent
<li class="active">Product Offering</li>
@endsection

@section('content')
@include('sweetalert::alert')

<div class="row">
	<div class="col-lg-12">
		<div class="box">
			<div class="box-header with-border">
				<a href="{{ url('/offeringproducts/create') }}" class="btn btn-primary btn-xs btn-flat" style="border-radius: 5px"><i class="fa fa-plus-circle"></i>&nbsp; Create</a>
			</div>
			<div class="box-body table-responsive">
				<table class="table table-bordered table-hover" id="table_id" style="width: 100%">
					<thead class=" text-primary">
						<tr>
							<th width="4%">No</th>
							<th scope="col">Title</th>
							<th scope="col">Mitra</th>
							<th scope="col">Product Name</th>
                            <th scope="col">Product Image</th>
                            {{-- <th scope="col">Product Price</th> --}}
                            <th scope="col">Price Offering</th>
                            <th scope="col">Price Quotation</th>
                            <th scope="col">Action</th>

						</tr>
					</thead>
					<tbody>
                            @foreach($listdata as $list)
						<tr>
							<td width="4%"></td>
							<td>{{$list['title']}}</td>
							<td>{{$list['buyer_company']}}</td>
							<td>{{$list['product_name']}}</td>
                            <td width="20%">
                                 <center>
                                    <img src="{{url('/files/'.$list['product_image'])}}" alt="Product img" class="responsive" style="width: 20%">
                                </center>

                            </td>
                            <td>{{$list['price_offering']}}</td>
                            {{-- <td>{{$list['price_offering']}}</td> --}}
                            <td>{{$list['price_quotation']}}</td>
                            <td>
                                <a href="#" id="modal1" class="btn btn-xs btn-info" data-toggle="modal" data-id="{{ $list['id'] }}" title="Update price">
                                   <i class="fa fa-money"></i>
                                </a>

                             </td>
						</tr>
                            @endforeach()
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- Modal Transaction Item -->
<div class="modal fade" id="detailItem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #00c0ef">   
                <h4 class="modal-title" style="color: white;">
                  <i class="fa fa-list"></i>Update Price
                    <!-- <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <div class="pull-right" style="color: white;">x</div>
                    </button> -->
                </h4>                                
            </div>
            <div class="modal-body" id="body-item">
                <!--Include showitem.blade.php here -->
            </div>              
            <div class="modal-footer">              
                <a class="btn btn-default" data-dismiss="modal" aria-label="Close" style="border-radius: 5px;width:80px;background-color:#FF0000;color: white">
                    Back
                </a>
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

    /* Show Modal Detail Item Transaction */
    $('tbody').on('click','#modal1', function(e){
        e.preventDefault();

        const id = $(this).attr('data-id');
        $.ajax({
            url: 'offeringproducts/' + id,                     
            dataType: 'html',
            success: function(response){
                $('#body-item').html(response);
            }
        });

        $('#detailItem').modal('show');
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

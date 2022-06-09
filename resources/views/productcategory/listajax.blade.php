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

				<a href="{{ url('/productcategories/create') }}" class="btn btn-info btn-xs btn-flat" style="border-radius: 5px"><i class="fa fa-plus-circle"></i>&nbsp; Add Category</a>
			</div>
			<div class="box-body table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Address</th>
							<th>City</th>
						</tr>
					</thead>
					<tbody id="tblbody"></tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection

@push('scripts')
<script>

    $(document).ready( function () {
    	$.ajax({
    		url: "/sendtoajax", 
    		type: "GET",          
    		cache: true, 
    		success: function(response){
    			$.each(data,function(data){ 
    				$("#exampleid tbody").append(
    					"<tr>"
    					+"<td>"+data.id+"</td>"
    					+"<td>"+data.name+"</td>"
    					+"</tr>" )
    			})
    		}

    	});

</script>
@endpush

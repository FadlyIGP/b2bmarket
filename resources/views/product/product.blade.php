@extends('layouts.master')

@section('title')
List Products
@endsection
@section('breadcrumb')
@parent
<li class="active">Products</li>
@endsection

@section('content')
<style type="text/css">
    img {
        width:50%;height: 10%
    }
</style>
@if (session('success'))
    <div class="alert alert-info">
      {{ session('success') }}
      <a href="#" class="close" data-dismiss="alert" aria-label="close" style="color: #fff;">&times;</a>  
    </div>        
@endif 
@if (session('warning'))
    <div class="alert alert-warning">
      {{ session('warning') }}
      <a href="#" class="close" data-dismiss="alert" aria-label="close" style="color: #fff;">&times;</a>  
    </div>        
@endif 
<div class="row">   
    <div class="col-md-12">
            <div class="nav-tabs-custom tab-warning">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#account" data-toggle="tab">Product Listing</a></li>
                <li><a href="#bank" data-toggle="tab">Product History</a></li>                                 
            </ul>
            <div class="tab-content">               
                <div class="active tab-pane" id="account">
                    <div class="form-group">
                       <a href="{{ url('/products/create') }}" class="btn btn-primary btn-xs btn-flat" style="border-radius: 5px"><i class="fa fa-plus-circle"></i>&nbsp; Add Product</a>
                    </div>
                    <div class="form-group">
                      <table class="table table-bordered table-hover" id="table_id">
                        <thead class=" text-primary">
                         <tr>
                            <th width="1%">No</th>
                            <th width="20%">Name</th>
                            <!-- <th width="4%">Category</th>
                            <th width="10%">Descriptions</th> -->
                            <th width="3%">Size</th>
                            <th width="3%">Item</th>                                                    
                            <th width="3%">Qty</th>
                            <th width="8%">Price</th>
                            <th width="3%">MinOrder</th>
                            <th width="10%">Image</th>
                            <th width="5%">Created</th>
                            <th width="5%">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                          @foreach($productlisting as $list)                        
                        <tr>
                            <td width="1%"></td>
                            <td>{{ $list['product_name'] }}</td>
                            <!-- <td>{{ $list['category'] }}</td>
                            <td>{{ $list['product_descriptions'] }}</td> -->
                            <td>{{ $list['product_size'] }}</td>
                            <td>{{ $list['product_item'] }}</td>                                                        
                            @if ($list['stock'] <= 10)
                                <td style="background-color: #e53935;color: white;" title="Quantity Almost Empty">{{ $list['stock'] }}</td>
                            @else
                                <td>{{ $list['stock'] }}</td>
                            @endif
                            <td>{{ $list['product_price'] }}</td>
                            <td>{{ $list['min_order'] }}</td>
                            <td>
                                <center>
                                    <img src="{{ url('/files/'.$list['image']) }}" alt="Image Product" routerlink="main" class="responsive" tabindex="0" ng-reflect-router-link="main">
                                    <!-- <a href="{{ url('/products/edit/image', $list['id']) }}" title="Modify Image" class="btn btn-xs btn-info btn-warning">
                                        <i class="fa fa-pencil"></i>
                                    </a> -->
                                </center>
                            </td>
                            <td>{{ date("d-M-Y",strtotime($list['created_at']))}}</td>
                            <td>
                                {!! Form::open() !!}
                                <a href="{{ url('/products/edit',$list['id']) }}" title="Modify Product" class="btn btn-xs btn-info btn-warning">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a href="{{ url('/products/delete',$list['id']) }}" title="Delete Product" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure want to delete {{ $list['product_name'] }} ?')">
                                    <i class="fa fa-trash"></i>
                                </a>
                                {!! Form::close()!!}
                            </td>
                        </tr>
                        @endforeach()
                        </tbody>
                      </table>    
                    </div>
                </div>
                <div class="tab-pane" id="bank">
                    
                    <div class="form-group">
                      <table class="table table-bordered table-hover" id="table_id2" width="100%">
                        <thead class=" text-primary">
                          <tr>
                            <th width="5%">No</th>
                            <th width="30%" scope="col">Product Name</th>
                            <th width="20%" scope="col">Image</th>
                            <th width="20%" scope="col">User Company</th>
                            <th width="20%" scope="col">User Name</th>
                            <th width="5%" scope="col">Dilihat</th>
                            <th width="20%" scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($history as $list)
                          <tr>
                            <td width="5%"></td>
                            <td width="30%">{{$list['product_name']}}</td>
                            <td width="20%">
                                <center>
                                    <img src="{{url('/files/'.$list['product_image'])}}" alt="Bank Logo" class="responsive" width="30%">
                                </center>
                            </td>
                            <td width="15%">{{$list['buyer_company']}}</td>
                            <td width="15%">{{$list['buyer_name']}}</td>

                            <td width="5%">{{$list['counting']}} x</td>

                            <td width="10%">
                                {!! Form::open() !!}
                                  <a href="{{ url('#') }}" title="Modify Bank" class="btn btn-xs btn-warning">
                                      <span>Send Offering</span>
                                  </a>
                              
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

  //**datatable**//
  $(document).ready( function () {
    $('#table_id2').DataTable({
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
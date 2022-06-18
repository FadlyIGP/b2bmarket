@extends('layouts.master')

@section('title')
Product Image List
@endsection

@section('breadcrumb')
@parent
<li class="active">List Product Images</li>
@endsection

@section('content')
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
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header with-border">
                <a href="{{ url('/productimages/create') }}" class="btn btn-primary btn-xs btn-flat" style="border-radius: 5px"><i class="fa fa-plus-circle"></i>&nbsp; Add Image</a>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-bordered table-hover" id="table_id">
                    <thead class="text-primary">
                        <tr>
                            <th width="4%">No</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Image Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Created_At</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($image_list as $list)
                        <tr>
                            <td width="4%"></td>                           
                            <td>{{ $list['product_name'] }}</td>
                            <td>{{ $list['img_file'] }}</td>
                            <td>
                                <center>
                                    <img src="{{ url('/files/'.$list['img_file']) }}" alt="Image Product" class="responsive" width="100">
                                </center>
                            </td>
                            <td>{{ date("d-M-Y",strtotime($list['created_at'])) }}</td>
                            <td>
                                {!! Form::open() !!}
                                <a href="{{ url('/productimages/edit',$list['id']) }}" title="Modify Product Image" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
                                <a href="{{ url('/productimages/delete',$list['id']) }}" title="Delete Product Image" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure want to delete {{$list['img_file']}} ?')">
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
@extends('layouts.master')

@section('title')
Bank Account List
@endsection
@section('breadcrumb')
@parent
<li class="active">Bank Account</li>
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
    <div class="col-md-12">
		    <div class="nav-tabs-custom tab-warning">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#account" data-toggle="tab">Account Number</a></li>
              	<li><a href="#bank" data-toggle="tab">Bank</a></li>              	              	
            </ul>
            <div class="tab-content">            	
                <div class="active tab-pane" id="account">
                    <div class="form-group">
                        <a href="{{ url('/bankaccount/create') }}" class="btn btn-primary btn-xs btn-flat" style="border-radius: 5px"><i class="fa fa-plus-circle"></i>&nbsp; Add Account No</a>
                    </div>
                    <div class="form-group">
                      <table class="table table-bordered table-hover" id="table_id">
                        <thead class=" text-primary">
                          <tr>
                            <th width="4%">No</th>
                            <th scope="col">Bank Code</th>
                            <th scope="col">Account Number</th>
                            <th scope="col">Created</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($account_list as $list)
                          <tr>
                            <td width="4%"></td>
                            <td>{{ $list['bank_code'] }}</td>
                            <td>{{ $list['rek_number'] }}</td>
                            <td>{{ date("d-M-Y",strtotime($list['created_at'])) }}</td>
                            <td>
                              {!! Form::open() !!}
                              <a href="{{ url('/bankaccount/edit',$list['id']) }}" title="Modify Category" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
                              <a href="{{ url('/bankaccount/delete',$list['id']) }}" title="Delete Category" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure want to delete Account {{$list['rek_number']}} ?')">
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
                        <a href="{{ url('/bankaccount/bankcode/create') }}" class="btn btn-primary btn-xs btn-flat" style="border-radius: 5px"><i class="fa fa-plus-circle"></i>&nbsp; Add Bank</a>
                    </div>
                    <div class="form-group">
                      <table class="table table-bordered table-hover" id="table_id2">
                        <thead class=" text-primary">
                          <tr>
                            <th width="4%">No</th>
                            <th scope="col">Bank Code</th>
                            <th scope="col">Image</th>
                            <th scope="col">Created</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($bankcode_list as $list)
                          <tr>
                            <td width="4%"></td>
                            <td>{{ $list['bank_code'] }}</td>
                            <td>
                                <center>
                                    <img src="{{ url('/files/bank_logo/'.$list['bank_image']) }}" alt="Bank Logo" class="responsive" width="30%">
                                </center>
                            </td>
                            <td>{{ date("d-M-Y",strtotime($list['created_at'])) }}</td>
                            <td>
                              {!! Form::open() !!}
                              <a href="{{ url('/bankaccount/bankcode/edit',$list['id']) }}" title="Modify Bank" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
                              <a href="{{ url('/bankaccount/bankcode/delete',$list['id']) }}" title="Delete Bank" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure want to delete Bank Code {{$list['bank_code']}} ?')">
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
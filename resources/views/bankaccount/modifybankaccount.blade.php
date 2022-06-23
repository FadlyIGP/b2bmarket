@extends('layouts.master')

@section('title')
Add Bank Account
@endsection

@section('breadcrumb')
@parent
<li><a href="{{ url('/productcategories') }}">Bank Account</a></li>
<li class="active">Add Bank Account</li>
@endsection
@section('content')
@if (session('warning'))
    <div class="alert alert-warning">
      {{ session('warning') }}
      <a href="#" class="close" data-dismiss="alert" aria-label="close" style="color: #fff;">&times;</a>  
    </div>        
@endif 
<div class="row">
    <div class="col-lg-12">
        <div class="box" style="border-radius: 5px">
            {!! Form::open(['url'=>url('/bankaccount', $account_list['id']),'method'=>'PUT', 'files'=>'true', 'class'=>'form-horizontal', 'autocomplete'=>'off']) !!}
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="box-body">
                            <div class="col-md-12">
                                <div class="box-body col-md-6">{{-- kiri --}}
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="col-md-12">
                                                {!! Form::label('Bank Code:', '') !!}
                                                <select class="form-control select2" name="bankcode" id="idbankcode" required> 
                                                    <option value="{{ $account_list['bank_code'] }}">{{ $account_list['bank_code'] }}</option>
                                                    @foreach($bankcode_list as $bankcode_list)                   
                                                      <option value="{{ $bankcode_list->bank_code }}">{{ $bankcode_list->bank_code }}</option>
                                                    @endforeach              
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="col-md-12">
                                                {!! Form::label('Account Number:', '') !!}
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                                    <input type="text" class="form-control" id="idaccountno" name="accountno" value="{{ $account_list['rek_number'] }}" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="box-footer">
                        {!! Form::submit('Send', ['class'=>'btn btn-default','style'=>'background-color:#32CD32;border-radius:5px;width:80px;color: white']) !!}
                        &nbsp;&nbsp;
                        &nbsp;&nbsp;
                        <a class="btn" href="{{ url('/bankaccount') }}" title="Back Account List" style="border-radius: 5px;width:80px;background-color:#FF0000;color: white">
                            Back
                        </a>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>        
    </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
     $(document).ready(function() {
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
            });
        }, 2500);
    });   
</script>
@endpush
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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style type="text/css">
    .form-elements {
        margin-top: 10px;
    }

    #frm-add-data .form-group {
        margin-left: 13px;
    }
</style>
@if (session('warning'))
    <div class="alert alert-warning">
      {{ session('warning') }}
      <a href="#" class="close" data-dismiss="alert" aria-label="close" style="color: #fff;">&times;</a>  
    </div>        
@endif 
<div class="row">
    <div class="col-lg-12">
        <div class="box" style="border-radius: 5px">
            {!! Form::open(['url'=>url('/bankaccount'),'method'=>'POST', 'files'=>'true', 'class'=>'form-horizontal', 'autocomplete'=>'off']) !!}
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
                                                    <option value=""></option>
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
                                                    <input type="text" class="form-control" id="idaccountno" name="accountno" required>
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
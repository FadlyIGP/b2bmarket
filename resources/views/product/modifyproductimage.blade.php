@extends('layouts.master')

@section('title')
Modify Product Image
@endsection

@section('breadcrumb')
@parent
<li><a href="{{ url('/productcategories') }}">Product Images</a></li>
<li class="active">Modify Image</li>
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
            {!! Form::open(['url'=>url('/productimages', $image_list['id']),'method'=>'PUT', 'files'=>'true', 'class'=>'form-horizontal', 'autocomplete'=>'off']) !!}
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="box-body">
                            <div class="col-md-12">
                                <div class="box-body col-md-6">{{-- kiri --}}
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="col-md-12">
                                                {!! Form::label('Product Name:', '') !!}
                                                <input type="hidden" class="form-control" id="id_image" name="img_id">
                                                <input type="hidden" class="form-control" id="id_prod" name="id_prod" value="{{ $id_prod }}">
                                                <input type="text" class="form-control" id="product" name="id_product" value="{{ $product_name }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="col-md-12">
                                                {!! Form::label('Image:', '') !!}
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-image"></i></span>
                                                    <input type="file" class="form-control" id="image_name" name="image_name" required>      
                                                </div>
                                                <br>
                                                <img src="{{ url('/files/'.$image_list['img_file']) }}" alt="Image Product" class="responsive" width="100">
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
                        <a class="btn" href="{{ url('/productimages') }}" title="Back Image List" style="border-radius: 5px;width:80px;background-color:#FF0000;color: white">
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
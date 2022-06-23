@extends('layouts.master')

@section('title')
Add Product Image
@endsection

@section('breadcrumb')
@parent
<li><a href="{{ url('/productcategories') }}">Product Images</a></li>
<li class="active">Add Image</li>
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
            {!! Form::open(['url'=>url('/productimages'),'method'=>'POST', 'files'=>'true', 'class'=>'form-horizontal', 'autocomplete'=>'off']) !!}
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
                                                <select class="form-control select2" name="product" id="id_product" required> 
                                                    <option value=""></option>
                                                    @foreach($product_list as $product_list)                   
                                                      <option value="{{ $product_list->id }}">{{ $product_list->product_name }}</option>
                                                    @endforeach              
                                                </select>
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
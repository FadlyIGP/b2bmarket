@extends('layouts.master')

@section('title')
Modify Product
@endsection

@section('breadcrumb')
@parent
<li><a href="{{ url('/products') }}">List Product</a></li>
<li class="active">Modify Product</li>
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
<div class="row">
    <div class="col-lg-12">
        <div class="box" style="border-radius: 5px">

            {!! Form::open(['url'=>url('/products', $productlisting['id']), 'method'=>'PUT', 'files'=>'true', 'class'=>'form-horizontal', 'autocomplete'=>'off']) !!}
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="box-body">
                            <div class="col-md-12">
                                <div class="box-body col-md-6">     {{-- kiri --}}
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="col-md-12">
                                                {!! Form::label('Product Name:', '') !!}
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                                    <input type="text" class="form-control  has-feedback  " value="{{$productlisting['product_name']}}" id="prod_name" name="prod_name" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="col-md-12">
                                                {!! Form::label('Product Descriptions:', '') !!}
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                                    {!! Form::textarea('prod_desc', ($productlisting['product_descriptions']), ['class'=>'form-control ','required','placeholder' => '','style'=>'width:40%','style'=>'height:50px' ]) !!}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="col-md-12">
                                                {!! Form::label('Product Size:', '') !!}
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                                    <input type="text" class="form-control has-feedback" value="{{$productlisting['product_size']}}" id="prod_size" name="prod_size" required>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="col-md-12">
                                                {!! Form::label('Product Price:', '') !!}
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                                    <input type="text" class="form-control has-feedback" value="{{$productlisting['product_price']}}" id="prod_price" name="prod_price" required>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-body col-md-6">     {{-- kanan --}}
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="col-md-12">
                                                {!! Form::label('Product Item:', '') !!}
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                                    <input type="text" class="form-control has-feedback" value="{{$productlisting['product_item']}}" id="prod_item" name="prod_item" required>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="col-md-12">
                                                {!! Form::label('Product Qty:', '') !!}
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                                    <input type="text" class="form-control has-feedback" value="{{$productlisting['stock']}}" id="prod_qty" name="prod_qty" required>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="col-md-12">
                                                {!! Form::label('Product Category:', '') !!}
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>                                                    
                                                    <!-- {!! Form::select('prod_category', App\Models\ProdCategory::pluck('name','id')->all(), null, ['class'=>'form-control js-selectize','placeholder' => '']) !!} -->
                                                    <select class="form-control select2" name="prod_category" id="idprod_category" style="width: 100%;" required> 
                                                        <option value="{{ $productlisting['id_category'] }}">{{ $productlisting['product_category'] }}</option>
                                                        @foreach($category_list as $category_list)                   
                                                          <option value="{{ $category_list->id }}">{{ $category_list->name }}</option>
                                                        @endforeach              
                                                    </select>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="col-md-12">
                                                {!! Form::label('Minimum Order:', '') !!}
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                                    <input type="text" class="form-control has-feedback" value="{{ $productlisting['min_order'] }}" id="min_order" name="min_order" required>
                                                    </span>
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
                        <a class="btn" href="{{ url('/products') }}" title="Back Product List" style="border-radius: 5px;width:80px;background-color:#FF0000;color: white">
                            Back
                        </a>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}

        </div>

        <!-- <form class="form-inline" id="frm-add-data" action="javascript:void(0)">
            <div class="">
                <div>
                    <div class="form-group">
                        <label for="product_name">Product Name:</label>
                        <input type="file" class="form-control" id="product_name" placeholder="Enter name" name="product_name[]">
                    </div>

                    <div class="form-group">
                        <a href="javascript:void(0);" class="add_button" title="Add field">+ Add More</a>
                    </div>
                </div>
            </div>
        </form> -->
    </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {

        var maxField = 5; // Total 5 product fields we add

        var addButton = $('.add_button'); // Add more button selector

        var wrapper = $('.field_wrapper'); // Input fields wrapper

        var fieldHTML = `<div class="input-group form-elements">
                            <span class="input-group-addon"><i class="fa fa-picture-o"></i></span>
                            <input type="file" class="form-control has-feedback" value="" id="prod_img[]" name="prod_img[]" required>
                            <span class="input-group-addon" style="background-color: green;">
                                <a href="javascript:void(0);" class="remove_button" title="Add field"><i class="fa fa-minus " style="color:white;"></i></a>
                            </span>
                        </div>`; //New input field html 

        var x = 1; //Initial field counter is 1

        $(addButton).click(function() {
            //Check maximum number of input fields
            if (x < maxField) {
                x++; //Increment field counter
                $(wrapper).append(fieldHTML);
            }
        });

        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function(e) {
            e.preventDefault();
            $(this).parent().closest(".form-elements").remove();
            x--; //Decrement field counter
        });
    });
</script>
@endpush
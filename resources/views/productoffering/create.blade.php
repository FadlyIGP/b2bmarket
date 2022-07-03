@extends('layouts.master')

@section('title')
Offering Product
@endsection

@section('breadcrumb')
@parent
<li><a href="{{ url('/productcategories') }}">Offerinf Product</a></li>
<li class="active">Offering</li>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box" style="border-radius: 5px">

            {!! Form::open(['url'=>url('/offeringproducts'),'method'=>'POST', 'files'=>'true', 'class'=>'form-horizontal', 'autocomplete'=>'off']) !!}
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="box-body">
                            <div class="col-md-12">
                                <div class="box-body col-md-6">{{-- kiri --}}
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="col-md-12">
                                                {!! Form::label('Title:', '') !!}
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                                    <input type="text" class="form-control  has-feedback  " value="" id="category_name" name="category_name" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="col-md-12">
                                                {!! Form::label('Select Product:', '') !!}
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                                    <input type="text" class="form-control  has-feedback  " value="" id="category_name" name="category_name" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                   
                                </div>

                                <div class="box-body col-md-6">{{-- kiri --}}
                                    
                                     <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="col-md-12">
                                                {!! Form::label('Offering Price:', '') !!}
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                                    <input type="text" class="form-control  has-feedback  " value="" id="category_name" name="category_name" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="col-md-12">
                                                {!! Form::label('Mitra:', '') !!}
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                                    <input type="text" class="form-control  has-feedback  " value="" id="category_name" name="category_name" required>
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
                        <a class="btn" href="{{ url('/productcategories') }}" title="Back Category List" style="border-radius: 5px;width:80px;background-color:#FF0000;color: white">
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
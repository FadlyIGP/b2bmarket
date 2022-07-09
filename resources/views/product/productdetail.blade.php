

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
                                        <input type="text" class="form-control  has-feedback  " value="" id="title" name="title" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    {!! Form::label('Deskripsi:', '') !!}
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                        <input type="text" class="form-control  has-feedback  " value="" id="descriptions" name="descriptions" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    {!! Form::label('Product Name:', '') !!}
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                        <input type="text" class="form-control  has-feedback  " value="{{$productlist['product_name']}}" id="product_name" name="product_name" readonly="true">

                                        <input type="hidden" class="form-control  has-feedback  " value="{{$productlist['product_id']}}" id="product_id" name="product_id" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="box-body col-md-6">{{-- kiri --}}

                     <div class="form-group">
                        <div class="col-md-12">
                            <div class="col-md-12">
                                {!! Form::label('Product Price:', '') !!}
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                    <input type="number" class="form-control  has-feedback  " value="{{$productlist['product_price']}}" id="product_price" name="product_price" required>
                                </div>
                            </div>
                        </div>
                    </div>

                     <div class="form-group">
                        <div class="col-md-12">
                            <div class="col-md-12">
                                {!! Form::label('Offering Price:', '') !!}
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                    <input type="number" class="form-control  has-feedback  " value="" id="price_offering" name="price_offering" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="col-md-12">
                                {!! Form::label('Mitra Name:', '') !!}
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                    <input type="text" class="form-control  has-feedback  " value="{{$productlist['buyer_name']}}" id="mitra" name="mitra" readonly="true">
                                </div>
                            </div>
                        </div>
                    </div>


                    </div>

                    <input type="hidden" class="form-control  has-feedback  " value="{{$productlist['buyer_id']}}" id="buyer_id" name="buyer_id" required>

                </div>
            </div>
        </div>
    </div>

    <div class="box-footer">
        {!! Form::submit('Send', ['class'=>'btn btn-default','style'=>'background-color:#32CD32;border-radius:5px;width:80px;color: white']) !!}
    </div>
</div>
</div>
 {!! Form::close() !!}
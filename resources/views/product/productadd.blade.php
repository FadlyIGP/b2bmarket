@extends('layouts.master')

@section('title')
Add Product
@endsection

@section('breadcrumb')
@parent
<li class="active">Add Product</li>
@endsection
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="box" style="border-radius: 5px">

            {!! Form::open(['url'=>url('/products'),'method'=>'POST', 'files'=>'true', 'class'=>'form-horizontal', 'autocomplete'=>'off']) !!}
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
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                                    <input type="text" class="form-control  has-feedback  " value="" id="username" name="username" required>
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
                                                    {!! Form::textarea('alamat', null, ['class'=>'form-control ','required','placeholder' => '','style'=>'width:40%','style'=>'height:50px' ]) !!}
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
                                                    <input type="text" class="form-control has-feedback" value="" id="nama_pelanggan" name="nama_pelanggan" required>

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
                                                    <input type="text" class="form-control has-feedback" value="" id="nomor_kwh" name="nomor_kwh" required>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="box-body col-md-6">{{-- kana --}}



                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="col-md-12">
                                                {!! Form::label('Product Item:', '') !!}
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                                    <input type="text" class="form-control has-feedback" value="" id="nomor_kwh" name="nomor_kwh" required>
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
                                                    <input type="text" class="form-control has-feedback" value="" id="nomor_kwh" name="nomor_kwh" required>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="col-md-12">
                                                {!! Form::label('Product Image:', '') !!}
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                                    <input type="file" class="form-control has-feedback" value="" id="nomor_kwh" name="nomor_kwh" required>
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
                        {!! Form::submit('Send', ['class'=>'btn btn-primary','style'=>'background-color:#32CD32;border-radius:10px;border-radius: 10px;width:80px']) !!}
                        &nbsp;&nbsp;
                        &nbsp;&nbsp;
                        <a class="btn" href="#" onclick="goBack()" data-toggle="tooltip" data-placement="top" title="Kembali ke Staff Approval" style="border-radius: 10px;width:80px;background-color:#FF0000;color: white">Back</a>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}

        </div>
    </div>
</div>



@endsection
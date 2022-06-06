@extends('frontEnd.layouts.app')

<style type="text/css">
   .line {
      border: 0;
      background-color: #000;
      height: 1px;
      cursor: pointer;
    }

    table{
          width: 100%; /* Ganti menjadi 100% untuk tampilan responsif */
          border-collapse: collapse;
          margin: 30px 0px 30px;
          background-color: #fff;
          font-size: 14px;
    }

    table tr {
        height: 40px;
    }

    img {
        width:30%;height: 5%
    }

    .imglogo {
        width:10%;height: 5% !important;
    }

    #myform {
        text-align: center;
        padding: 5px;
        border: 1px dotted #ccc;
        margin: 2%;
    }
    .qty {
        width: 40px;
        height: 25px;
        text-align: center;
    }
    input.qtyplus { width:25px; height:25px;}
    input.qtyminus { width:25px; height:25px;}


</style>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


@section('content')
<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Cart</h3>
						<ul class="breadcrumb-tree">
							<li><a href="#">Home</a></li>
							<li class="active">Cart</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-7" style="border-radius: 20px;">
						<!-- Billing Details -->
						<div class="col-md-12 order-details" style="border-radius: 20px;">
                            <br>
                            <div class="col-md-12" style="border-radius: 20px;">
                                <div class="row" style="border-radius: 20px;">

                                <div class="col-md-12 order-details" style="border-radius: 20px;">

                                    @foreach($listcart as $list)
                                    {{-- <div class="box-header with-border" style="border-radius: 20px;"> --}}
                                        <h4 class="box">
                                        <img class="imglogo" src="https://i.ibb.co/DbJ1qWR/defaultlogo.png" alt="defaultlogo" border="0" />
                                        {{ $list['company_name'] }}
                                        </h4>

                                    <div class="line">
                                    </div>

                                    <div class="order-summary">

                                        <table class="css-serial" width="100%">
                                            <tbody>
                                                <tr>
                                                    <td width="2%">

                                                        @if($list['status']==1)
                                                        {!! Form::open(['url'=>url('/chekedcart/'.$list['id']),'method'=>'GET', 'files'=>'true', 'class'=>'form-horizontal', 'autocomplete'=>'off']) !!}
                                                        <input type='hidden' name='status' value='0' />
                                                        <button style="background-color: transparent;border-color: transparent;" type="submit">
                                                            <i class="fa fa-circle"></i>
                                                        </button>
                                                        {!! Form::close() !!}
                                                        @else()
                                                        {!! Form::open(['url'=>url('/chekedcart/'.$list['id']),'method'=>'GET', 'files'=>'true', 'class'=>'form-horizontal', 'autocomplete'=>'off']) !!}
                                                        <input type='hidden' name='status' value='1' />

                                                        <button style="background-color: transparent;border-color: transparent;" type="submit">
                                                            <i class="fa fa-circle-thin"></i>
                                                        </button>
                                                        {!! Form::close() !!}

                                                        @endif()

                                                    </td>
                                                    <td width="20%">
                                                        <center>
                                                            <img src="{{ url('/files/'.$list['product_image']) }}" alt="Back to homepage" routerlink="main" class="responsive" tabindex="0" ng-reflect-router-link="main">
                                                        </center>
                                                    </td>
                                                    <td width="30%">
                                                        {{ $list['product_name'].'/'.$list['product_descriptions'] }}
                                                    </td>
                                                    <td width="20%">
                                                        
                                                        <form id='myform' method='GET' action=''>
                                                            {{-- <input id="submitBtn" type='submit' value='-' class='qtyminus' field='quantity' /> --}}
                                                            <button data-id="{{ $list['id'] }}" type="submit" class='qtyminus' field='quantity'>-</button>

                                                            <input id="textbox0" type='text' name='quantity' value='{{ $list['product_qty'] }}' class='qty' onkeypress="return onlyNumeric(event)" />
                                                            {{-- <input id="submitBtn" type='submit' value='+' class='qtyplus' field='quantity' /> --}}
                                                            
                                                            <button data-id="{{ $list['id'] }}" type="submit" class='qtyplus' field='quantity'>+</button>

                                                        </form>
                                                    
                                                    </td>

                                                    <td width="5%">
                                                        <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('yakin ingin menghapus data ini?')">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </td>


                                                    
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="line" style="height: 0.5px;">
                                        </div>

                                    </div>

                                    @endforeach

                                </div>
                            </div>
                            </div>
                        </div>
						<!-- /Billing Details -->
						
					</div>

					<!-- Order Details -->
					<div class="col-md-5 order-details">
                        
                        <div class="box-header with-border" style="border-radius: 20px;">
                            <h3 class="box-title">Ringkasan Pesanan</h3>
                        </div>

                        <div class="line">
                        </div>
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-10">

    						<div class="order-summary">
    							<div class="order-col">
    								<div><strong>PRODUCT</strong></div>
    								<div><strong>TOTAL</strong></div>
    							</div>
                                <div class="line">
                                </div>
    							<div class="order-products">
                                    @foreach($listchecked as $list)
                                        <div class="order-col">
                                           <div>{{ $list['product_qty'] }} x {{ $list['product_name'] }}</div>
                                           <div>{{ $list['total_price'] }}</div>
                                        </div>
                                    @endforeach


    							</div>
    							<div class="order-col">
    								<div>Shiping</div>
    								<div><strong>FREE</strong></div>
    							</div>
                                <div class="line" style="height: 0.5px;">
                                </div>
    							<div class="order-col">
    								<div><strong>TOTAL</strong></div>
    								<div><strong class="order-total">Rp {{$total_price}}</strong></div>
    							</div>
    						</div>
    						<div class="payment-method">
    							<div class="input-radio">
    								<input type="radio" name="payment" id="payment-1">
    								<label for="payment-1">
    									<span></span>
    									Direct Bank Transfer
    								</label>
    								<div class="caption">
    									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    								</div>
    							</div>
    							<div class="input-radio">
    								<input type="radio" name="payment" id="payment-2">
    								<label for="payment-2">
    									<span></span>
    									Cheque Payment
    								</label>
    								<div class="caption">
    									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    								</div>
    							</div>
    							<div class="input-radio">
    								<input type="radio" name="payment" id="payment-3">
    								<label for="payment-3">
    									<span></span>
    									Paypal System
    								</label>
    								<div class="caption">
    									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    								</div>
    							</div>
    						</div>
    						<div class="input-checkbox">
    							<input type="checkbox" id="terms">
    							<label for="terms">
    								<span></span>
    								I've read and accept the <a href="#">terms & conditions</a>
    							</label>
    						</div>
    						<a href="#" class="primary-btn order-submit">Place order</a>
                        </div>
                        <div class="col-md-1">
                        </div>
					</div>
					<!-- /Order Details -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
@endsection

<script type="text/javascript">
    jQuery(document).ready(function(){
        // This button will increment the value
        $('.qtyplus').click(function(e){
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            fieldName = $(this).attr('field');
            // Get its current value
            var currentVal = parseInt($(this).siblings('input[name='+fieldName+']').val());
            // If is not undefined
            if (!isNaN(currentVal)) {
                // Increment
                $(this).siblings('input[name='+fieldName+']').val(currentVal + 1);
            } else {
                // Otherwise put a 0 there
               $(this).siblings('input[name='+fieldName+']').val(1);
            }

            var currqty = parseInt($(this).siblings('input[name='+fieldName+']').val());

            // alert("Update Qty ?"); 
            const id = $(this).attr('data-id');
            $.ajax({
                  url: 'updateqty/' + id,
                  type: 'GET',
                  data: { 
                    /* PAPUL => this value just get qty from the first record in the cart */
                    // param0: $('#textbox0').val(), 
                    param0: currqty,
                  }
            }); 
        });

        // This button will decrement the value till 1
        $(".qtyminus").click(function(e) {
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            fieldName = $(this).attr('field');
            // Get its current value
            var currentVal = parseInt($(this).siblings('input[name='+fieldName+']').val());
            // If it isn't undefined or its greater than 0
            if (!isNaN(currentVal) && currentVal > 0) {
                // Decrement one
                $(this).siblings('input[name='+fieldName+']').val(currentVal - 1);

                /* PAPUL => if qty 1 then can not to be 0, minum = 1 */               
                var currqty = parseInt($(this).siblings('input[name='+fieldName+']').val());
                if (currqty < 1){
                    $(this).siblings('input[name='+fieldName+']').val(1);
                }
            } else {
                // Otherwise put a 0 there
                $(this).siblings('input[name='+fieldName+']').val(1);
            }            

            var currqty = parseInt($(this).siblings('input[name='+fieldName+']').val());

            // alert("Update Qty ?"); 
            const id = $(this).attr('data-id');
            $.ajax({
                  url: 'updateqty/' + id,
                  type: 'GET',
                  data: { 
                    /* PAPUL => this value just get qty from the first record in the cart */
                    // param0: $('#textbox0').val(), 
                    param0: currqty, 
                  }
            });  
        });
    });
</script>

<script type="text/javascript">
    /* PAPUL => function for numeric input only whne keyboard pressed */
    function onlyNumeric(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57)){
            return false;
        }       
        return true;
    }
</script>
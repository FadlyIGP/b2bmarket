@extends('frontEnd.weblayouts.app')

@section('content')
<style type="text/css">
 .line {
  border-bottom: 1px solid #aaa;
  width: 100%
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

#address {
    text-align: center;
    padding: 5px;
    border: 1px dotted #ccc;
    margin: 2%;
    border-radius: 10px
}

.qty {
    width: 40px;
    height: 25px;
    text-align: center;
}

.buttonaddress {
  display: block;
  width: 50%;
  height: 30px;
  border: none;
  background-color: #1E90FF;
  color: white;
  /*padding: 14px 28px;*/
  border-radius: 10px;
  font-size: 16px;
  cursor: pointer;
  text-align: center;
}

.buttonaddress:hover {
  background-color: #ddd;
  color: black;
}

.block {
  display: block;
  width: 50%;
  height: 30px;
  border: none;
  background-color: #04AA6D;
  color: white;
  /*padding: 14px 28px;*/
  border-radius: 10px;
  font-size: 16px;
  cursor: pointer;
  text-align: center;
}

.block:hover {
  background-color: #ddd;
  color: black;
}

input.qtyplus { width:25px; height:25px;}
input.qtyminus { width:25px; height:25px;}


</style>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<div id="" class="services section ">
  <div class="container">
     <div class="about-us show-up header-text" style="padding-bottom: 15px;margin-top: -150px;">

     </div>
     <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-8">
              <div class="col-md-12" style="border-radius: 20px;">
                @foreach($listcart as $list)
                <div style="padding-bottom: 20px">
                    <span style="">
                        <img class="imglogo" src="https://i.ibb.co/DbJ1qWR/defaultlogo.png" alt="defaultlogo" border="0" />
                        {{ $list['company_name'] }}
                    </span>
                <div class="line"></div>
                </div>
                <div class="row">
                    <div class="col-lg-6" style="margin-top: -50px">
                        <table class="" width="100%">
                            <tbody>
                                <tr>
                                    <td width="10%">
                                        @if($list['status']==1)
                                        {!! Form::open(['url'=>url('/chekedcart/'.$list['id']),'method'=>'GET', 'files'=>'true', 'class'=>'form-horizontal', 'autocomplete'=>'off','style'=>'margin-top:25px']) !!}
                                            <input type='hidden' name='status' value='0' />
                                            <button style="background-color: transparent;border-color: transparent;" type="submit">
                                                <i class="fa-solid fa-stop" style="font-size: 30px"></i>
                                            </button>
                                        {!! Form::close() !!}
                                        @else()
                                        {!! Form::open(['url'=>url('/chekedcart/'.$list['id']),'method'=>'GET', 'files'=>'true', 'class'=>'form-horizontal', 'autocomplete'=>'off','style'=>'margin-top:25px']) !!}
                                            <input type='hidden' name='status' value='1' />

                                            <button style="background-color: transparent;border-color: transparent;" type="submit">
                                                <i class="fa-solid fa-stop" style="color: #C0C0C0;font-size: 30px"></i>
                                            </button>
                                        {!! Form::close() !!}

                                        @endif()

                                    </td>
                                    <td width="40%">
                                        <left>
                                            <img src="{{ url('/files/'.$list['product_image']) }}" alt="Back to homepage" routerlink="main" class="responsive" tabindex="0" ng-reflect-router-link="main" style="width: 100%;height: 100px">
                                        </left>
                                    </td>
                                    <td width="50%">
                                        <span>
                                            {{ $list['product_name'] }}
                                        </span>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-6" style="margin-top: -50px">
                        <table class="" width="100%">
                            <tbody>
                               <td width="40%" style="color:orange">
                                  <span> {{ $list['product_price'] }}</span>
                               </td>
                                <td width="50%">

                                    <form id='myform' method='GET' action='' style="border-color: transparent;">
                                        <button data-id="{{ $list['id'] }}" type="submit" class='qtyminus' field='quantity'>-</button>

                                        <input id="textbox0" type='text' name='quantity' value='{{ $list['product_qty'] }}' class='qty' onkeypress="return onlyNumeric(event)" />

                                        <button data-id="{{ $list['id'] }}" type="submit" class='qtyplus' field='quantity'>+</button>

                                    </form>

                                </td>

                                <td width="10%">
                                  {!! Form::open(['url'=>url('/carts/'.$list['id']),'method'=>'DELETE', 'files'=>'true', 'class'=>'form-horizontal', 'autocomplete'=>'off','style'=>'margin-top:25px']) !!}
                                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('yakin ingin menghapus data ini?')" style="background-color: transparent;border-color: transparent;">
                                        <i class="fa fa-trash" style="color: red;font-size: 20px"></i>
                                    </button>
                                </button>
                                {!! Form::close() !!}
                                   
                                </td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="line"></div>

                @endforeach

            </div>

        </div>

        <div class="col-lg-4">
          <div class="" style="padding-top: 46px">

            <h4 style="font-family: 'Helvetica Neue';">
            <i class="fa-solid fa-location-dot"></i>
            Alamat
            </h4>
            <div class="heading1"></div>
            <div class="" id="descriptions">
                <span style="font-size: 12px;">
                    Alamat Belum ditambahkan
                </span>
                <form id="" method='GET' action='#' style="border-color: transparent;">
                    <button type="submit" class='buttonaddress' field=''>Tambah Alamat</button>
                </form>

            </div>
          
            <div class="heading1"></div>
            <div>
            <table width="100%" class="table" border="1" style="margin-top: 1px">
                <tr style="height:2px">
                    <td width="10%" style="font-size: 12px">Qty</td>
                    <td width="60%" style="font-size: 12px">Product</td>
                    <td width="30%" style="font-size: 12px">Total</td>
                </tr>

                @foreach($listchecked as $list)
                <tr style="height:2px">
                    <td width="10%" style="font-size: 12px">{{ $list['product_qty'] }}</td>
                    <td width="60%" style="font-size: 10px">{{ $list['product_name'] }}</td>
                    <td width="30%" style="font-size: 12px">{{ $list['total_price'] }}</td>
                </tr>
                @endforeach
            </table>
            </div>
            <div class="col-md-12">
                <div class="">
                    <span> TOTAL</span>
                    <span> Rp {{$total_price}}</span>
                </div>
                <div style="margin-top: 10px">
                 <form id="" method='GET' action='#' style="border-color: transparent;">
                    <button type="submit" class='block'>Bayar</button>
                </form>
                </div>
            </div>
        </div>
    </div>

</div>

</div>

<!-- Scripts -->
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

    @endsection  
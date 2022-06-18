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
    border: none;
    text-align: center;
    display: inline-block;
}

.qty:focus {
    outline: none;
 }

.buttonaddress {
  display: block;
  width: 50%;
  height: 30px;
  border: none;
  background-color: #FF4500;
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
  background-color: #FFA500;
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
.button{
  border: none;
  text-align: center;
  display: inline-block;
  width: 20%;
  border-radius: 5px;

}

/*.input{

}*/


input.qtyplus { width:25px; height:25px;}
input.qtyminus { width:25px; height:25px;}

.div {
  box-sizing: border-box;
  -moz-box-sizing: border-box;
  /*-webkit-box-sizing: border-box;*/
  /*width: 120px;*/
  /*height: 120px;*/
  border: 1px solid #969696;
  /*background: #d9dbda;*/
  /*margin: 10px;*/
}

/*div+div {
  border: 1px solid #969696;
}*/


</style>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


<div id="" class="services section ">
  <div class="container">
     <div class="about-us show-up header-text" style="padding-bottom: 15px;margin-top: -150px;">

     </div>
     <div class="row">
        <div class="col-lg-12" >
          <div class="row">
            <div class="col-lg-8" style="padding-bottom: 20px;">
                <div class="col-md-12" style="border-radius: 10px;border: 1px solid #969696;padding-bottom: 20px;font-family: 'Helvetica Neue';">
                    <div style="padding-bottom: 20px;padding-left: 10px;padding-top: 10px;">
                        <span style="">
                            <img src="https://i.ibb.co/5sFK9qT/location.png" alt="location" border="0" style="width: 30px" />
                            Alamat Pengiriman
                        </span>
                        <div class="line"></div>
                    </div>
                    <div class="" style="padding-left: 20px;padding-top: -10px;padding-bottom:5px;">
                        @if($address)
                            <span style="">
                                {{$address->name}}
                            </span>
                            &nbsp;
                            <span style="">
                                {{$address->contact}}
                            </span>
                        @else()
                            <span style="">
                                Alamat belim ditambahkan
                            </span>
                        @endif()
                         
                    </div>
                    <div class="" style="padding-left: 20px;padding-top: -10px;padding-bottom:5px;">
                         <span style="">
                            {{$completeaddress}}
                       </span>
                       
                    </div>
                    {{-- <div class="line"></div> --}}
                </div>

                 <div class="col-md-12" style="border-radius: 10px;border: 1px solid #969696;padding-bottom: 20px;margin-top: 10px">
                    <div style="padding-bottom: 20px;padding-left: 10px;padding-top: 10px;">
                        <span style="font-family: 'Helvetica Neue';">
                            <img src="https://i.ibb.co/gdnXFN0/shopping-bag.png" alt="shopping-bag" border="0" style="width: 30px" />
                            Item
                        </span>
                        <div class="line"></div>
                    </div>
                    <div class="container">
                        @foreach($listchecked as $list)

                        <div class="col-md-12" style="padding-left: 20px;padding-right: 20px;padding-top: -10px;padding-bottom:5px;border: 1px solid #969696;border-radius: 10px;margin-bottom: 20px">
                            <div class="row" style="margin-top: -30px;">
                                <div class="col-md-6" style="padding-left: 10px;padding-top: 0px;padding-bottom:0px;">
                                   <table width="100%">
                                       <tr>
                                            <td width="40%" style="text-align: left;">
                                                <span style="margin-left: -20px">
                                            <img src="{{ url('/files/'.$list['product_image']) }}" alt="Back to homepage" routerlink="main" class="responsive" tabindex="0" ng-reflect-router-link="main" style="width: 100%;height: 100px">
                                            </span>
                                            </td>
                                            <td width="60%">
                                                <span>
                                                {{ $list['product_name'] }}
                                                </span>
                                            </td>

                                       </tr>
                                   </table>
                                </div>
                                <div class="col-md-6" style="padding-left: 10px;padding-top: 0px;padding-bottom:0px;">
                                   <table width="100%">
                                       <tr>
                                           <td width="40%">
                                                <span>
                                               {{ $list['product_price'] }}
                                               </span>
                                           </td>
                                           <td width="30%">
                                            <span>
                                              Qty {{ $list['product_qty'] }}
                                               </span>
                                           </td>
                                           <td width="30%">
                                            {!! Form::open(['url'=>url('/carts/'.$list['id']),'method'=>'DELETE', 'files'=>'true', 'class'=>'form-horizontal', 'autocomplete'=>'off','style'=>'margin-top:0px']) !!}
                                                <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('yakin ingin menghapus data ini?')" style="background-color: transparent;border-color: transparent;">
                                                    <i class="fa fa-trash" style="color: red;font-size: 20px"></i>
                                                </button>
                                            {!! Form::close() !!}
                                           </td>
                                           
                                       </tr>
                                   </table>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                   
                </div>
            </div>

        <div class="col-lg-4" style="">
          <div class="col-md-12" style="padding-top: 17px;padding-left: 10px;border: 1px solid #969696;border-radius: 10px;">
            <div style="width: 97%;background-color: #FF4500;">
                <h4 style="font-family: 'Helvetica Neue';color: white">
                    <center>
                    Buat Pesanan
                    </center>
                </h4>
            </div>
          
            <div class="">
                <div class="" style="margin-top: 10px;font-family: 'Helvetica Neue';">
                    <details>
                        <summary>Pilih Bank Transfer</summary>
                            <p>
                                <table>
                                    <tr>
                                        <td>hh</td>
                                        <td>hh</td>
                                        <td>hh</td>
                                        <td>hh</td>
                                        
                                    </tr>
                                </table>
                            </p>
                        </details>
                </div>
                <span>
                <h5 style="font-family: 'Helvetica Neue';">Rangkuman pesanan</h5>
                </span>
                 <div class="" style="margin-top: 10px;font-family: 'Helvetica Neue';color: #778899">
                    <span> Subtotal  ({{$countqty}} Items)</span>
                    <span> Rp {{$total_price}}</span>
                </div>

                <div class="" style="margin-top: 10px;font-family: 'Helvetica Neue';color: #778899">
                    <span> Ongkos Kirim</span>
                    <span> Rp 0</span>
                </div>
                <div class="" style="margin-top: 10px;font-family: 'Helvetica Neue';">
                    <span> Total</span>
                    <span> Rp</span>
                    <span style="color: orange">{{$total_price}}</span>
                </div>
               
                <div style="margin-top: 10px;padding-bottom: 20px">

                 <form id="" method='GET' action='#' style="border-color: transparent;">
                    <button type="submit" class='block' style="width: 98%;font-family: 'Helvetica Neue';" >Buat Pesanan</button>
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

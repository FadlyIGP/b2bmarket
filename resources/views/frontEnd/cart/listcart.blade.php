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

/*img {
    width:30%;height: 5%
}*/

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

.bayar-disbaled{
  display: block;
  width: 50%;
  height: 30px;
  border: none;
  background-color: #ddd;
  color: #FFA500;
  /*padding: 14px 28px;*/
  border-radius: 10px;
  font-size: 16px;
  cursor: pointer;
  text-align: center;
}

.block:hover {
  background-color: #ddd;
  color: #FFA500;
  border-color: #FFA500;
  border-style: solid;
  border-width: 1px;
}

.button{
  border: none;
  text-align: center;
  display: inline-block;
  width: 20%;
  border-radius: 5px;

}

.body {  
    background-image: url(assets/images/backgroundshop.jpg);
    background-repeat: no-repeat;
    background-position: center center;
    background-size: 100% 100%;
    /*padding: 250px 120px 150px 120px;*/
    position: relative;
    overflow: hidden;
 } 

 #rata{
    display: flex;
    align-items:center;
    padding-top: 10px;
 }

/*.input{

}*/


input.qtyplus { width:25px; height:25px;}
input.qtyminus { width:25px; height:25px;}


</style>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>

@include('sweetalert::alert')

<div id="" class="services section ">
  <div class="container">
    <div class="about-us show-up header-text" style="padding-bottom: 15px;margin-top: -150px;">

    </div>
    {{-- <body class="body"> --}}
    @if(empty($listcart))
    <div class="row body" style="border-radius: 10px;">
         {{-- <div class="container"> --}}
            <center>
            <div class="col-md-12 divbackg" style="padding-left: 20px;padding-right: 20px;padding-top: 50px;padding-bottom:5px;margin-bottom: 20px;height: auto;">
                <div class="row " style="">
                    <div class="col-md-12" >
                    <img src="{{ asset('assets/images/cart.png') }}" alt="Back to homepage" routerlink="main" class="responsive" tabindex="0" ng-reflect-router-link="main" style="width: 20%;">
                    <span style="font-family: 'Helvetica Neue';color: #FF4500">
                        <h2>
                            <b>
                                Cart is Empty
                            </b>
                        </h2>
                    </span>
                    
                    {!! Form::open(['url'=>url('/index2'),'method'=>'GET', 'files'=>'true', 'class'=>'form-horizontal', 'autocomplete'=>'off','style'=>'margin-top:0px']) !!}
                    <button style="background-color: transparent;border-color: transparent;" type="submit">
                        <span style="font-family: 'Helvetica Neue';color: orange">
                            <h2>
                                <b>
                                    Continue Shopping..!
                                </b>
                            </h2>
                            <i class="fa-brands fa-golang" style="font-size: 60px;margin-top: 0px;color: #7CFC00"></i>
                        </span>
                    </button>
                    {!! Form::close() !!}
                    </div>
                </div>
            </div>
            </center>

        {{-- </div> --}}
      
    </div>
    @else()
    <div class="row">
        <div class="col-lg-12" >
          <div class="row">
            <div class="col-lg-8" style="padding-bottom: 20px;">
              <div class="col-md-12" style="border-radius: 10px;border: 1px solid #969696;padding-bottom: 20px;">
                @foreach($listcart as $list)
                    <div style="padding-bottom: 20px">
                        <div class="col-md-12" style="height: 40px;margin-left: 10px;margin-top: 10px">
                        <span style="padding-top:30px">
                            <img src="https://i.ibb.co/6NNbp7K/store.png" alt="defaultlogo" border="0" style="width: 30px;height: 30px" />
                            {{ $list['company_name'] }}
                        </span>
                        </div>
                        <div class="line"></div>
                    </div>
                    <div class="row" style="">
                        <div class="col-lg-6" style="margin-top: -50px;">
                            <table class="" width="100%">
                                <tbody>
                                    <tr>
                                        <td width="10%">
                                            @if($list['status']==1)
                                            {!! Form::open(['url'=>url('/chekedcart/'.$list['id']),'method'=>'GET', 'files'=>'true', 'class'=>'form-horizontal', 'autocomplete'=>'off','style'=>'margin-top:25px']) !!}
                                                <input type='hidden' name='status' value='0' />
                                                <button style="background-color: transparent;border-color: transparent;" type="submit">
                                                    {{-- <i class="fa-solid fa-stop" ></i> --}}
                                                    <i class="fa-solid fa-square-check" style="font-size: 30px;color: #00FA9A"></i>
                                                </button>
                                            {!! Form::close() !!}
                                            @else()
                                            {!! Form::open(['url'=>url('/chekedcart/'.$list['id']),'method'=>'GET', 'files'=>'true', 'class'=>'form-horizontal', 'autocomplete'=>'off','style'=>'margin-top:25px']) !!}
                                                <input type='hidden' name='status' value='1' />

                                                <button style="background-color: transparent;border-color: transparent;" type="submit">
                                                    <i class="fa-solid fa-stop" style="color: #F5F5F5;font-size: 30px"></i>
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
                                            <input type="hidden" name="minorder" id="idminorder" value="{{ $list['min_order'] }}">
                                            @if($list['status']==1)                                              
                                              <button data-id="{{ $list['id'] }}" type="button" class='qtyminus button' field='quantity' id="reload_data" >-</button>

                                              <input type='text' id="textbox0" name='quantity' value="{{ $list['product_qty'] }}" class='qty input' onkeypress="return onlyNumeric(event)" disabled>

                                              <button data-id="{{ $list['id'] }}" type="button" class='qtyplus button' field='quantity'>+</button>
                                            @else
                                              <button data-id="{{ $list['id'] }}" type="button" class='qtyminus button' field='quantity' id="reload_data" disabled>-</button>

                                              <input id="textbox0" type='text' name='quantity' value="{{ $list['product_qty'] }}" class='qty input' onkeypress="return onlyNumeric(event)" disabled />

                                              <button data-id="{{ $list['id'] }}" type="button" class='qtyplus button' field='quantity' disabled>+</button>
                                            @endif
                                        </form>

                                    </td>

                                    <td width="10%">
                                      {!! Form::open(['url'=>url('/carts/'.$list['id']),'method'=>'DELETE', 'files'=>'true', 'class'=>'form-horizontal', 'autocomplete'=>'off','style'=>'margin-top:25px']) !!}
                                        <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('yakin ingin menghapus data ini?')" style="background-color: transparent;border-color: transparent;">
                                            <i class="fa fa-trash" style="color: red;font-size: 20px"></i>
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

        <div class="col-lg-4" style="">
          <div class="col-md-12" style="padding-top: 20px;padding-left: 10px;border: 1px solid #969696;border-radius: 10px;">

            <h4 style="font-family: 'Helvetica Neue';">
            <img src="https://i.ibb.co/5sFK9qT/location.png" alt="location" border="0" style="width: 30px" />
            Alamat
            </h4>
            <div class="heading1"></div>
            <div class="" id="" style="height: auto;padding-bottom: 10px">
                @if(empty($completeaddress))
                    <span style="font-size: 12px;">
                        Please add your address
                    </span>
                    {!! Form::open(['url'=>url('#'),'method'=>'GET', 'files'=>'true', 'class'=>'form-horizontal', 'autocomplete'=>'off','style'=>'margin-top:10px']) !!}

                    <button type="button" class="buttonaddress" data-bs-toggle="modal" data-bs-target="#myModal">
                     <span>Add address</span>
                    </button>
                   {!! Form::close() !!}
                @else()
                 <span style="font-size: 12px;">
                    {{$completeaddress}}
                 </span>

                @endif()
               

            </div>
          
            <div class="heading1"></div>
            <div>
                <table class="" id="table-list" width="100%">
                        <thead style="font-size: 12px">
                            <tr class="">
                                <th class="" width="5%">Qty</th>
                                <th class="" width="60%">Produk</th>
                                <th class="" width="34%">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach($listchecked as $list)
                            <tr style="height:2px">
                                <td width="10%" class="py-1 px-2" >{{ $list['product_qty'] }}</td>
                                <td width="60%" class="py-1 px-2">{{ $list['product_name'] }}</td>
                                <td width="30%" class="py-1 px-2">{{ $list['total_price'] }}</td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
                <div id="loader" class="d-flex justify-content-center">
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
               {{-- 
                <button type="button" class="btn btn-sm btn-success rounded-0 my-2" >
                    Reload Data
                </button> 
                --}}
            </div>
            <div class="col-md-12">
                <div class="">
                    <span> TOTAL</span>
                    <span>Rp</span>
                    <span id="total_price"> {{$total_price}}</span>
                </div>
                <div style="margin-top: 10px;padding-bottom: 10px">

                 <form id="" method='GET' action='{{ url('/payments/') }}' style="border-color: transparent;">
                    @if(empty($listchecked))
                      <button type="submit" class='bayar-disbaled' disabled="disabled">Bayar</button>
                    @else
                       <button type="submit" class='block'>Bayar</button>
                    @endif
                    {{-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Large Modal</button> --}}

                  {{--   <button class="btn btn-secondary mt-4 detail-btn btn-xs btn-info" data-toggle="modal" data-target="#myModal" data-id="">Bayar</button> --}}
                </form>
                </div>
            </div>

        </div>
    </div>

    @endif()
   {{-- </body> --}}

  </div>

</div>

<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Address</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          {!! Form::open(['url'=>url('/profiles/'),'method'=>'POST','files'=>'true','class'=>'form-horizontal','autocomplete'=>'off'])!!}
          <div class="form-group" id="rata">
            <label class="col-sm-3 control-label">Address Owner</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="name" placeholder="Address Owner" id="name" required>
            </div>
          </div>
          <div class="form-group" id="rata">
            <label class="col-sm-3 control-label">Contact</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="contact" placeholder="Contact" id="contact">
            </div>
          </div>
          <div class="form-group" id="rata">
            <label class="col-sm-3 control-label">provinsi</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="provinsi" placeholder="provinsi" id="provinsi">
            </div>
          </div>
          <div class="form-group" id="rata">
            <label class="col-sm-3 control-label">kabupaten</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="kabupaten" placeholder="kabupaten" id="kabupaten">
            </div>
          </div>
          <div class="form-group" id="rata">
            <label class="col-sm-3 control-label">kecamatan</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="kecamatan" placeholder="kecamatan" id="kecamatan">
            </div>
          </div>
          <div class="form-group" id="rata">
            <label class="col-sm-3 control-label">kelurahan</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="kelurahan" placeholder="kelurahan" id="kelurahan">
            </div>
          </div>
          <div class="form-group" id="rata">
            <label class="col-sm-3 control-label">Complete Address</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="complete_address" placeholder="complete_address" id="complete_address">
            </div>
          </div> 
          <div class="form-group" id="rata">
            <label class="col-sm-3 control-label">patokan</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="patokan" placeholder="patokan" id="patokan">
            </div>
          </div> 
          <div class="form-group" id="rata">
            <label class="col-sm-3 control-label">postcode</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="postcode" placeholder="postcode" id="postcode">
            </div>
          </div>
          
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <div class="form-group">
            {{ Form::submit('Submit',['class'=>'btn btn-default','style'=>'background-color:#fb8c00;border-radius:5px;width:80px;color: white;'])}}
          </div>
          {{ Form::close()}}
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
</div>

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

            $('#loader').removeClass('d-none')
            var table = $('#table-list')
            table.find('tbody').html('')
            setTimeout(() => {
                $.ajax({
                    url: 'getjsondata',
                    dataType: 'json',
                    error: err => {
                        console.log(err)
                        alert("An error occured")
                        $('#loader').addClass('d-none')
                    },
                    success: function(resp) {
                        if (resp.length > 0) {
                            var i = 1;
                            Object.keys(resp).map(k => {
                                var tr = $('<tr>')
                                tr.append('<td class="py-1 px-2">' + resp[k].product_qty + '</td>')
                                tr.append('<td class="py-1 px-2">' + resp[k].product_name + '</td>')
                                tr.append('<td class="py-1 px-2">' + resp[k].total_price + '</td>')
                                table.find('tbody').append(tr)
                            })
                        } else {
                            var tr = $('<tr>')
                            tr.append('<th class="py-1 px-2 text-center">No data to display</th>')
                            table.find('tbody').append(tr)
                        }
                        $('#loader').addClass('d-none')
                    }
                })

                $.ajax({
                    url: 'gettotal/',
                    type: 'GET',
                    success: function(data) {
                      console.log(data);
                      $('#total_price').html(data.gettotal);
                  }
                });
            }, 200)

            // var inputqty = $(this).siblings('input[name='+fieldName+']').val()           
            // var minorder = document.getElementById('idminorder').value;

            // if(minorder < inputqty){
            //   console.log(minorder+inputqty);
            //   $(".qtyminus").attr('data-id').disabled = false;
            // }

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

            $('#loader').removeClass('d-none')
            var table = $('#table-list')
            table.find('tbody').html('')
            setTimeout(() => {
                $.ajax({
                    url: 'getjsondata',
                    dataType: 'json',
                    error: err => {
                        console.log(err)
                        alert("An error occured")
                        $('#loader').addClass('d-none')
                    },
                    success: function(resp) {
                        if (resp.length > 0) {
                            var i = 1;
                            Object.keys(resp).map(k => {
                                var tr = $('<tr>')
                                tr.append('<td class="py-1 px-2">' + resp[k].product_qty + '</td>')
                                tr.append('<td class="py-1 px-2">' + resp[k].product_name + '</td>')
                                tr.append('<td class="py-1 px-2">' + resp[k].total_price + '</td>')
                                table.find('tbody').append(tr)
                            })
                        } else {
                            var tr = $('<tr>')
                            tr.append('<th class="py-1 px-2 text-center">No data to display</th>')
                            table.find('tbody').append(tr)
                        }
                        $('#loader').addClass('d-none')
                    }
                })

                $.ajax({
                    url: 'gettotal/',
                    type: 'GET',
                    success: function(data) {
                      console.log(data);
                      $('#total_price').html(data.gettotal);
                  }
                });

            }, 200)

            // var inputqty = $(this).siblings('input[name='+fieldName+']').val()           
            // var minorder = document.getElementById('idminorder').value;

            // if(minorder == inputqty){
            //   console.log(minorder+inputqty);
            //   $(".qtyminus").prop('disabled', true);
            // }
        });
            
    });


    $(function() {
        // Hide loader on document ready
        $('#loader').addClass('d-none')
        setTimeout(() => {
                load_data()
            }, 100)
            // Reload Button Function
        $('#reload_data').click(function() {
            // refreshing the table data
            load_data()
        })
    })
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

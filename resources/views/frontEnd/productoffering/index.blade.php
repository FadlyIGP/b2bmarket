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
  width: 30%;
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


</style>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

@include('sweetalert::alert')

<div id="" class="services section ">
  <div class="container">
    <div class="about-us show-up header-text" style="padding-bottom: 15px;margin-top: -150px;">

    </div>
    <div class="row">
        <div class="col-lg-12" >
          <div class="row">
            <div class="col-lg-12" style="padding-bottom: 20px;">
              <div class="col-md-12" style="border-radius: 10px;border: 1px solid #969696;padding-bottom: 20px;">
                @foreach($listdata as $list)
                    <div style="padding-bottom: 20px">
                        <div class="col-md-12" style="height: 40px;margin-left: 10px;margin-top: 10px">
                        <span style="padding-top:30px">
                            <img src="https://i.ibb.co/6NNbp7K/store.png" alt="defaultlogo" border="0" style="width: 30px;height: 30px" />
                            {{$list['company_name']}}
                        </span>
                        </div>

                        <div class="col-md-12" style="height: 40px;margin-left: 10px;margin-top: 10px">
                        <span style="padding-top:30px">
                            {{$list['title']}}
                        </span>
                        </div>
                        
                        <div class="line"></div>
                    </div>
                    <div class="row" style="padding: 10px">
                        <div class="col-lg-12" style="margin-top: -50px;">
                            <table class="" width="100%">
                                <thead>
                                    <th width="15%">Image</th>
                                    <th width="20%">Product</th>
                                    <th width="10%">Price Offering</th>
                                    <th width="20%">Price Quotation</th>
                                    <th width="10%">Status</th>
                                    <th width="20%">Action</th>

                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <left>
                                                <img src="{{ url('/files/'.$list['product_image']) }}" alt="Back to homepage" routerlink="main" class="responsive" tabindex="0" ng-reflect-router-link="main" style="width: 50%;height: 50px">
                                             <left>
                                        </td>
                                        <td>
                                           {{$list['product_name']}}
                                              
                                        </td>
                                       
                                        <td>
                                            {{$list['price_offering']}}
                                        </td>
                                        <td>
                                            {{$list['price_quotation']}}
                                        </td>
                                         <td>
                                            {{$list['approval_seller']}}
                                        </td>

                                        <td>

                                            <button id="modalupdatestat" data-id="{{$list['id']}}" type="button" class="buttonaddress" data-bs-toggle="modal" data-bs-target="#myModal" title="ajukan">
                                                    <i class="fa-solid fa-money-bill-transfer"></i>
                                            </button>

                                             {!! Form::open(['url'=>url('offeringprice', $list['id']),'method'=>'GET', 'files'=>'true', 'class'=>'form-horizontal', 'autocomplete'=>'off','style'=>'margin-top:10px']) !!}

                                                <button type="submit" class="buttonaddress" title="Setuju dan lanjutkan belanja">
                                                    <i class="fa-solid fa-check"></i>
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

       
    </div>


  </div>

</div>
<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Ajukan Harga</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          {!! Form::open(['url'=>url('/offeringprice/'),'method'=>'POST','files'=>'true','class'=>'form-horizontal','autocomplete'=>'off'])!!}
          <div class="form-group" id="rata">
            <label class="col-sm-3 control-label">Price Quotation</label>
            <div class="col-sm-9">
              <input type="hidden" name="id" id="recid">
              <input type="text" class="form-control" name="price_quotation" placeholder="Ajukan Harga" id="price_quotation" required>
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

    /* Show Id Transaction */
    $('tbody').on('click','#modalupdatestat', function(e){
        e.preventDefault();

        const id = $(this).attr('data-id');
        document.getElementById('recid').value = id;
    });

</script>

@endsection  

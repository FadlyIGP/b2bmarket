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

<div id="services about-us" class="services section ">
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
                                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('yakin ingin menghapus data ini?')" style="background-color: transparent;border-color: transparent;">
                                        <i class="fa fa-trash" style="color: red;font-size: 20px"></i>
                                    </button>
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
          <div class="" >
            <span> Lokasi</span>
            {{-- <div class="line"></div> --}}
            <div class="col-md-10">
                <div class="">
                    <span> TOTAL</span>
                    <span> Rp {{$total_price}}</span>
                </div>
            </div>
        </div>
    </div>

</div>

</div>

<!-- Scripts -->
<script>
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
      showDivs(slideIndex += n);
  }

  function showDivs(n) {
      var i;
      var x = document.getElementsByClassName("mySlides");
      if (n > x.length) {slideIndex = 1}
          if (n < 1) {slideIndex = x.length}
              for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";  
            }
            x[slideIndex-1].style.display = "block";  
        }
    </script>

    @endsection  

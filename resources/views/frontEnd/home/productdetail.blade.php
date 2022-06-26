@extends('frontEnd.weblayouts.app')

@section('content')
@include('sweetalert::alert')
<style type="text/css">
    .buttonaddress {
      display: block;
      width: 100%;
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
</style>

<div id="services about-us" class="services section ">
  <div class="container">
   <div class="about-us show-up header-text" style="padding-bottom: 15px;margin-top: -150px;">
       <div class="col-lg-12">
            <h4>
                <a style="color: #424242;font-family: 'Helvetica Neue';" href="#">
                <i class="fa-solid fa-store"></i>
                {{$productdetail['company_name']}}</a>
            </h4>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="row">
        <div class="col-lg-6">

            <div class="w3-content w3-display-container">
                
                @foreach($productimage as $list)
                   <img id="imgfiledetail" class="mySlides" src="{{ url('/files/'.$list['img_file']) }}" style="width:100%">
                @endforeach

              <button class="w3-button w3-display-left" style="background-color: transparent;color: black" onclick="plusDivs(-1)">&#10094;</button>
              <button class="w3-button w3-display-right" style="background-color: transparent;color: black" onclick="plusDivs(1)">&#10095;</button>
          </div>
      </div>
                
      <div class="col-lg-6" >
          <div class="service-item" >
            <h4 style="font-family: 'Helvetica Neue';">{{$productdetail['product_name']}}</h4>
            <div class="heading1"></div>
            <div style="height: 200px;color: #A9A9A9">
                <div class="" id="test">
                    <span style="font-size: 12px;"><b>IDR &nbsp;&nbsp;{{$productdetail['product_price']}}</b></span>
                </div>
                <div class="" id="test">
                    <span style="font-size: 12px;"><b>Min Order &nbsp;&nbsp;{{$productdetail['minimum_order']}} Pcs</b></span>
                </div>
                <div class="" id="test" style="">
                    <span style="font-size: 12px;"><b>Terjual &nbsp;&nbsp;{{$productdetail['pay_counting']}}</b></span>
                </div>
                <div class="" id="test" style="">
                    <span style="font-size: 12px;"><b>Size &nbsp;&nbsp;{{$productdetail['product_size']}}</b></span>
                </div>

                <div class="" id="test" style="">
                    <span style="font-size: 12px;"><b>Qty &nbsp;&nbsp;{{$productdetail['stock']}}</b></span>
                </div>

                <div class="" id="test" style="">
                    <span style="font-size: 12px;"><b>Kategori &nbsp;&nbsp;{{$productdetail['product_category']}}</b></span>
                </div>
                <div class="" id="test" style="">
                    <span style="font-size: 12px;"><b>Pemilik &nbsp;&nbsp;{{$productdetail['company_name']}}</b></span>
                </div>
            </div>
           

            <div class="heading1"></div>

            <div class="" style="height: 50px">
                <span style="font-size: 12px;">
                    {{$productdetail['product_descriptions']}}
                </span>
            </div>

            <div class="heading1"></div>


            <div class="" style="padding-top: 20px">
                <center>
                    <table>
                        <tr>
                            <td>
                                {!! Form::open(['url'=>url('/carts'),'method'=>'POST', 'files'=>'true', 'class'=>'', 'autocomplete'=>'off','style'=>'background-color:transparent']) !!}
                                <input type="hidden" class="form-control  has-feedback  " value="{{$list['id']}}" id="product_id" name="product_id" required>
                                <button type="submit" style="background-color: transparent;border-color: transparent;">
                                    <i class="fa-solid fa-cart-arrow-down menu" style="color: #808080;padding-right: 15px;font-size: 20px"></i>
                                </button>
                                {!! Form::close() !!}
                            </td>

                            <td>
                                @if($list['wishlist_status']==true)
                                <a href="#">
                                    <i class="fa-solid fa-heart" style="color:red;padding-right: 15px;font-size: 20px"></i>
                                </a>
                                @else()
                                {!! Form::open(['url'=>url('/wishlists'),'method'=>'POST', 'files'=>'true', 'class'=>'', 'autocomplete'=>'off','style'=>'background-color:transparent']) !!}
                                <input type="hidden" class="form-control  has-feedback " value="{{$list['id']}}" id="product_id" name="product_id" required>
                                <button type="submit" style="background-color: transparent;border-color: transparent;">
                                    <i class="fa-solid fa-heart" style="color: #808080;padding-right: 15px;font-size: 20px"></i>
                                </button>
                                {!! Form::close() !!}
                                @endif()

                            </td>

                            <td>
                                {!! Form::open(['url'=>url('#'),'method'=>'GET', 'files'=>'true', 'class'=>'form-horizontal', 'autocomplete'=>'off','style'=>'margin-top:0px']) !!}

                                <button type="submit" class='buttonaddress' field=''>Quotations</button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    </table>

                </center>
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

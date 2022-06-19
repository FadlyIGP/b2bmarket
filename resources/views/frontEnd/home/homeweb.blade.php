{{-- footer-text-left --}}
@extends('frontEnd.weblayouts.app')
@section('content')
<!-- ***** Body ***** -->
<div id="" class="about-us" style="margin-bottom: -250px">
  <div class="container ">
    <div class="col-lg-12 align-self-center show-up header-text">
      <div class="row">
        <div style="overflow-x:auto;">
          <table class="table" width="100%">
            <tr>
              <td width="25%" style="font-size: 12px">
                <a href="#"  style="color: black">
                  Semua Kategori
                </a>

              </td>
              <td width="25%" style="font-size: 12px">
                <a href="#"  style="color: black">
                  Semua Kategori
                </a>

              </td>
              <td width="25%" style="font-size: 12px">
                <a href="#"  style="color: black">
                  Semua Kategori
                </a>

              </td>
              <td width="25%" style="font-size: 12px;color: black">
                <a href="#" style="color: black">
                  Semua Kategori
                </a>

              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="services" class="services section ">
    <div class="container">
        <div class="about-us" style="padding-bottom: 15px;margin-top: -10px;">
         <div class="col-lg-3">
          <div class="div">
            <h4><a style="color: #424242;" href="#">Terlaris</a></h4>
        </div>
        <div class="heading1"></div>
    </div>
</div>
<div class="col-lg-12">
    <div class="row">
        @foreach($product_max_pay as $list)
        <div class="col-lg-3" style="margin-top: 12px">
         <div class="service-item" >
            <h4 style="text-transform: uppercase; font-family: 'Roboto'; font-weight: 400; font-size: 15px">{{ $list['product_name'] }}</h4>
            <img class="zoom" id="imgfile" data-wow-duration="1s" data-wow-delay="0.5s" src="{{ url('/files/'.$list['image']) }}" alt="" style="background-color: transparent;opacity: 4;">
            <center>
             <div class="product-rating">
              <i class="fa fa-star" style="color: red"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
          </div>
      </center>
      <div class="heading1"></div>
      <div style="display: flex;">
        <div class="" id="test">
            <span style="color: #ed2114; font-size: 12px;"><b>IDR {{ $list['product_price'] }}</b></span>
        </div>
        <div class="" id="test">
          <span style="float: right; text-decoration: line-through black; font-size: 10px;"><b>Old {{ $list['product_price'] }}</b></span>
      </div>
  </div>
  <div style="display: flex;">
    <div class="" id="test">
        <span style="font-size: 12px;"><b>Min Order {{ $list['min_order'] }}  Pcs</b></span>
    </div>
    <div class="" id="test" style="padding-bottom: 25px">
        <span style="float: right; color: #636363; font-size: 12px;"><b>Terjual {{ $list['pay_counting'] }} </b></span>
    </div>
</div>

<div class="heading1"></div>

<div class="" style="padding-top: 25px">
    <center>

        <table>
            <tr>
                <td>
                 {!! Form::open(['url'=>url('/carts'),'method'=>'POST', 'files'=>'true', 'class'=>'', 'autocomplete'=>'off','style'=>'background-color:transparent']) !!}
                 <input type="hidden" class="form-control  has-feedback  " value="12" id="product_id" name="product_id" required>
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
                <a href="{{ url('/infoproducts',$list['id']) }}">
                    <i class="fa-solid fa-eye" style="color: #808080;font-size: 20px"></i>
                </a>
            </td>
        </tr>
    </table>

</center>
</div>
</div>
</div>
@endforeach

</div>
</div>
</div>

<div id="services" class="services section" style="margin-top: -220px">

    <div class="container">
        <div class="about-us" style="padding-bottom: 15px;margin-top: -10px;">
         <div class="col-lg-3">
          <div class="div">
            <h4><a style="color: #424242;" href="#">Terbaru</a></h4>
        </div>
        <div class="heading1"></div>
    </div>
</div>
<div class="col-lg-12">
    <div class="row">
        @foreach($productlisting as $list)
        <div class="col-lg-3" style="margin-top: 12px">
         <div class="service-item" >
            <h4 style="text-transform: uppercase; font-family: 'Roboto'; font-weight: 400; font-size: 15px">{{ $list['product_name'] }}</h4>
            <img id="imgfile" data-wow-duration="1s" data-wow-delay="0.5s" src="{{ url('/files/'.$list['image']) }}" alt="" style="background-color: transparent;opacity: 4;">
            <center>
             <div class="product-rating">
              <i class="fa fa-star" style="color: red"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
          </div>
      </center>
      <div class="heading1"></div>
      <div style="display: flex;">
        <div class="" id="test">
            <span style="font-size: 12px;"><b>IDR {{ $list['product_price'] }}</b></span>
        </div>
        <div class="" id="test">
          <span style="float: right; text-decoration: line-through black; font-size: 10px;"><b>Old {{ $list['product_price'] }}</b></span>
      </div>
  </div>
  <div style="display: flex;">
        <div class="" id="test">
            <span style="font-size: 12px;"><b>Min Order {{ $list['min_order'] }} Pcs</b></span>
        </div>
        <div class="" id="test" style="padding-bottom: 25px">
            <span style="float: right; color: #636363; font-size: 12px;"><b>Terjual {{ $list['pay_counting'] }} </b></span>
        </div>
    </div>

        <div class="heading1"></div>

        <div class="" style="padding-top: 25px">
            <center>
                <a href="#">
                    <i class="fa-solid fa-cart-arrow-down menu" style="color: #808080;padding-right: 15px;font-size: 20px"></i>
                </a>
                <a href="#">
                    <i class="fa-solid fa-heart" style="color: #808080;padding-right: 15px;font-size: 20px"></i>
                </a>
                <a href="#">
                    <i class="fa-solid fa-eye" style="color: #808080;font-size: 20px"></i>
                </a>
            </center>
        </div>
    </div>
</div>
@endforeach

</div>
</div>
</div>


<!-- Scripts -->

@endsection
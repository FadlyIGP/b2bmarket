{{-- footer-text-left --}}
@extends('frontEnd.weblayouts.app')
@section('content')
    <!-- ***** Body ***** -->
<div id="" class="about-us" style="margin-bottom: -250px">
    <div class="container ">
        <div class="col-lg-12 align-self-center show-up header-text">
            <div class="row">
                <div class="col-lg-3">
                  <div class="box-item topdiv">
                    <h4>
                        <a href="#">
                            <i class="fa-brands fa-shopify"></i>
                            Semua Kategori
                        </a>
                    </h4>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="box-item topdiv">
                    <h4>
                        <a href="#">
                            <i class="fa-solid fa-store"></i>
                            Toko
                        </a>
                    </h4>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="box-item topdiv">
                    <h4>
                        <a href="#">
                            <i class="fa-solid fa-chart-line"></i>
                            Banyak Dicari
                        </a>
                    </h4>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="box-item topdiv">
                    <h4>
                        <a href="#">
                            <i class="fa-solid fa-fire-flame-curved"></i>
                            Terpopuler
                        </a>
                    </h4>
                  </div>
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
        </div>
    </div>
    <div class="col-lg-12">
        <div class="row">
            @foreach($product_max_pay as $list)
            <div class="col-lg-3" style="margin-top: 12px">
               <div class="service-item" >
                    <h4 style="font-family: 'Helvetica Neue';font-size: 15px">{{ $list['product_name'] }}</h4>
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

                    <div class="" id="test">
                        <span style="font-size: 12px;"><b>IDR {{ $list['product_price'] }}</b></span>
                    </div>
                    <div class="" id="test">
                        <span style="font-size: 12px;"><b>Min Order 1 Pcs</b></span>
                    </div>
                    <div class="" id="test" style="padding-bottom: 25px">
                        <span style="font-size: 12px;"><b>Terjual {{ $list['pay_counting'] }} </b></span>
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
                            <a href="{{ url('/infoproducts',$list['id']) }}">
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

<div id="services" class="services section" style="margin-top: -220px">
  
    <div class="container">
        <div class="about-us" style="padding-bottom: 15px;margin-top: -10px;">
           <div class="col-lg-3">
              <div class="div">
                <h4><a style="color: #424242;" href="#">Terbaru</a></h4>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="row">
            @foreach($productlisting as $list)
            <div class="col-lg-3" style="margin-top: 12px">
               <div class="service-item" >
                    <h4 style="font-family: 'Helvetica Neue';font-size: 15px">{{ $list['product_name'] }}</h4>
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

                    <div class="" id="test">
                        <span style="font-size: 12px;"><b>IDR {{ $list['product_price'] }}</b></span>
                    </div>
                    <div class="" id="test">
                        <span style="font-size: 12px;"><b>Min Order 1 Pcs</b></span>
                    </div>
                    <div class="" id="test" style="padding-bottom: 25px">
                        <span style="font-size: 12px;"><b>Terjual {{ $list['pay_counting'] }} </b></span>
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

{{-- footer-text-left --}}
@extends('frontEnd.weblayouts.app')
@section('content')
    <!-- ***** Body ***** -->
<div id="services" class="services section ">
    <div class="container">
        <div class="about-us" style="padding-bottom: 15px;margin-top: -130px;">
           <div class="col-lg-3">
              <div class="div">
                <h4><a style="color: #424242;" href="#">Wishlist</a></h4>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="row">
            @if(empty($listcart))
                <div class="row" style="font-size: 13px">
                        <div class="col-lg-12 test"  style="overflow-x:auto;padding-top: 30px;padding-bottom: 50px">
                        <center>
                            <div style="padding-bottom: 20px">
                                <span>Nothing wislist</span>
                            </div>

                            <div>
                                {!! Form::open(['url'=>url('/index2'),'method'=>'GET', 'files'=>'true', 'class'=>'form-horizontal', 'autocomplete'=>'off','style'=>'margin-top:0px']) !!}
                                <button style="background-color: transparent;border-color: #FF4500;border-radius: 10px" type="submit">
                                    <span style="font-family: 'Helvetica Neue';color: #FF4500;font-size: 12px">
                                        <b>
                                            Continue Shopping..!
                                        </b>
                                    </span>
                                </button>
                                {!! Form::close() !!}
                            </div>
                        </center>
                </div>
            </div>
            @else()
                @foreach($listcart as $list)
                <div class="col-lg-3" style="margin-top: 12px">
                   <div class="service-item" >
                        <h4 style="text-transform: uppercase; font-family: 'Roboto'; font-weight: 400; font-size: 15px">{{ $list['product_name'] }}</h4>
                        <img class="zoom" id="imgfile" data-wow-duration="1s" data-wow-delay="0.5s" src="{{ url('/files/'.$list['image']) }}" alt="" style="background-color: transparent;opacity: 4;">
                        <center>
                               <div class="product-rating">
                                  <i class="fa fa-star" style="color: red"></i>
                                  <i class="fa fa-star" style="color: red"></i>
                                  <i class="fa fa-star" style="color: red"></i>
                                  <i class="fa fa-star" style="color: red"></i>
                                  <i class="fa fa-star"></i>
                              </div>
                        </center>
                        <div class="heading1"></div>
                        <div style="display: flex;">
                            <div class="" id="test">
                                <span style="color: #ed2114; font-size: 12px;"><b> {{ $list['product_price'] }}</b></span>
                            </div>
                            <div class="" id="test">
                                <span style="float: right; text-decoration: line-through black; font-size: 10px;">
                                    <b>Old {{ $list['product_price'] }}</b>
                                </span>
                            </div>
                        </div>
                        <div style="display: flex;">
                            <div class="" id="test">
                                <span style="font-size: 12px;"><b>Min Order {{ $list['min_order'] }}  Pcs</b></span>
                            </div>
                            <div class="" id="test" style="padding-bottom: 25px">
                                <span style="float: right; color: #636363; font-size: 12px;">
                                    <b>Terjual {{ $list['pay_counting'] }} </b>
                                </span>
                            </div>
                        </div>

                        <div class="heading1"></div>

                        <div class="" style="padding-top: 25px">
                            <center>
                                <table>
                                    <tr>
                                        <td>
                                           {!! Form::open(['url'=>url('/carts'),'method'=>'POST', 'files'=>'true', 'class'=>'', 'autocomplete'=>'off','style'=>'background-color:transparent']) !!}
                                                <input type="hidden" class="form-control  has-feedback  " value="{{$list['product_id']}}" id="product_id" name="product_id" required>
                                                <button type="submit" style="background-color: transparent;border-color: transparent;">
                                                    <i class="fa-solid fa-cart-arrow-down menu" style="color: #808080;padding-right: 15px;font-size: 20px"></i>
                                                </button>
                                            {!! Form::close() !!}
                                        </td>

                                        <td>
                                            @if($list['wishlist_status']==1)
                                                {!! Form::open(['url'=>url('/wishlists/'.$list['id']),'method'=>'DELETE', 'files'=>'true', 'class'=>'', 'autocomplete'=>'off','style'=>'background-color:transparent']) !!}
                                                    <button type="submit" style="background-color: transparent;border-color: transparent;">
                                                        <i class="fa-solid fa-heart" style="color: red;padding-right: 15px;font-size: 20px">
                                                            
                                                        </i>
                                                    </button>
                                                {!! Form::close() !!}
                                            @else()
                                                {!! Form::open(['url'=>url('/wishlist'),'method'=>'POST', 'files'=>'true', 'class'=>'', 'autocomplete'=>'off','style'=>'background-color:transparent']) !!}
                                                    <input type="hidden" class="form-control  has-feedback " value="{{$list['product_id']}}" id="product_id" name="product_id" required>
                                                    <button type="submit" style="background-color: transparent;border-color: transparent;">
                                                        <i class="fa-solid fa-heart" style="color: #808080;padding-right: 15px;font-size: 20px"></i>
                                                    </button>
                                                {!! Form::close() !!}
                                            @endif()
                                            
                                        </td>

                                        <td>
                                            <a href="{{ url('/infoproducts',$list['product_id']) }}">
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
            @endif()
        </div>
    </div>
</div>
  <!-- Scripts -->

@endsection  

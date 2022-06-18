@extends('frontEnd.layouts.app')

@section('content')

<style type="text/css">
    .imglabel{
        size: 50px;
        height: 220px;
        width: 300px;
        left: 56px;
        top: 150px;
        border-radius: 2.56000018119812px;
      }
</style>

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- shop -->
            @foreach($productrandom as $list)
            <div class="col-md-4 col-xs-6">
                <div class="shop" style="border-radius: 20px;">
                    <div class="shop-img">
                        <img class="imglabel" src="{{ url('/files/'.$list['image']) }}" alt="Back to homepage" routerlink="main" class="responsive" tabindex="0" ng-reflect-router-link="main">
                    </div>
                    <div class="shop-body">
                        <h3>{{ $list['product_name'] }}</h3>
                        <a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- shop -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">New Products</h3>
                    <div class="section-nav">
                        <ul class="section-tab-nav tab-nav">
                            <li class="active"><a data-toggle="tab" href="#tab1">Laptops</a></li>
                            <li><a data-toggle="tab" href="#tab1">Smartphones</a></li>
                            <li><a data-toggle="tab" href="#tab1">Cameras</a></li>
                            <li><a data-toggle="tab" href="#tab1">Accessories</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /section title -->

            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <!-- tab -->
                        <div id="tab1" class="tab-pane active">
                            <div class="products-slick" data-nav="#slick-nav-1">
                                <!-- product -->
                                @foreach($productlisting as $list)
                                <div class="product" style="border-radius: 10px;">
                                    <div class="product-img">
                                        <img src="{{ url('/files/'.$list['image']) }}" alt="">
                                        <div class="product-label">
                                            <span class="sale">-30%</span>
                                            <span class="new">NEW</span>
                                        </div>
                                    </div>
                                    <div class="product-body" >
                                        <p class="product-category">{{ $list['product_category'] }}</p>
                                        <h3 class="product-name"><a href="#">{{ $list['product_name'] }}</a></h3>
                                        <h4 class="product-price">
                                            {{ $list['product_price'] }} 
                                            <del class="product-old-price">
                                                {{ $list['product_price'] }}
                                            </del>
                                        </h4>
                                        <p class="product-category">
                                            <b>
                                            {{ $list['pay_counting'] }}  Terjual
                                            </b>
                                        </p>
                                        
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="product-btns">
                                            
                                            @if($list['wishlist_status'] == true)
                                                <button class="add-to-wishlist">
                                                    <i class="fa fa-heart-o" style="color: red"></i>
                                                    <span class="tooltipp">add to wishlist</span>
                                                </button>
                                            @else()
                                                 <button class="add-to-wishlist">
                                                    <i class="fa fa-heart-o" style=""></i>
                                                    <span class="tooltipp">add to wishlist</span>
                                                </button>

                                            @endif()

                                            <button class="add-to-compare">
                                                <i class="fa fa-exchange"></i>
                                                <span class=""></span>
                                            </button>
                                             {{-- <a href="https://www.freecodecamp.org/"> --}}
                                               <a href="{{ url('/infoproducts',$list['id']) }}" class="quick-view">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            
                                        {{-- </a> --}}
                                        </div>
                                        
                                    </div>
                                    <div class="add-to-cart">
                                    {!! Form::open(['url'=>url('/carts'),'method'=>'POST', 'files'=>'true', 'class'=>'form-horizontal', 'autocomplete'=>'off']) !!}
                                        <input type="hidden" class="form-control  has-feedback  " value="12" id="product_id" name="product_id" required>
                                        <button type="submit" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                    {!! Form::close() !!}
                                    </div>
                                </div>
                                @endforeach

                            </div>
                            <div id="slick-nav-1" class="products-slick-nav"></div>
                        </div>
                        <!-- /tab -->
                    </div>
                </div>
            </div>
            <!-- Products tab & slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- HOT DEAL SECTION -->
<div id="hot-deal" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="hot-deal">
                    <ul class="hot-deal-countdown">
                        <li>
                            <div>
                                <h3>02</h3>
                                <span>Days</span>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3>10</h3>
                                <span>Hours</span>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3>34</h3>
                                <span>Mins</span>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3>60</h3>
                                <span>Secs</span>
                            </div>
                        </li>
                    </ul>
                    <h2 class="text-uppercase">hot deal this week</h2>
                    <p>New Collection Up to 50% OFF</p>
                    <a class="primary-btn cta-btn" href="#">Shop now</a>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /HOT DEAL SECTION -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Top selling</h3>
                    <div class="section-nav">
                        <ul class="section-tab-nav tab-nav">
                            <li class="active"><a data-toggle="tab" href="#tab2">Laptops</a></li>
                            <li><a data-toggle="tab" href="#tab2">Smartphones</a></li>
                            <li><a data-toggle="tab" href="#tab2">Cameras</a></li>
                            <li><a data-toggle="tab" href="#tab2">Accessories</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /section title -->

            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <!-- tab -->
                        <div id="tab2" class="tab-pane fade in active">
                            <div class="products-slick" data-nav="#slick-nav-2">
                                <!-- product -->
                                
                                @foreach($product_max_pay as $list)
                                <div class="product" style="border-radius: 10px;">
                                    <div class="product-img">
                                        <img src="{{ url('/files/'.$list['image']) }}" alt="">
                                        <div class="product-label">
                                            <span class="sale">-30%</span>
                                            <span class="new">NEW</span>
                                        </div>
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">{{ $list['product_category'] }}</p>
                                        <h3 class="product-name"><a href="#">{{ $list['product_name'] }}</a></h3>
                                         <h4 class="product-price">
                                            {{ $list['product_price'] }} 
                                            <del class="product-old-price">
                                                {{ $list['product_price'] }}
                                            </del>
                                        </h4>
                                        <p class="product-category">
                                            <b>
                                            {{ $list['pay_counting'] }}  Terjual
                                            </b>
                                        </p>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="product-btns">
                                            @if($list['wishlist_status'] == true)
                                                <button class="add-to-wishlist">
                                                    <i class="fa fa-heart-o" style="color: red"></i>
                                                    <span class="tooltipp">add to wishlist</span>
                                                </button>
                                            @else()
                                                 <button class="add-to-wishlist">
                                                    <i class="fa fa-heart-o" style=""></i>
                                                    <span class="tooltipp">add to wishlist</span>
                                                </button>

                                            @endif()
                                            <button class="add-to-compare">
                                                <i class="fa fa-exchange"></i>
                                                <span class=""></span>
                                            </button>
                                            <button class="quick-view">
                                                <i class="fa fa-eye"></i>
                                                <span class="tooltipp">quick view</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                    </div>
                                </div>
                                @endforeach()
                                <!-- /product -->

                            </div>
                            <div id="slick-nav-2" class="products-slick-nav"></div>
                        </div>
                        <!-- /tab -->
                    </div>
                </div>
            </div>
            <!-- /Products tab & slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
@endsection  
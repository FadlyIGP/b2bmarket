{{-- footer-text-left --}}
{{-- @extends('frontEnd.weblayouts.app') --}}
{{-- @section('content') --}}
    <!-- ***** Body ***** -->
<style type="text/css">
   * {
      box-sizing: border-box;
    }

    .footer {
      position:fixed;
      bottom:0px;
      left:0;
      width:100%;
      height: 50px;
      background-color: white;
      border: 1px;
      z-index: 10;
      border-top: 1px solid #808080;

    }

    .footer-text-left {
          font-size:30px;
          width:100%;
          padding-top:10px;
          float:center;
          /*word-spacing:5px;*/
          text-align: center;  
    }

    a.menu:hover {
      background-color:transparent;
      font-size:20px;
      color: #DCDCDC;
    }

    .icon-style {
          height:50px;
          margin-left:20px;
          margin-top:5px;
          color: #808080
    }

    .icon-style:hover {
      background-color:yellow;
      height:10px;
      color: orange;
    }

    #GFG {
      text-decoration: none;
    }

    .badge {
          padding-left: 0px;
          padding-right: 0px;
          -webkit-border-radius: 9px;
          -moz-border-radius: 9px;
          border-radius: 9px;
          color: #808080
    }

    #lblCartCount {
        font-size: 12px;
        background: transparent;
        color: black;
        padding-left: -200px;
        vertical-align: top;
        margin-left: -10px; 
        font-weight: bold;
        color: #808080
    }


    #home {
      font-size: 10px;
      background-color: transparent;
      color: black;
      vertical-align:bottom;
      right: 37px;
      bottom: -10px;
      text-align: center;
      position: relative;
  }

  #cart {
      font-size: 10px;
      background-color: transparent;
      color: black;
      vertical-align:bottom;
      right: 50px;
      bottom: -10px;
      text-align: center;
      position: relative;
      color: #808080
  }

  #test {
    width: 200px;
    height: 20px;
    margin: 0;
    background-color: transparent;
    display: absolute;
    text-align: left;
  }

  #descriptions {
    width: 100%;
    height: 120px;
    margin: 0;
    background-color: transparent;
    display: absolute;
    text-align: left;
  }

  .heading1 {
    border-bottom: 1px solid #aaa;
  }

  #imgfile {
    opacity: 1;
    text-align: center;
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 100%;
    height: 180px;
  }

  #imgfiledetail {
    opacity: 1;
    height: 300px;
    width: 100%;
    text-align: center;
    display: block;
    margin-left: auto;
    margin-right: auto;

  }

  .div {
      width: 50%;
      height: 30px;
      background: transparent;
      border-radius: 10px;
      margin-left: 5px;
      font-family: 'Roboto-Regular';
      font-size: 20px;
  }

  .topdiv {
      font-family: 'Roboto-Regular';
      font-size: 20px;
  }

  .mySlides {display:none;}


</style>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <title>JualinAja</title>

    <!-- Bootstrap core CSS -->
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-chain-app-dev.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animated.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link href='https://fonts.googleapis.com/css2?family=Chakra+Petch:ital,wght@0,400;0,500;0,700;1,400&family=Poppins:wght@400;500;700&family=Raleway:ital,wght@0,300;0,400;0,500;1,500&display=swap' rel='stylesheet'>

</head>

 <!-- ***** Preloader Start ***** -->
<div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
</div>

 <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="index.html" class="logo">
              <img src="https://i.ibb.co/kh6Ydz0/newjualinajalogo.png" alt="Chain App Dev" style="width: 200px;height: 70px">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              {{-- <li class="" style="text-align: center;left: 100px"><a href="" class="">Home</a></li> --}}
              <li class="scroll-to-section" style="text-align: center;padding-right: 350px;">
                <form>
                <input class="scroll-to-section" type="" name="" style="border: 1px solid #808080;border-top-left-radius:20px;border-bottom-left-radius:20px;height: 40px;">
                <button class="" style="position: absolute;width: 10%;border: 1px solid #808080;border-top-right-radius:20px;border-bottom-right-radius:20px;height: 40px ">
                  <i class="fa-solid fa-magnifying-glass"></i>
                  
                </button>
                </form>

              </li>
              <li style="background-color: transparent;right: 20px;border-radius: 20px">
                <a href="{{ route('login') }}">
                    <i class="fa-solid fa-user-gear" style="color: #808080;font-size: 20px"></i>
                  <span style="color: #808080">Account</span>  
                </a>
            </li> 
          
            </ul>        
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->
    <div id="modal" class="popupContainer" style="display:none;border-radius: 20px">
    <div class="popupHeader" style="margin-top: 5px;margin-right: 20px;margin-left: 20px;border-top-left-radius:20px;border-bottom-right-radius:20px">
         <div class="social_login">
            <div class="action_btns">
                <div class="one_half"><a href="#" id="login_form" class="btn">Profile</a></div>
                <div class="one_half last"><a href="{{ url('/login') }}" id="register_form" class="btn">Sign Out</a></div>
            </div>
        </div>
    </div>
</div>

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
                        <span style="font-size: 12px;"><b>Min Order {{ $list['min_order'] }}  Pcs</b></span>
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
                        <span style="font-size: 12px;"><b>Min Order {{ $list['min_order'] }} Pcs</b></span>
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

  <footer id="footer">
    <div class="footer">
      <p class="footer-text-left">

        <a href="#" id="GFG" class="menu icon-style">
          <i class="fa-solid fa-house-user"></i>
        </a>

        <a href="#" id="GFG" class="menu icon-style"> 
          <i class="fa-solid fa-cart-plus"></i>
          <span class='badge badge-warning' id='lblCartCount'> </span>    
        </a>

        <a href="#" id="GFG" class="menu icon-style">
          <i class="fa-solid fa-heart"></i>
          <span class='badge badge-warning' id='lblCartCount'></span>
        </a> 

        <a href="#" id="GFG" class="menu icon-style">
          <i class="fa-solid fa-money-bill-1-wave"></i>
        </a>

        <a href="#" id="GFG" class="menu icon-style">
          <i class="fa-solid fa-comment-dots"></i>
          <span class='badge badge-warning' id='lblCartCount'></span>
        </a>

      </p>
    </div>
  </footer>

  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>

  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>

  <script src="{{ asset('assets/js/animation.js') }}"></script>

  <script src="{{ asset('assets/js/imagesloaded.js') }}"></script>

  <script src="{{ asset('assets/js/popup.js') }}"></script>

  <script src="{{ asset('assets/js/custom.js') }}"></script>
  <!-- Scripts -->

{{-- @endsection   --}}

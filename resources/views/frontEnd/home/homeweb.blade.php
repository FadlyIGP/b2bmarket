{{-- footer-text-left --}}
{{-- @section('content') --}}

<!DOCTYPE html>
<html lang="en">
<style type="text/css">
   * {
      box-sizing: border-box;
    }

    .footer {
      position:fixed;
      bottom:0px;
      /*top:150px;*/
      left:0;
      width:100%;
      height: 50px;
      background-color: white;
      border: 1px;
      /*border-width: 10px 30px 5px 20px !important;*/
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

  .heading1 {
    border-bottom: 1px solid #aaa;
  }

  img {
    opacity: 1;
    height: 150px;
    width: 40px;
  }

</style>

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <title>JualinAja</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/templatemo-chain-app-dev.css">
    <link rel="stylesheet" href="assets/css/animated.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  </head>

<body>

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
  <!-- ***** Preloader End ***** -->

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
              <li class="scroll-to-section" style="text-align: center;">
                <form>
                <input class="scroll-to-section" type="" name="" style="border: 1px solid #808080;border-top-left-radius:10px;border-bottom-left-radius:10px">
                <button class="" style="height: 28px;position: absolute;width: 15%;border: 1px solid #808080;border-top-right-radius:10px;border-bottom-right-radius:10px ">
                  <i class="fa-solid fa-magnifying-glass"></i>
                  
                </button>
                </form>
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
  
  <div id="modal" class="popupContainer" style="display:none;">
    <div class="popupHeader">
        <span class="header_title">Login</span>
        <span class="modal_close"><i class="fa fa-times"></i></span>
    </div>

    <section class="popupBody">
        <!-- Social Login -->
        <div class="social_login">
            <div class="">
                <a href="#" class="social_box fb">
                    <span class="icon"><i class="fab fa-facebook"></i></span>
                    <span class="icon_title">Connect with Facebook</span>

                </a>

                <a href="#" class="social_box google">
                    <span class="icon"><i class="fab fa-google-plus"></i></span>
                    <span class="icon_title">Connect with Google</span>
                </a>
            </div>

            <div class="centeredText">
                <span>Or use your Email address</span>
            </div>

            <div class="action_btns">
                <div class="one_half"><a href="#" id="login_form" class="btn">Login</a></div>
                <div class="one_half last"><a href="#" id="register_form" class="btn">Sign up</a></div>
            </div>
        </div>

        <!-- Username & Password Login form -->
        <div class="user_login">
            <form>
                <label>Email / Username</label>
                <input type="text" />
                <br />

                <label>Password</label>
                <input type="password" />
                <br />

                <div class="checkbox">
                    <input id="remember" type="checkbox" />
                    <label for="remember">Remember me on this computer</label>
                </div>

                <div class="action_btns">
                    <div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Back</a></div>
                    <div class="one_half last"><a href="#" class="btn btn_red">Login</a></div>
                </div>
            </form>

            <a href="#" class="forgot_password">Forgot password?</a>
        </div>

        <!-- Register Form -->
        <div class="user_register">
            <form>
                <label>Full Name</label>
                <input type="text" />
                <br />

                <label>Email Address</label>
                <input type="email" />
                <br />

                <label>Password</label>
                <input type="password" />
                <br />

                <div class="checkbox">
                    <input id="send_updates" type="checkbox" />
                    <label for="send_updates">Send me occasional email updates</label>
                </div>

                <div class="action_btns">
                    <div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Back</a></div>
                    <div class="one_half last"><a href="#" class="btn btn_red">Register</a></div>
                </div>
            </form>
        </div>
    </section>

    <!-- ***** Body ***** -->
</div>
<div id="services" class="services section">

  <div class="container">
   <div class="" style="padding-bottom: 15px">
    <h4>Top Seeling</h4>
  </div>
  <div class="row">
    <div class="col-lg-3">
      <div class="service-item" >
        {{-- <div class="icon"></div> --}}
        <h4>Product Name</h4>
        <img class="" data-wow-duration="1s" data-wow-delay="0.5s" src="assets/images/DRYER FILTER GENIO R12.JPG" alt="" style="background-color: transparent;opacity: 4;">
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
        <span style="font-size: 12px;"><b>IDR Rp 5.00.000</b></span>
      </div>
      <div class="" id="test">
        <span style="font-size: 12px;"><b>Min Order 1 Pcs</b></span>
      </div>
      <div class="" id="test" style="padding-bottom: 25px">
        <span style="font-size: 12px;"><b>Terjual 100</b></span>
      </div>

      <div class="heading1"></div>

      <div class="" style="padding-top: 25px">
        <center>
          <a href="#">
            <i class="fa-solid fa-cart-arrow-down" style="color: #808080;padding-right: 15px;font-size: 20px"></i>
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
  <div class="col-lg-3">
    <div class="service-item ">
      {{-- <div class="icon"></div> --}}
      <h4>Product Name</h4>
      <img src="assets/images/toyotamob.png" alt="">
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
      <span style="font-size: 12px;"><b>IDR Rp 5.00.000</b></span>
    </div>
    <div class="" id="test">
      <span style="font-size: 12px;"><b>Min Order 1 Pcs</b></span>
    </div>
    <div class="" id="test" style="padding-bottom: 25px">
      <span style="font-size: 12px;"><b>Terjual 100</b></span>
    </div>

    <div class="heading1"></div>

    <div class="" style="padding-top: 25px">
      <center>
        <a href="#">
          <i class="fa-solid fa-cart-arrow-down" style="color: #808080;padding-right: 15px;font-size: 20px"></i>
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
<div class="col-lg-3">
  <div class="service-item ">
    {{-- <div class="icon"></div> --}}
    <h4>Product Name</h4>
    <img src="assets/images/toyotamob.png" alt="">
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
    <span style="font-size: 12px;"><b>IDR Rp 5.00.000</b></span>
  </div>
  <div class="" id="test">
    <span style="font-size: 12px;"><b>Min Order 1 Pcs</b></span>
  </div>
  <div class="" id="test" style="padding-bottom: 25px">
    <span style="font-size: 12px;"><b>Terjual 100</b></span>
  </div>

  <div class="heading1"></div>

  <div class="" style="padding-top: 25px">
    <center>
      <a href="#">
        <i class="fa-solid fa-cart-arrow-down" style="color: #808080;padding-right: 15px;font-size: 20px"></i>
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
<div class="col-lg-3">
  <div class="service-item ">
    {{-- <div class="icon"></div> --}}
    <h4>Product Name</h4>
    <img src="assets/images/toyotamob.png" alt="">
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
    <span style="font-size: 12px;"><b>IDR Rp 5.00.000</b></span>
  </div>
  <div class="" id="test">
    <span style="font-size: 12px;"><b>Min Order 1 Pcs</b></span>
  </div>
  <div class="" id="test" style="padding-bottom: 25px">
    <span style="font-size: 12px;"><b>Terjual 100</b></span>
  </div>

  <div class="heading1"></div>

  <div class="" style="padding-top: 25px">
    <center>
      <a href="#">
        <i class="fa-solid fa-cart-arrow-down" style="color: #808080;padding-right: 15px;font-size: 20px"></i>
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
</div>
</div>
</div>

<div id="services" class="services section" style="padding-top: 25px">
  
  <div class="container">
   <div class="" style="padding-bottom: 15px">
    <h4>New Product</h4>
  </div>
  <div class="row">
    <div class="col-lg-3">
      <div class="service-item" >
        {{-- <div class="icon"></div> --}}
        <h4>Product Name</h4>
        <img class="" data-wow-duration="1s" data-wow-delay="0.5s" src="assets/images/DRYER FILTER GENIO R12.JPG" alt="" style="background-color: transparent;opacity: 4;">
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
        <span style="font-size: 12px;"><b>IDR Rp 5.00.000</b></span>
      </div>
      <div class="" id="test">
        <span style="font-size: 12px;"><b>Min Order 1 Pcs</b></span>
      </div>
      <div class="" id="test" style="padding-bottom: 25px">
        <span style="font-size: 12px;"><b>Terjual 100</b></span>
      </div>

      <div class="heading1"></div>

      <div class="" style="padding-top: 25px">
        <center>
          <a href="#">
            <i class="fa-solid fa-cart-arrow-down" style="color: #808080;padding-right: 15px;font-size: 20px"></i>
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
  <div class="col-lg-3">
    <div class="service-item ">
      {{-- <div class="icon"></div> --}}
      <h4>Product Name</h4>
      <img src="assets/images/toyotamob.png" alt="">
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
      <span style="font-size: 12px;"><b>IDR Rp 5.00.000</b></span>
    </div>
    <div class="" id="test">
      <span style="font-size: 12px;"><b>Min Order 1 Pcs</b></span>
    </div>
    <div class="" id="test" style="padding-bottom: 25px">
      <span style="font-size: 12px;"><b>Terjual 100</b></span>
    </div>

    <div class="heading1"></div>

    <div class="" style="padding-top: 25px">
      <center>
        <a href="#">
          <i class="fa-solid fa-cart-arrow-down" style="color: #808080;padding-right: 15px;font-size: 20px"></i>
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
<div class="col-lg-3">
  <div class="service-item ">
    {{-- <div class="icon"></div> --}}
    <h4>Product Name</h4>
    <img src="assets/images/toyotamob.png" alt="">
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
    <span style="font-size: 12px;"><b>IDR Rp 5.00.000</b></span>
  </div>
  <div class="" id="test">
    <span style="font-size: 12px;"><b>Min Order 1 Pcs</b></span>
  </div>
  <div class="" id="test" style="padding-bottom: 25px">
    <span style="font-size: 12px;"><b>Terjual 100</b></span>
  </div>

  <div class="heading1"></div>

  <div class="" style="padding-top: 25px">
    <center>
      <a href="#">
        <i class="fa-solid fa-cart-arrow-down" style="color: #808080;padding-right: 15px;font-size: 20px"></i>
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
<div class="col-lg-3">
  <div class="service-item ">
    {{-- <div class="icon"></div> --}}
    <h4>Product Name</h4>
    <img src="assets/images/toyotamob.png" alt="">
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
    <span style="font-size: 12px;"><b>IDR Rp 5.00.000</b></span>
  </div>
  <div class="" id="test">
    <span style="font-size: 12px;"><b>Min Order 1 Pcs</b></span>
  </div>
  <div class="" id="test" style="padding-bottom: 25px">
    <span style="font-size: 12px;"><b>Terjual 100</b></span>
  </div>

  <div class="heading1"></div>

  <div class="" style="padding-top: 25px">
    <center>
      <a href="#">
        <i class="fa-solid fa-cart-arrow-down" style="color: #808080;padding-right: 15px;font-size: 20px"></i>
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
</div>
</div>
</div>

  <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6 align-self-center">
              <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                <div class="row">
                  <div class="col-lg-12">
                    <h3>FIND OUT NEW EXPERIENCE IN </h3>
                    <h3>TOYOTA PIDI SHOWCASE</h3>
                    <br>

                    <p style="font-size: 10px">Discover TMMIN production plan in PIDI 4.0 to Order and Customize a Vehicle, and find out how the production flow going on PT TMMIN</p>
                  </div>
                  <div class="col-lg-12">
                    <div class="white-button first-button scroll-to-section">
                      <a href="#contact" class="">
                        <center>
                          Choose Vehicle
                        </center>
                      </a>
                    </div>
                   
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 service-item" >
              <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <img src="assets/images/toyotamob.png" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="services" class="services section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2" style="background-color: black;background: 1px">
          <div class="section-heading  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
            <h4>Amazing <em>Services &amp; Features</em> for you</h4>
            <img src="assets/images/heading-line-dec.png" alt="">
            <p>If you need the greatest collection of HTML templates for your business, please visit <a rel="nofollow" href="https://www.toocss.com/" target="_blank">TooCSS</a> Blog. If you need to have a contact form PHP script, go to <a href="https://templatemo.com/contact" target="_parent">our contact page</a> for more information.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <div class="service-item first-service">
            <div class="icon"></div>
            <h4>App Maintenance</h4>
             <img src="assets/images/toyotamob.png" alt="">
           
            <div class="text-button">
              <a href="#">Read More <i class="fa fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="service-item second-service">
            <div class="icon"></div>
            <h4>Rocket Speed of App</h4>
             <img src="assets/images/toyotamob.png" alt="">
            <div class="text-button">
              <a href="#">Read More <i class="fa fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="service-item third-service">
            <div class="icon"></div>
            <h4>Multi Workflow Idea</h4>
             <img src="assets/images/toyotamob.png" alt="">
            <div class="text-button">
              <a href="#">Read More <i class="fa fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="service-item fourth-service">
            <div class="icon"></div>
            <h4>24/7 Help &amp; Support</h4>
             <img src="assets/images/toyotamob.png" alt="">
            
            <div class="text-button">
              <a href="#">Read More <i class="fa fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="about" class="about-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="section-heading">
            <h4>About <em>What We Do</em> &amp; Who We Are</h4>
            <img src="assets/images/heading-line-dec.png" alt="">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eismod tempor incididunt ut labore et dolore magna.</p>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="box-item">
                <h4><a href="#">Maintance Problems</a></h4>
                <p>Lorem Ipsum Text</p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="box-item">
                <h4><a href="#">24/7 Support &amp; Help</a></h4>
                <p>Lorem Ipsum Text</p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="box-item">
                <h4><a href="#">Fixing Issues About</a></h4>
                <p>Lorem Ipsum Text</p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="box-item">
                <h4><a href="#">Co. Development</a></h4>
                <p>Lorem Ipsum Text</p>
              </div>
            </div>
            <div class="col-lg-12">
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eismod tempor idunte ut labore et dolore adipiscing  magna.</p>
              <div class="gradient-button">
                <a href="#">Start 14-Day Free Trial</a>
              </div>
              <span>*No Credit Card Required</span>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="right-image">
            <img src="assets/images/about-right-dec.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="clients" class="the-clients">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="section-heading">
            <h4>Check What <em>The Clients Say</em> About Our App Dev</h4>
            <img src="assets/images/heading-line-dec.png" alt="">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eismod tempor incididunt ut labore et dolore magna.</p>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="naccs">
            <div class="grid">
              <div class="row">
                <div class="col-lg-7 align-self-center">
                  <div class="menu">
                    <div class="first-thumb active">
                      <div class="thumb">
                        <div class="row">
                          <div class="col-lg-4 col-sm-4 col-12">
                            <h4>David Martino Co</h4>
                            <span class="date">30 November 2021</span>
                          </div>
                          <div class="col-lg-4 col-sm-4 d-none d-sm-block">
                            <span class="category">Financial Apps</span>
                          </div>
                          <div class="col-lg-4 col-sm-4 col-12">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <span class="rating">4.8</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="thumb">
                        <div class="row">
                          <div class="col-lg-4 col-sm-4 col-12">
                            <h4>Jake Harris Nyo</h4>
                            <span class="date">29 November 2021</span>
                          </div>
                          <div class="col-lg-4 col-sm-4 d-none d-sm-block">
                            <span class="category">Digital Business</span>
                          </div>
                          <div class="col-lg-4 col-sm-4 col-12">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <span class="rating">4.5</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="thumb">
                        <div class="row">
                          <div class="col-lg-4 col-sm-4 col-12">
                            <h4>May Catherina</h4>
                            <span class="date">27 November 2021</span>
                          </div>
                          <div class="col-lg-4 col-sm-4 d-none d-sm-block">
                            <span class="category">Business &amp; Economics</span>
                          </div>
                          <div class="col-lg-4 col-sm-4 col-12">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <span class="rating">4.7</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="thumb">
                        <div class="row">
                          <div class="col-lg-4 col-sm-4 col-12">
                            <h4>Random User</h4>
                            <span class="date">24 November 2021</span>
                          </div>
                          <div class="col-lg-4 col-sm-4 d-none d-sm-block">
                            <span class="category">New App Ecosystem</span>
                          </div>
                          <div class="col-lg-4 col-sm-4 col-12">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <span class="rating">3.9</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="last-thumb">
                      <div class="thumb">
                        <div class="row">
                          <div class="col-lg-4 col-sm-4 col-12">
                            <h4>Mark Amber Do</h4>
                            <span class="date">21 November 2021</span>
                          </div>
                          <div class="col-lg-4 col-sm-4 d-none d-sm-block">
                            <span class="category">Web Development</span>
                          </div>
                          <div class="col-lg-4 col-sm-4 col-12">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <span class="rating">4.3</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> 
                <div class="col-lg-5">
                  <ul class="nacc">
                    <li class="active">
                      <div>
                        <div class="thumb">
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="client-content">
                                <img src="assets/images/quote.png" alt="">
                                <p>“Lorem ipsum dolor sit amet, consectetur adpiscing elit, sed do eismod tempor idunte ut labore et dolore magna aliqua darwin kengan
                                  lorem ipsum dolor sit amet, consectetur picing elit massive big blasta.”</p>
                              </div>
                              <div class="down-content">
                                <img src="assets/images/client-image.jpg" alt="">
                                <div class="right-content">
                                  <h4>David Martino</h4>
                                  <span>CEO of David Company</span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div>
                        <div class="thumb">
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="client-content">
                                <img src="assets/images/quote.png" alt="">
                                <p>“CTO, Lorem ipsum dolor sit amet, consectetur adpiscing elit, sed do eismod tempor idunte ut labore et dolore magna aliqua darwin kengan
                                  lorem ipsum dolor sit amet, consectetur picing elit massive big blasta.”</p>
                              </div>
                              <div class="down-content">
                                <img src="assets/images/client-image.jpg" alt="">
                                <div class="right-content">
                                  <h4>Jake H. Nyo</h4>
                                  <span>CTO of Digital Company</span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div>
                        <div class="thumb">
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="client-content">
                                <img src="assets/images/quote.png" alt="">
                                <p>“May, Lorem ipsum dolor sit amet, consectetur adpiscing elit, sed do eismod tempor idunte ut labore et dolore magna aliqua darwin kengan
                                  lorem ipsum dolor sit amet, consectetur picing elit massive big blasta.”</p>
                              </div>
                              <div class="down-content">
                                <img src="assets/images/client-image.jpg" alt="">
                                <div class="right-content">
                                  <h4>May C.</h4>
                                  <span>Founder of Catherina Co.</span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div>
                        <div class="thumb">
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="client-content">
                                <img src="assets/images/quote.png" alt="">
                                <p>“Lorem ipsum dolor sit amet, consectetur adpiscing elit, sed do eismod tempor idunte ut labore et dolore magna aliqua darwin kengan
                                  lorem ipsum dolor sit amet, consectetur picing elit massive big blasta.”</p>
                              </div>
                              <div class="down-content">
                                <img src="assets/images/client-image.jpg" alt="">
                                <div class="right-content">
                                  <h4>Random Staff</h4>
                                  <span>Manager, Digital Company</span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div>
                        <div class="thumb">
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="client-content">
                                <img src="assets/images/quote.png" alt="">
                                <p>“Mark, Lorem ipsum dolor sit amet, consectetur adpiscing elit, sed do eismod tempor idunte ut labore et dolore magna aliqua darwin kengan
                                  lorem ipsum dolor sit amet, consectetur picing elit massive big blasta.”</p>
                              </div>
                              <div class="down-content">
                                <img src="assets/images/client-image.jpg" alt="">
                                <div class="right-content">
                                  <h4>Mark Am</h4>
                                  <span>CTO, Amber Do Company</span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>          
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="pricing" class="pricing-tables">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="section-heading">
            <h4>We Have The Best Pre-Order <em>Prices</em> You Can Get</h4>
            <img src="assets/images/heading-line-dec.png" alt="">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eismod tempor incididunt ut labore et dolore magna.</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="pricing-item-regular">
            <span class="price">$12</span>
            <h4>Standard Plan App</h4>
            <div class="icon">
              <img src="assets/images/pricing-table-01.png" alt="">
            </div>
            <ul>
              <li>Lorem Ipsum Dolores</li>
              <li>20 TB of Storage</li>
              <li class="non-function">Life-time Support</li>
              <li class="non-function">Premium Add-Ons</li>
              <li class="non-function">Fastest Network</li>
              <li class="non-function">More Options</li>
            </ul>
            <div class="border-button">
              <a href="#">Purchase This Plan Now</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="pricing-item-pro">
            <span class="price">$25</span>
            <h4>Business Plan App</h4>
            <div class="icon">
              <img src="assets/images/pricing-table-01.png" alt="">
            </div>
            <ul>
              <li>Lorem Ipsum Dolores</li>
              <li>50 TB of Storage</li>
              <li>Life-time Support</li>
              <li>Premium Add-Ons</li>
              <li class="non-function">Fastest Network</li>
              <li class="non-function">More Options</li>
            </ul>
            <div class="border-button">
              <a href="#">Purchase This Plan Now</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="pricing-item-regular">
            <span class="price">$66</span>
            <h4>Premium Plan App</h4>
            <div class="icon">
              <img src="assets/images/pricing-table-01.png" alt="">
            </div>
            <ul>
              <li>Lorem Ipsum Dolores</li>
              <li>120 TB of Storage</li>
              <li>Life-time Support</li>
              <li>Premium Add-Ons</li>
              <li>Fastest Network</li>
              <li>More Options</li>
            </ul>
            <div class="border-button">
              <a href="#">Purchase This Plan Now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> 

  <footer id="footer">
    <div class="footer">
      <p class="footer-text-left">

        <a href="#" id="GFG" class="menu icon-style">
          <i class="fa-solid fa-house-user"></i>
        </a>

        <a href="{{ url('/carts') }}" id="GFG" class="menu icon-style"> 
          <i class="fa-solid fa-cart-plus"></i>
          <span class='badge badge-warning' id='lblCartCount'>1 </span>    
        </a>

        <a href="#" id="GFG" class="menu icon-style">
          <i class="fa-solid fa-heart"></i>
          <span class='badge badge-warning' id='lblCartCount'> 5 </span>
        </a> 

        <a href="#" id="GFG" class="menu icon-style">
          <i class="fa-solid fa-money-bill-1-wave"></i>
        </a>

        <a href="#" id="GFG" class="menu icon-style">
          <i class="fa-solid fa-comment-dots"></i>
          <span class='badge badge-warning' id='lblCartCount'> 5 </span>
        </a>

      </p>
    </div>
  </footer>


  <!-- Scripts -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/animation.js"></script>
  <script src="assets/js/imagesloaded.js"></script>
  <script src="assets/js/popup.js"></script>
  <script src="assets/js/custom.js"></script>
</body>
</html>
{{-- @endsection   --}}

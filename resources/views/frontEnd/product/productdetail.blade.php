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

  .heading1 {
    border-bottom: 1px solid #aaa;
  }

  #imgfile {
    opacity: 1;
    height: 120px;
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
     <link href='https://fonts.googleapis.com/css2?family=Chakra+Petch:ital,wght@0,400;0,500;0,700;1,400&family=Poppins:wght@400;500;700&family=Raleway:ital,wght@0,300;0,400;0,500;1,500&display=swap' rel='stylesheet'>

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
              <li class="scroll-to-section" style="text-align: center;padding-right: 350px;">
                <form>
                <input class="scroll-to-section" type="" name="" style="border: 1px solid #808080;border-top-left-radius:10px;border-bottom-left-radius:10px">
                <button class="" style="height: 28px;position: absolute;width: 15%;border: 1px solid #808080;border-top-right-radius:10px;border-bottom-right-radius:10px ">
                  <i class="fa-solid fa-magnifying-glass"></i>
                  
                </button>
                </form>

              </li>
              <li style="background-color: transparent;right: 20px;border-radius: 20px">
                <a id="modal_trigger" href="#modal">
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

  <div id="" class="about-us" style="margin-bottom: -250px">
    
    <div class="container ">
        <div class="col-lg-12 align-self-center show-up header-text">
            <div class="row">
                <div class="col-lg-3">
                  <div class="box-item topdiv">
                    <h4>
                        <a href="#">
                            <i class="fa-brands fa-shopify"></i>
                            All Category
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
                            <i class="fa-solid fa-store"></i>
                            All Category
                        </a>
                    </h4>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="box-item topdiv">
                    <h4>
                        <a href="#">
                            <i class="fa-solid fa-store"></i>
                            All Category
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
            <h4><a style="color: #424242;" href="#">Top Seeling</a></h4>
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-3">
      <div class="service-item" >
        {{-- <div class="icon"></div> --}}
        <h4 style="font-family: 'Helvetica Neue';">Product Name</h4>
        <img id="imgfile" data-wow-duration="1s" data-wow-delay="0.5s" src="assets/images/DRYER FILTER GENIO R12.JPG" alt="" style="background-color: transparent;opacity: 4;">
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
      <img id="imgfile" src="assets/images/toyotamob.png" alt="">
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
    <img id="imgfile" src="assets/images/toyotamob.png" alt="">
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
    <img id="imgfile" src="assets/images/toyotamob.png" alt="">
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
        <img id="imgfile" data-wow-duration="1s" data-wow-delay="0.5s" src="assets/images/DRYER FILTER GENIO R12.JPG" alt="" style="background-color: transparent;opacity: 4;">
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
      <img id="imgfile" src="assets/images/toyotamob.png" alt="">
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
    <img id="imgfile" src="assets/images/toyotamob.png" alt="">
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
    <img id="imgfile" src="assets/images/toyotamob.png" alt="">
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

  <div id="pricing" class="pricing-tables">
    <div class="container">
      <div class="row">
        
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

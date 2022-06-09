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
      /*height: 90px;*/
      background-color: orange;
      border: 1px;
     border-width: 10px 30px 5px 20px !important;

    }

    .footer-text-left {
          font-size:30px;
          width:100%;
          /*padding-left:40px;*/
          float:center;
          /*word-spacing:50px;*/
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
    }

    #lblCartCount {
        font-size: 12px;
        background: transparent;
        color: black;
        padding-left: -100px;
        vertical-align: top;
        margin-left: 1px; 
        font-weight: bold;
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
  }

</style>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- FOOTER -->

<footer id="footer">
    <div class="footer">
      <p class="footer-text-left">

        <a href="#" id="GFG" class="menu icon-style">
          <i class="fa-solid fa-house-user"></i>
          <!-- <span id="home">Home</span> -->
      </a>

      <a href="{{ url('/carts') }}" id="GFG" class="menu icon-style"> 
          <i class="fa-solid fa-cart-plus"></i>
          <span class='badge badge-warning' id='lblCartCount'> {{\Session::get('countingcart')}} </span>    
          <!-- <span id="cart">Keranjang</span> -->
      </a>

      <a href="#" id="GFG" class="menu icon-style">
          <i class="fa-solid fa-heart" style="color: red"></i>
          <span class='badge badge-warning' id='lblCartCount'> 5 </span>
          <!-- <span id="cart">Wishlist</span> -->
      </a> 

      <a href="#" id="GFG" class="menu icon-style">
          <i class="fa-solid fa-money-bill-1-wave"></i>
          <!-- <span id="cart">Transaction</span> -->
      </a>

      <a href="#" id="GFG" class="menu icon-style">
          <i class="fa-solid fa-comment-dots"></i>
          <span class='badge badge-warning' id='lblCartCount'> 5 </span>

          <!-- <span id="cart">Transaction</span> -->
      </a>

  </p>
</div>
</footer>
    <!-- /FOOTER -->

    <!-- jQuery Plugins -->
    <script src="{{ asset('asset/js/jquery.min.js') }}"></script>

    <script src="{{ asset('asset/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('asset/js/slick.min.js') }}"></script>

    <script src="{{ asset('asset/js/nouislider.min.js') }}"></script>

    <script src="{{ asset('asset/js/jquery.zoom.min.js') }}"></script>

    <script src="{{ asset('asset/js/main.js') }}"></script>

    <script>
        window.onscroll = function() {
            myFunction()
        };

        var widget = document.getElementById('header');
        var sticky = widget.offsetTop;

        function myFunction() {
            if (window.pageYOffset >= sticky) {
                widget.classList.add("sticky")
            } else {
                widget.classList.remove("sticky");
            }
        }
    </script>

    

</body>

</html>
  <footer id="footer">
    <div class="footer">
      <p class="footer-text-left">

        <a href="{{url('/index2')}}" id="GFG" class="menu icon-style" title="home">
          <i class="fa-solid fa-house-user"></i>
        </a>

        <a href="{{ url('/carts') }}" id="GFG" class="menu icon-style" title="keranjang"> 
          <i class="fa-solid fa-cart-plus"></i>
          <span class='badge badge-warning' id='lblCartCount'>{{\Session::get('countingcart')}} </span>    
        </a>

        <a href="{{ url('/wishlists') }}" id="GFG" class="menu icon-style" title="favorite">
          <i class="fa-solid fa-heart"></i>
          <span class='badge badge-warning' id='lblCartCount'> {{\Session::get('wishlist')}} </span>
        </a> 

        <a href="{{url('/transactions')}}" id="GFG" class="menu icon-style" title="pesanan">
          <i class="fa-solid fa-money-bill-1-wave"></i>
        </a>

        <a href="{{url('/offeringprice')}}"  id="GFG" class="menu icon-style" title="message">
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
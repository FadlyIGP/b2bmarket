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
                <input class="scroll-to-section" type="" name="" style="border: 1px solid #808080;border-top-left-radius:20px;border-bottom-left-radius:20px;height: 40px;">
                <button class="" style="position: absolute;width: 10%;border: 1px solid #808080;border-top-right-radius:20px;border-bottom-right-radius:20px;height: 40px ">
                  <i class="fa-solid fa-magnifying-glass"></i>
                  
                </button>
                </form>

              </li>
              <li style="background-color: transparent;right: 20px;border-radius: 20px">
                <a href="{{ route('logout') }}">
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
                <div class="one_half last"><a href="{{ url('/logout') }}" id="register_form" class="btn">Sign Out</a></div>
            </div>
        </div>
    </div>
</div>
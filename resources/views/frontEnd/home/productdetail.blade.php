@extends('frontEnd.weblayouts.app')

@section('content')

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.mySlides {display:none;}
</style>

<body>
 
<div id="services about-us" class="services section show-up header-text">
  <div class="container">
   <div class="about-us" style="padding-bottom: 15px;margin-top: -150px;">
       <div class="col-lg-4">
          <div class="div">
            <h4><a style="color: #424242;font-family: 'Helvetica Neue';" href="#">Product Detail</a></h4>
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="row">
        <div class="col-lg-6">

            <div class="w3-content w3-display-container">
              <img id="imgfiledetail" class="mySlides" src="{{ asset('assets/images/toyotamob.png') }}" style="width:100%">
              <img id="imgfiledetail" class="mySlides" src="{{ asset('assets/images/DRYER FILTER GENIO R12.JPG') }}" style="width:100%">
              <img id="imgfiledetail" class="mySlides" src="{{ asset('assets/images/DRYER FILTER HONDA STREAM.JPG') }}" style="width:100%">
              <img id="imgfiledetail" class="mySlides" src="{{ asset('assets/images/slider-dec.PNG') }}" style="width:100%">
              <button class="w3-button w3-display-left" style="background-color: transparent;color: black" onclick="plusDivs(-1)">&#10094;</button>
              <button class="w3-button w3-display-right" style="background-color: transparent;color: black" onclick="plusDivs(1)">&#10095;</button>
          </div>
      </div>
                
      <div class="col-lg-6">
          <div class="service-item" >
            <h4 style="font-family: 'Helvetica Neue';">Nama Toko/ Nama Product</h4>
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

            <div class="" id="descriptions" >
                <span style="font-size: 12px;">
                    <b>Arsy Sport / Celana Pendek Pria / Celana Pria / Celana Murah / Celana Training / Celana Olahraga</b>
                </span>
            </div>

            <div class="heading1"></div>


            <div class="" style="padding-top: 20px">
                <center>
                    <a href="#">
                        <i class="fa-solid fa-cart-arrow-down" style="color: #808080;padding-right: 15px;font-size: 20px"></i>
                    </a>
                    <a href="#">
                        <i class="fa-solid fa-heart" style="color: #808080;padding-right: 15px;font-size: 20px"></i>
                    </a>

                     <a href="#">
                        {{-- <i class="fa-solid fa-message" style="color: #808080;padding-right: 15px;font-size: 20px"> --}}
                            Ajukan Pertanyaan
                        {{-- </i> --}}

                    </a>
               </center>
            </div>
        </div>
    </div>
                            
    </div>

  </div>

  <!-- Scripts -->
  <script>
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
      showDivs(slideIndex += n);
  }

  function showDivs(n) {
      var i;
      var x = document.getElementsByClassName("mySlides");
      if (n > x.length) {slideIndex = 1}
          if (n < 1) {slideIndex = x.length}
              for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";  
            }
            x[slideIndex-1].style.display = "block";  
        }
    </script>

</body>
</html>
@endsection  

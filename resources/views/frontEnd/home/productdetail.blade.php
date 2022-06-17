@extends('frontEnd.weblayouts.app')

@section('content')

<div id="services about-us" class="services section ">
  <div class="container">
   <div class="about-us show-up header-text" style="padding-bottom: 15px;margin-top: -150px;">
       <div class="col-lg-12">
            <h4>
                <a style="color: #424242;font-family: 'Helvetica Neue';" href="#">
                <i class="fa-solid fa-store"></i>
                {{$productdetail['company_name']}}</a>
            </h4>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="row">
        <div class="col-lg-6">

            <div class="w3-content w3-display-container">
                
                @foreach($productimage as $list)
                   <img id="imgfiledetail" class="mySlides" src="{{ url('/files/'.$list['img_file']) }}" style="width:100%">
                @endforeach

              <button class="w3-button w3-display-left" style="background-color: transparent;color: black" onclick="plusDivs(-1)">&#10094;</button>
              <button class="w3-button w3-display-right" style="background-color: transparent;color: black" onclick="plusDivs(1)">&#10095;</button>
          </div>
      </div>
                
      <div class="col-lg-6">
          <div class="service-item" >
            <h4 style="font-family: 'Helvetica Neue';">{{$productdetail['product_name']}}</h4>
            <div class="heading1"></div>
            <div class="" id="test">
                <span style="font-size: 12px;"><b>IDR {{$productdetail['product_price']}}</b></span>
            </div>
            <div class="" id="test">
                <span style="font-size: 12px;"><b>Min Order {{$productdetail['minimum_order']}} Pcs</b></span>
            </div>
            <div class="" id="test" style="padding-bottom: 25px">
                <span style="font-size: 12px;"><b>Terjual {{$productdetail['pay_counting']}}</b></span>
            </div>
            <div class="" id="test" style="padding-bottom: 25px">
                <span style="font-size: 12px;"><b>Size {{$productdetail['product_size']}}</b></span>
            </div>

            <div class="heading1"></div>

            <div class="" id="descriptions" >
                <span style="font-size: 12px;">
                    {{$productdetail['product_descriptions']}}
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

@endsection  

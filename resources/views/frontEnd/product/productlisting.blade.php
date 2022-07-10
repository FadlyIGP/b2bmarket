@extends('frontEnd.weblayouts.app')
@section('content')
@include('sweetalert::alert')
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
<!-- ***** Body ***** -->
<style type="text/css">
    .buttonaddress {
        display: block;
        width: 20%;
        height: 30px;
        border: none;
        background-color: #FF4500;
        color: white;
        /*padding: 14px 28px;*/
        border-radius: 10px;
        font-size: 16px;
        cursor: pointer;
        text-align: center;
    }


    .previous:hover {
          background-color: #ddd;
          color: black;
    }
    .next:hover {
      background-color: #ddd;
      color: black;
    }

    .previous {
          background-color: #f1f1f1;
          color: black;
          text-align:center;
          text-decoration: none;
          display: inline-block;
          border-radius: 12px;
          width:100px;
          padding: 8px 16px;
    }

    .next {
          background-color: #04AA6D;
          color: white;
           text-align:center;
          text-decoration: none;
          display: inline-block;
          border-radius: 12px;
          width:100px;
          padding: 8px 16px;
    }

</style>
<div id="" class="about-us" style="margin-bottom: -250px">
    <div class="container ">
        <div class="col-lg-12 align-self-center show-up header-text">
            <div class="row">
                <div style="overflow-x:auto;">
                    {{-- <table class="table" width="100%">
                        <tr>
                            <td width="25%" style="font-size: 12px">
                                <a href="#" style="color: black">
                                    Semua Kategori
                                </a>

                            </td>
                            <td width="25%" style="font-size: 12px">
                                <a href="#" style="color: black">
                                    Semua Kategori
                                </a>

                            </td>
                            <td width="25%" style="font-size: 12px">
                                <a href="#" style="color: black">
                                    Semua Kategori
                                </a>

                            </td>
                            <td width="25%" style="font-size: 12px;color: black">
                                <a href="#" style="color: black">
                                    Semua Kategori
                                </a>

                            </td>
                        </tr>
                    </table> --}}
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
                    <h4><a style="color: #424242;" href="#">Product List</a></h4>
                </div>
                <div class="heading1"></div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="row">
                @foreach($response['data'] as $list)
                <div class="col-lg-3" style="margin-top: 12px">
                    <div class="service-item">
                        <h4 style="text-transform: uppercase; font-family: 'Roboto'; font-weight: 400; font-size: 15px">{{ $list['product_name'] }}</h4>
                        <img class="zoom" id="imgfile" data-wow-duration="1s" data-wow-delay="0.5s" src="{{ url('/files/'.$list['image']) }}" alt="" style="background-color: transparent;opacity: 4;">
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
                        <div style="display: flex;">
                            <div class="" id="test">
                                <span style="color: #ed2114; font-size: 12px;"><b> {{ $list['product_price'] }}</b></span>
                            </div>
                            <div class="" id="test">
                                <span style="float: right; text-decoration: line-through black; font-size: 10px;"><b>Old {{ $list['product_price'] }}</b></span>
                            </div>
                        </div>
                        <div style="display: flex;">
                            <div class="" id="test">
                                <span style="font-size: 12px;"><b>Min Order {{ $list['min_order'] }} Pcs</b></span>
                            </div>
                            <div class="" id="test" style="padding-bottom: 25px">
                                <span style="float: right; color: #636363; font-size: 12px;"><b>Terjual {{ $list['pay_counting'] }} </b></span>
                            </div>
                        </div>

                        <div class="heading1"></div>

                        <div class="" style="padding-top: 25px">
                            <center>

                                <table>
                                    <tr>
                                        <td>
                                            {!! Form::open(['url'=>url('/carts'),'method'=>'POST', 'files'=>'true', 'class'=>'', 'autocomplete'=>'off','style'=>'background-color:transparent']) !!}
                                            <input type="hidden" class="form-control  has-feedback  " value="{{$list['id']}}" id="product_id" name="product_id" required>
                                            <button type="submit" style="background-color: transparent;border-color: transparent;">
                                                <i class="fa-solid fa-cart-arrow-down menu" style="color: #808080;padding-right: 15px;font-size: 20px"></i>
                                            </button>
                                            {!! Form::close() !!}
                                        </td>

                                        <td>
                                            @if($list['wishlist_status']==true)
                                            <a href="#">
                                                <i class="fa-solid fa-heart" style="color:red;padding-right: 15px;font-size: 20px"></i>
                                            </a>
                                            @else()
                                            {!! Form::open(['url'=>url('/wishlists'),'method'=>'POST', 'files'=>'true', 'class'=>'', 'autocomplete'=>'off','style'=>'background-color:transparent']) !!}
                                            <input type="hidden" class="form-control  has-feedback " value="{{$list['id']}}" id="product_id" name="product_id" required>
                                            <button type="submit" style="background-color: transparent;border-color: transparent;">
                                                <i class="fa-solid fa-heart" style="color: #808080;padding-right: 15px;font-size: 20px"></i>
                                            </button>
                                            {!! Form::close() !!}
                                            @endif()

                                        </td>

                                        <td>
                                            <a href="{{ url('/infoproducts',$list['id']) }}">
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
            </div>
        </div>
        <div class="col-lg-12" style="padding-top: 5px;padding-right: 5px;padding-left: 5px">
            @if($response['is_last_page']==false)
            <a onclick="prev();" class="previous">&laquo; Previous</a>
               &nbsp;
            <a onclick="func();" class="next">Next &raquo;</a>

            @else()

            <a onclick="prev();" class="previous">&laquo; Previous</a>
               &nbsp;
            <a onclick="" class="next">Next &raquo;</a>

            
            @endif

        </div>

    </div>
</div>




</div>

</div>

<!-- Scripts -->
<script>

    function func(){    
        var next  = {{$response['page']}}+1;
        window.location.href = "/infoproducts?page=" + next;
    }

    function prev(){    
        var previous  = {{$response['page']}}-1;
        window.location.href = "/infoproducts?page=" + previous;
    }


</script>

@endsection

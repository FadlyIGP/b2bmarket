@extends('frontEnd.weblayouts.app')

@section('content')
<style type="text/css">
    body {font-family: Arial;}

    /* Style the tab */
          
       /* Style the buttons inside the tab */
  .tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
  }

  /* Change background color of buttons on hover */
  .tab button:hover {
    background-color: #ddd;
    border-radius: 10px;

  }

  /* Create an active/current tablink class */
  .tab button.active {
    background-color: #FF0000;
    border-radius: 10px;
    color: white;
  }

  /* Style the tab content */
  .tabcontent {
    display: none;
    padding: 6px 12px;
    /*border: 1px solid #ccc;*/
    border-top: none;
  }

        .line {
          border-bottom: 1px solid #aaa;
          width: 100%
        }

        .tables {
          border-collapse: collapse;
          border-spacing: 0;
          width: 100%;
          /*max-width: 1000px;*/
          border: 1px solid #ddd;
        }

        th, td {
          text-align: left;
          padding: 10px;
          font-size: 10px;
        }

        tr:nth-child(even){background-color: #f2f2f2}

      .buttonaddress {
          display: block;
          width: 100%;
          height: 30px;
          border: none;
          background-color: #FF4500;
          color: white;
          /*padding: 14px 28px;*/
          border-radius: 10px;
          font-size: 10px;
          cursor: pointer;
          text-align: center;
      }
</style>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


<div id="" class="services section ">
    <div class="container">
        <div class="about-us show-up header-text" style="padding-bottom: 15px;margin-top: -150px;">

        </div>
        <div class="row">
            <div class="col-lg-12" >
              <div class="row">
                <div class="col-lg-12" style="padding-bottom: 20px;">

                    <div class="col-md-12" style="border-radius: 10px;border: 1px solid #969696;padding-bottom: 70px;margin-top: 10px">
                        <div style="padding-bottom: 20px;padding-left: 10px;padding-top: 10px;">
                            <div style="overflow-x:auto;">
                                <div class="tab">
                                    <button id="London-tab" class="tablinks" onclick="openCity(event, 'London')">All Orders</button>
                                    <button id="tab2-tab" class="tablinks" onclick="openCity(event, 'tab2')">Waiting Payments</button>
                                    <button id="tab3-tab" class="tablinks" onclick="openCity(event, 'tab3')">In Process</button>
                                    <button id="tab4-tab" class="tablinks" onclick="openCity(event, 'tab4')">On Delivery</button>
                                    <button id="tab5-tab" class="tablinks" onclick="openCity(event, 'tab5')">Finish</button>
                                    <button id="tab6-tab" class="tablinks" onclick="openCity(event, 'tab6')">Cancel Order</button>
                                </div>
                            </div>
                            <div class="line"></div>
                        </div>
                        <div class="container">
                         <div class="tab-content" style="width: 100%">
                            <div class="tabcontent" id="London" data-tab-info>
                                @if(empty($listpesanan))
                                <div class="row" style="font-size: 13px">
                                    <div class="col-lg-12 test"  style="overflow-x:auto;padding-top: 30px;padding-bottom: 50px">
                                        <center>
                                            <div style="padding-bottom: 20px">
                                                <span>Belum Ada Pesanan</span>
                                            </div>

                                             <div>
                                                {!! Form::open(['url'=>url('/index2'),'method'=>'GET', 'files'=>'true', 'class'=>'form-horizontal', 'autocomplete'=>'off','style'=>'margin-top:0px']) !!}
                                                    <button style="background-color: transparent;border-color: #FF4500;border-radius: 10px" type="submit">
                                                        <span style="font-family: 'Helvetica Neue';color: #FF4500;font-size: 12px">
                                                                <b>
                                                                    Lanjutkan Belanja
                                                                </b>
                                                        </span>
                                                    </button>
                                                {!! Form::close() !!}
                                            </div>
                                        </center>
                                      
                                    </div>
                                </div>

                                @else()

                                @foreach($listpesanan as $list)
                                <div style="overflow-x:auto;">
                                    <table class="tables" border="1">
                                        <tr style="">
                                            <td style="width: 10%">
                                                <left>
                                                    <img src="{{ url('/files/'.$list['product_image']) }}" alt="defaultlogo" border="0" style="width: 60px;" />
                                                </left>
                                            </td>

                                            <td style="width: 20%;size: 12px;" >
                                                <left>
                                                  {{$list['product_name']}}
                                              </left>
                                            </td>

                                            <td style="width: 25%">
                                              {{$list['expected_ammount']}}
                                            </td>

                                            <td style="width: 20%">
                                              {{$list['status']}}
                                            </td>
                                            <td style="width: 10%">
                                             {!! Form::open(['url'=>url('/transactions',$list['transaction_id']),'method'=>'GET', 'files'=>'true', 'class'=>'form-horizontal', 'autocomplete'=>'off','style'=>'margin-top:0px']) !!}
                                                 <button class="buttonaddress" id="modal1" data-toggle="modal" data-id="{{ $list['transaction_id'] }}" title="View Detail">
                                                    <span style="font-family: 'Helvetica Neue';color: white">
                                                        <b>
                                                            Detail
                                                        </b>
                                                    </span>
                                                </button>
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                       
                                    </table>
                                </div>
                                @endforeach()
                                @endif()
                            </div>
                            <div id="tab2" class="tabcontent" data-tab-info>
                                @if(empty($menunggupembayaran))
                                <div class="row" style="font-size: 13px">
                                    <div class="col-lg-12 test"  style="overflow-x:auto;padding-top: 30px;padding-bottom: 50px">
                                        <center>
                                            <div style="padding-bottom: 20px">
                                                <span>Belum Ada Pesanan</span>
                                            </div>

                                             <div>
                                                {!! Form::open(['url'=>url('/index2'),'method'=>'GET', 'files'=>'true', 'class'=>'form-horizontal', 'autocomplete'=>'off','style'=>'margin-top:0px']) !!}
                                                    <button style="background-color: transparent;border-color: #FF4500;border-radius: 10px" type="submit">
                                                        <span style="font-family: 'Helvetica Neue';color: #FF4500;font-size: 12px">
                                                                <b>
                                                                    Lanjutkan Belanja
                                                                </b>
                                                        </span>
                                                    </button>
                                                {!! Form::close() !!}
                                            </div>
                                        </center>
                                      
                                    </div>
                                </div>

                                @else()

                                @foreach($menunggupembayaran as $list)
                              <div style="overflow-x:auto;">
                                    <table class="tables" border="1">
                                        <tr style="">
                                            <td style="width: 10%">
                                                <left>
                                                    <img src="{{ url('/files/'.$list['product_image']) }}" alt="defaultlogo" border="0" style="width: 60px;" />
                                                </left>
                                            </td>

                                            <td style="width: 20%;size: 12px;" >
                                                <left>
                                                  {{$list['product_name']}}
                                              </left>
                                            </td>

                                            <td style="width: 25%">
                                              {{$list['expected_ammount']}}
                                            </td>

                                            <td style="width: 20%">
                                              {{$list['status']}}
                                            </td>
                                            <td style="width: 10%">
                                             {!! Form::open(['url'=>url('/transactions',$list['transaction_id']),'method'=>'GET', 'files'=>'true', 'class'=>'form-horizontal', 'autocomplete'=>'off','style'=>'margin-top:0px']) !!}
                                                 <button class="buttonaddress" id="modal1" data-toggle="modal" data-id="{{ $list['transaction_id'] }}" title="View Detail">
                                                    <span style="font-family: 'Helvetica Neue';color: white">
                                                        <b>
                                                            Detail
                                                        </b>
                                                    </span>
                                                </button>
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                       
                                    </table>
                                </div>
                                @endforeach()
                                @endif()

                            </div>
                            <div id="tab3" class="tabcontent" data-tab-info>
                               @if(empty($diprosespenjual))
                                <div class="row" style="font-size: 13px">
                                    <div class="col-lg-12 test"  style="overflow-x:auto;padding-top: 30px;padding-bottom: 50px">
                                        <center>
                                            <div style="padding-bottom: 20px">
                                                <span>Belum Ada Pesanan</span>
                                            </div>

                                             <div>
                                                {!! Form::open(['url'=>url('/index2'),'method'=>'GET', 'files'=>'true', 'class'=>'form-horizontal', 'autocomplete'=>'off','style'=>'margin-top:0px']) !!}
                                                    <button style="background-color: transparent;border-color: #FF4500;border-radius: 10px" type="submit">
                                                        <span style="font-family: 'Helvetica Neue';color: #FF4500;font-size: 12px">
                                                                <b>
                                                                    Lanjutkan Belanja
                                                                </b>
                                                        </span>
                                                    </button>
                                                {!! Form::close() !!}
                                            </div>
                                        </center>
                                      
                                    </div>
                                </div>

                                @else()

                                @foreach($diprosespenjual as $list)
                                <div style="overflow-x:auto;">
                                    <table class="tables" border="1">
                                        <tr style="">
                                            <td style="width: 10%">
                                                <left>
                                                    <img src="{{ url('/files/'.$list['product_image']) }}" alt="defaultlogo" border="0" style="width: 60px;" />
                                                </left>
                                            </td>

                                            <td style="width: 20%;size: 12px;" >
                                                <left>
                                                  {{$list['product_name']}}
                                              </left>
                                            </td>

                                            <td style="width: 25%">
                                              {{$list['expected_ammount']}}
                                            </td>

                                            <td style="width: 20%">
                                              {{$list['status']}}
                                            </td>
                                            <td style="width: 10%">
                                             {!! Form::open(['url'=>url('/transactions',$list['transaction_id']),'method'=>'GET', 'files'=>'true', 'class'=>'form-horizontal', 'autocomplete'=>'off','style'=>'margin-top:0px']) !!}
                                                 <button class="buttonaddress" id="modal1" data-toggle="modal" data-id="{{ $list['transaction_id'] }}" title="View Detail">
                                                    <span style="font-family: 'Helvetica Neue';color: white">
                                                        <b>
                                                            Detail
                                                        </b>
                                                    </span>
                                                </button>
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                       
                                    </table>
                                </div>
                                @endforeach()
                                @endif()

                            </div>
                            <div id="tab4" class="tabcontent" data-tab-info>
                               @if(empty($sedangdikirim))
                                <div class="row" style="font-size: 13px">
                                    <div class="col-lg-12 test"  style="overflow-x:auto;padding-top: 30px;padding-bottom: 50px">
                                        <center>
                                            <div style="padding-bottom: 20px">
                                                <span>Belum Ada Pesanan</span>
                                            </div>

                                             <div>
                                                {!! Form::open(['url'=>url('/index2'),'method'=>'GET', 'files'=>'true', 'class'=>'form-horizontal', 'autocomplete'=>'off','style'=>'margin-top:0px']) !!}
                                                    <button style="background-color: transparent;border-color: #FF4500;border-radius: 10px" type="submit">
                                                        <span style="font-family: 'Helvetica Neue';color: #FF4500;font-size: 12px">
                                                                <b>
                                                                    Lanjutkan Belanja
                                                                </b>
                                                        </span>
                                                    </button>
                                                {!! Form::close() !!}
                                            </div>
                                        </center>
                                      
                                    </div>
                                </div>

                                @else()

                                @foreach($sedangdikirim as $list)
                                <div style="overflow-x:auto;">
                                    <table class="tables" border="1">
                                        <tr style="">
                                            <td style="width: 10%">
                                                <left>
                                                    <img src="{{ url('/files/'.$list['product_image']) }}" alt="defaultlogo" border="0" style="width: 60px;" />
                                                </left>
                                            </td>

                                            <td style="width: 20%;size: 12px;" >
                                                <left>
                                                  {{$list['product_name']}}
                                              </left>
                                            </td>

                                            <td style="width: 25%">
                                              {{$list['expected_ammount']}}
                                            </td>

                                            <td style="width: 20%">
                                              {{$list['status']}}
                                            </td>
                                            <td style="width: 10%">
                                             {!! Form::open(['url'=>url('/transactions',$list['transaction_id']),'method'=>'GET', 'files'=>'true', 'class'=>'form-horizontal', 'autocomplete'=>'off','style'=>'margin-top:0px']) !!}
                                                 <button class="buttonaddress" id="modal1" data-toggle="modal" data-id="{{ $list['transaction_id'] }}" title="View Detail">
                                                    <span style="font-family: 'Helvetica Neue';color: white">
                                                        <b>
                                                            Detail
                                                        </b>
                                                    </span>
                                                </button>
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                       
                                    </table>
                                </div>
                                @endforeach()
                                @endif()

                            </div>
                            <div id="tab5" class="tabcontent" data-tab-info>
                               @if(empty($dikirim))
                                <div class="row" style="font-size: 13px">
                                    <div class="col-lg-12 test"  style="overflow-x:auto;padding-top: 30px;padding-bottom: 50px">
                                        <center>
                                            <div style="padding-bottom: 20px">
                                                <span>Belum Ada Pesanan</span>
                                            </div>

                                             <div>
                                                {!! Form::open(['url'=>url('/index2'),'method'=>'GET', 'files'=>'true', 'class'=>'form-horizontal', 'autocomplete'=>'off','style'=>'margin-top:0px']) !!}
                                                    <button style="background-color: transparent;border-color: #FF4500;border-radius: 10px" type="submit">
                                                        <span style="font-family: 'Helvetica Neue';color: #FF4500;font-size: 12px">
                                                                <b>
                                                                    Lanjutkan Belanja
                                                                </b>
                                                        </span>
                                                    </button>
                                                {!! Form::close() !!}
                                            </div>
                                        </center>
                                      
                                    </div>
                                </div>

                                @else()

                                @foreach($dikirim as $list)
                                <div style="overflow-x:auto;">
                                    <table class="tables" border="1">
                                        <tr style="">
                                            <td style="width: 10%">
                                                <left>
                                                    <img src="{{ url('/files/'.$list['product_image']) }}" alt="defaultlogo" border="0" style="width: 60px;" />
                                                </left>
                                            </td>

                                            <td style="width: 20%;size: 12px;" >
                                                <left>
                                                  {{$list['product_name']}}
                                              </left>
                                            </td>

                                            <td style="width: 25%">
                                              {{$list['expected_ammount']}}
                                            </td>

                                            <td style="width: 20%">
                                              {{$list['status']}}
                                            </td>
                                            <td style="width: 10%">
                                             {!! Form::open(['url'=>url('/transactions',$list['transaction_id']),'method'=>'GET', 'files'=>'true', 'class'=>'form-horizontal', 'autocomplete'=>'off','style'=>'margin-top:0px']) !!}
                                                 <button class="buttonaddress" id="modal1" data-toggle="modal" data-id="{{ $list['transaction_id'] }}" title="View Detail">
                                                    <span style="font-family: 'Helvetica Neue';color: white">
                                                        <b>
                                                            Detail
                                                        </b>
                                                    </span>
                                                </button>
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                       
                                    </table>
                                </div>
                                @endforeach()


                                
                                @endif()

                            </div>
                            <div id="tab6" class="tabcontent" data-tab-info>
                               @if(empty($dibatalkan))
                                <div class="row" style="font-size: 13px">
                                    <div class="col-lg-12 test"  style="overflow-x:auto;padding-top: 30px;padding-bottom: 50px">
                                        <center>
                                            <div style="padding-bottom: 20px">
                                                <span>Belum Ada Pesanan</span>
                                            </div>

                                             <div>
                                                {!! Form::open(['url'=>url('/index2'),'method'=>'GET', 'files'=>'true', 'class'=>'form-horizontal', 'autocomplete'=>'off','style'=>'margin-top:0px']) !!}
                                                    <button style="background-color: transparent;border-color: #FF4500;border-radius: 10px" type="submit">
                                                        <span style="font-family: 'Helvetica Neue';color: #FF4500;font-size: 12px">
                                                                <b>
                                                                    Lanjutkan Belanja
                                                                </b>
                                                        </span>
                                                    </button>
                                                {!! Form::close() !!}
                                            </div>
                                        </center>
                                      
                                    </div>
                                </div>

                                @else()

                                @foreach($dibatalkan as $list)
                                <div style="overflow-x:auto;">
                                    <table class="tables" border="1">
                                        <tr style="">
                                            <td style="width: 10%">
                                                <left>
                                                    <img src="{{ url('/files/'.$list['product_image']) }}" alt="defaultlogo" border="0" style="width: 60px;" />
                                                </left>
                                            </td>

                                            <td style="width: 20%;size: 12px;" >
                                                <left>
                                                  {{$list['product_name']}}
                                              </left>
                                            </td>

                                            <td style="width: 25%">
                                              {{$list['expected_ammount']}}
                                            </td>

                                            <td style="width: 20%">
                                              {{$list['status']}}
                                            </td>
                                            <td style="width: 10%">
                                             {!! Form::open(['url'=>url('/transactions',$list['transaction_id']),'method'=>'GET', 'files'=>'true', 'class'=>'form-horizontal', 'autocomplete'=>'off','style'=>'margin-top:0px']) !!}
                                                 <button class="buttonaddress" id="modal1" data-toggle="modal" data-id="{{ $list['transaction_id'] }}" title="View Detail">
                                                    <span style="font-family: 'Helvetica Neue';color: white">
                                                        <b>
                                                            Detail
                                                        </b>
                                                    </span>
                                                </button>
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                       
                                    </table>
                                </div>
                                @endforeach()                                
                                @endif()

                            </div>
                        </div>

                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('sweetalert::alert')

<!-- Modal Transaction Item -->
<div class="modal fade" id="detailItem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="border-radius: 20px">
    <div class="modal-dialog" role="document" style="border-radius: 20px">
        <div class="modal-content">
            <div class="modal-header">   
                <span class="modal-title" style="color:;font-family: 'Helvetica Neue'"> 
                   <img src="{{ asset('assets/images/online-shopping.png') }}" alt="Back to homepage" routerlink="main" class="responsive" tabindex="0" ng-reflect-router-link="main" style="width: 10%;"> 
                    Items
                </span>                    
            </div>
            <div class="modal-body" id="body-item">
                <!--Include showitem.blade.php here -->
            </div>              
            <div class="modal-footer"> 
                <a class="btn btn-default buttonaddress" data-dismiss="modal" aria-label="Close" style="border-radius: 5px;width:80px;background-color:#FF0000;color: white">
                    Close
                </a>
            </div> 
        </div>
    </div>
</div>

<!-- Scripts -->

<script>

     function openCity(evt, cityName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].classList.remove("active");
      }
      document.getElementById(cityName).style.display = "block";
      document.getElementById(cityName + "-tab").classList.add("active");
      // evt.currentTarget.className += " active";
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("London-tab").click();




    $('tbody').on('click','#modal1', function(e){
        e.preventDefault();

        const id = $(this).attr('data-id');
        $.ajax({
            url: 'transactions/' + id,                     
            dataType: 'html',
            success: function(response){
                $('#body-item').html(response);
            }
        });

        $('#detailItem').modal('show');

    });
</script>

@endsection  

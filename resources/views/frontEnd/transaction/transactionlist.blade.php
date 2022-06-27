@extends('frontEnd.weblayouts.app')

@section('content')
<style type="text/css">
    body {font-family: Arial;}

    /* Style the tab */
          
        [data-tab-info] {
            display: none;
        }
          
        .active[data-tab-info] {
            display: block;
        }
          
        .tab-content {
            font-size: 30px;
            font-family: sans-serif;
            font-weight: bold;
            color: rgb(82, 75, 75);
            width: 50%;
            width: 1000px;
        }
          
        .tabs {
            font-size: 12px;
            color: black;
            display: flex;
            margin: 0;
        }
          
        .tabs span {
            /*background: rgb(28, 145, 38);*/
            padding: 10px;
            /*border: 1px solid rgb(255, 255, 255);*/
            width: 20%;

        }
          
        .tabs span:hover {
            /*background: #FF4500 ;*/
            cursor: pointer;
            color: #FF4500;
            font-size: 12px;
            /*border-radius: 10px*/
            border-bottom: 1px solid #FF4500;
        }

        .tab button.active {
          background-color: #ccc;
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

                    <div class="col-md-12" style="border-radius: 10px;border: 1px solid #969696;padding-bottom: 20px;margin-top: 10px">
                        <div style="padding-bottom: 20px;padding-left: 10px;padding-top: 10px;">
                            <div style="overflow-x:auto;">
                            <div class="tabs">
                                <table style="width: 100%">
                                    <tr>
                                        <td>
                                            <span data-tab-value="#tab_1" style="">Semua</span>
                                        </td>
                                        <td>
                                            <span data-tab-value="#tab_2">Menunggu Pembayaran</span>
                                        </td>
                                        <td>
                                            <span data-tab-value="#tab_3">Diproses Penjual</span>
                                        </td>
                                        <td>
                                            <span data-tab-value="#tab_4">Sedang Dikirim</span>
                                        </td>
                                        <td>
                                            <span data-tab-value="#tab_5">Diterima</span>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            </div>
                            <div class="line"></div>
                        </div>
                        <div class="container">
                         <div class="tab-content" style="width: 100%">
                            <div class=" active" id="tab_1" data-tab-info>
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
                            <div class="" id="tab_2" data-tab-info>
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
                            <div class="" id="tab_3" data-tab-info>
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
                            <div class="" id="tab_4" data-tab-info>
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
                            <div class="" id="tab_5" data-tab-info>
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
<div class="modal fade" id="detailItem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="border-radius: 15px">
        <div class="modal-content">
            <div class="modal-header" style="background-color: ">   
                <span class="modal-title" style="color:;font-family: 'Helvetica Neue'"> 
                   <img src="{{ asset('assets/images/online-shopping.png') }}" alt="Back to homepage" routerlink="main" class="responsive" tabindex="0" ng-reflect-router-link="main" style="width: 10%;"> 
                    Items
                </span>    
            </div>
            <div class="modal-body" id="body-item">
                <!--Include showitem.blade.php here -->
            </div>              
            <div class="modal-footer"> 

                <a class="btn btn-default buttonaddress" id="hide" data-dismiss="modal" aria-label="Close" style="border-radius: 5px;width:80px;background-color:#FF0000;color: white">
                    Close
                </a>
            </div> 
        </div>
    </div>
</div>

<!-- Scripts -->

<script>
    const tabs = document.querySelectorAll('[data-tab-value]')
    const tabInfos = document.querySelectorAll('[data-tab-info]')

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            const target = document
            .querySelector(tab.dataset.tabValue);

            tabInfos.forEach(tabInfo => {
                tabInfo.classList.remove('active')
            })
            target.classList.add('active');
        })
    })


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

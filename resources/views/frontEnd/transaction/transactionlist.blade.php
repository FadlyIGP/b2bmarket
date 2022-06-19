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
            background: #FF4500 ;
            cursor: pointer;
            color: white;
            font-size: 15px;
            border-radius: 10px
        }

        .line {
          border-bottom: 1px solid #aaa;
          width: 100%
        }
        table{
            font-size: 12px;
        }
        table {
          border-collapse: collapse;
          border-spacing: 0;
          width: 100%;
          border: 1px solid #ddd;
      }

      th, td {
          text-align: left;
          padding: 8px;
      }

      tr:nth-child(even){background-color: #f2f2f2}
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
                               <div class="tabs">
                                <span data-tab-value="#tab_1" style="">Semua</span>
                                <span data-tab-value="#tab_2">Menunggu Pembayaran</span>
                                <span data-tab-value="#tab_3">Diproses Penjual</span>
                                <span data-tab-value="#tab_4">Sedang Dikirim</span>
                                <span data-tab-value="#tab_5">Diterima</span>


                            </div>
                            <div class="line"></div>
                        </div>
                        <div class="container">
                         <div class="tab-content">
                            <div class="tabs__tab active" id="tab_1" data-tab-info>
                                <div class="row" style="">
                                    <div class="col-lg-12 test"  style="overflow-x:auto;">
                                        <table class="" width="">
                                            <tbody>
                                                <tr>
                                                    <td width="10%">
                                                        <img src="https://i.ibb.co/6NNbp7K/store.png" alt="defaultlogo" border="0" style="width: 50px;height: 50px" />

                                                    </td>
                                                    <td width="20%">
                                                       Nama Product
                                                    </td>
                                                    <td width="20%">
                                                       Rp. 500.000
                                                    </td>

                                                    <td width="20%">
                                                       Rp. 500.000
                                                    </td>
                                                    <td width="20%">
                                                       Rp. 500.000
                                                    </td>
                                                    <td width="20%">
                                                       Rp. 500.000
                                                    </td>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                            <div class="tabs__tab" id="tab_2" data-tab-info>
                                <p>Hello Everyone.</p>

                            </div>
                            <div class="tabs__tab" id="tab_3" data-tab-info>
                                <p>Learn cool stuff.</p>

                            </div>
                            <div class="tabs__tab" id="tab_4" data-tab-info>
                                <p>Learn cool stuff.</p>

                            </div>
                            <div class="tabs__tab" id="tab_5" data-tab-info>
                                <p>Learn cool terim.</p>

                            </div>
                        </div>

                        </div>
                       
                    </div>
                </div>
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
</script>

@endsection  

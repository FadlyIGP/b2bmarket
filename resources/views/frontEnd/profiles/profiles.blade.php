@extends('frontEnd.weblayouts.app')
@section('content')
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
{{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> --}}
<style type="text/css">
    /* Style the tab */
    .tab {
      overflow: hidden;
      /*border: 1px solid #ccc;*/
      /*background-color: #f1f1f1;*/
  }

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
</style>
<div id="" class="about-us show-up header-text" style="margin-bottom: -250px">
	<div class="container ">
        <div class="row">
            <div class="col-lg-12" >
                <div class="row">
                    <div class="col-lg-4" style="padding-bottom: 20px;">
                        <div style="border: 1px solid #969696;border-radius: 10px;">
                            <h4 style="font-family: 'Helvetica Neue';">
                                <img src="https://i.ibb.co/5sFK9qT/location.png" alt="location" border="0" style="width: 30px" />
                                Alamat
                            </h4>
                            <div class="heading1"></div>
                            <div style="height: 100px;padding-right: 10px;padding-left: 10px;" >
                                <table width="100%" class="" style="margin-top: 10px">
                                    <tr style="height:2px">
                                        <td width="20%" style="font-size: 12px">Qty</td>
                                        <td width="50%" style="font-size: 12px">Product</td>
                                        <td width="30%" style="font-size: 12px">Total</td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-8" style="padding-bottom: 20px;">
                        <div style="border: 1px solid #969696;border-radius: 10px;">
                            <div class="tab">
                              <button id="London-tab" class="tablinks" onclick="openCity(event, 'London')">Address</button>
                              <button id="Paris-tab" class="tablinks" onclick="openCity(event, 'Paris')">Change Password</button>
                              <button id="Tokyo-tab" class="tablinks" onclick="openCity(event, 'Tokyo')">User Setup</button>
                            </div>
                            <div class="heading1"></div>
                                  <div id="London" class="tabcontent">
                                      <h3>London</h3>
                                      <p>London is the capital city of England.</p>
                                      <button class="new-btn" onclick="openCity(event, 'Tokyo')">Click Me</button>
                                  </div>

                                  <div id="Paris" class="tabcontent">
                                      <h3>Paris</h3>
                                      <p>Paris is the capital of France.</p>
                                  </div>

                                  <div id="Tokyo" class="tabcontent">
                                      <h3>Tokyo</h3>
                                      <p>Tokyo is the capital of Japan.</p>
                                  </div>
                        </div>

                    </div>


                </div>
            </div>

            <div class="col-lg-12" >
                <div class="row">
                    <div class="col-lg-4" style="padding-bottom: 20px;">
                        <div style="border: 1px solid #969696;border-radius: 10px;">
                            <h4 style="font-family: 'Helvetica Neue';">
                                <img src="https://i.ibb.co/5sFK9qT/location.png" alt="location" border="0" style="width: 30px" />
                                Alamat
                            </h4>
                            <div class="heading1"></div>
                            <div style="height: 100px;padding-right: 10px;padding-left: 10px;" >
                                <table width="100%" class="" style="margin-top: 10px">
                                    <tr style="height:2px">
                                        <td width="20%" style="font-size: 12px">Qty</td>
                                        <td width="50%" style="font-size: 12px">Product</td>
                                        <td width="30%" style="font-size: 12px">Total</td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-8" style="padding-bottom: 20px;">
                        <div style="border: 1px solid #969696;border-radius: 10px;">
                            <h4 style="font-family: 'Helvetica Neue';">
                                <img src="https://i.ibb.co/5sFK9qT/location.png" alt="location" border="0" style="width: 30px" />
                                Alamat
                            </h4>
                            <div class="heading1"></div>
                            <div style="height: 100px;padding-right: 10px;padding-left: 10px;">
                                Test
                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
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
</script>

@endsection()
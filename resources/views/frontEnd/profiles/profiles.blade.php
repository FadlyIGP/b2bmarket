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

  #rata{
    display: flex;
    align-items:center;
    padding-top: 10px;
  }
</style>
<div id="" class="about-us show-up header-text" style="margin-bottom: -250px">
	<div class="container ">
    <div class="row">
      <div class="col-lg-12" >
        <div class="row">
         @if (session('success'))
         <div class="alert alert-info">
          {{ session('success') }}
          <a href="#" class="close" data-dismiss="alert" aria-label="close" style="color: #fff;">&times;</a>  
        </div>        
        @endif 
        @if (session('warning'))
        <div class="alert alert-warning">
          {{ session('warning') }}
          <a href="#" class="close" data-dismiss="alert" aria-label="close" style="color: #fff;">&times;</a>  
        </div>        
        @endif 
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
              {!! Form::open(['url'=>url('/profiles/updateaddress'),'method'=>'POST', 'files'=>'true', 'class'=>'form-horizontal', 'autocomplete'=>'off']) !!}
              <div class="form-group">                    
                <div class="col-sm-10">
                  <input type="hidden" class="form-control" id="id_address" name="id_address"  value="{{ $address_list['id'] }}">
                </div>
              </div>
              <div class="form-group" id="rata">
                <label class="col-sm-2 control-label">Contact</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="id_contact" name="comp_contact" placeholder="Contact" value="{{ $address_list['contact'] }}" required>
                </div>
              </div>
              <div class="form-group" id="rata">
                <label class="col-sm-2 control-label">Province</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="id_prov" name="prov" placeholder="Province" value="{{ $address_list['provinsi'] }}" required>
                </div>
              </div>
              <div class="form-group" id="rata">
                <label class="col-sm-2 control-label">City / Country</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="id_city" name="city" placeholder="City or Country" value="{{ $address_list['kabupaten'] }}" required>
                </div>
              </div>
              <div class="form-group" id="rata">
                <label class="col-sm-2 control-label">District</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="id_district" name="district" placeholder="Distric" value="{{ $address_list['kecamatan'] }}" required>
                </div>
              </div>
              <div class="form-group" id="rata">
                <label class="col-sm-2 control-label">Neighborhoods</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="id_neighborhoods" name="neighborhoods" placeholder="Neighborhoods" value="{{ $address_list['kelurahan'] }}" required>
                </div>
              </div>
              <div class="form-group" id="rata">
                <label class="col-sm-2 control-label">Complete Address</label>
                <div class="col-sm-10">
                  <textarea class="form-control" id="id_compaddr" name="compaddr" placeholder="Complete Address" required>{{ $address_list['complete_address'] }}</textarea>
                </div>
              </div>
              <div class="form-group" id="rata">
                <label class="col-sm-2 control-label">Postal Code</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="id_postcode" name="postcode" placeholder="Postal Code" value="{{ $address_list['postcode'] }}" required>
                </div>
              </div>
              <div class="form-group" id="rata">
                <label class="col-sm-2 control-label">Remark</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="id_remark" name="remark" placeholder="Remark" value="{{ $address_list['patokan'] }}">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  {!! Form::submit('Update', ['class'=>'btn btn-default','style'=>'background-color:#fb8c00;border-radius:5px;width:80px;color: white']) !!}
                </div>
              </div>
              {!! Form::close() !!}
            </div>

            <div id="Paris" class="tabcontent">
                {{-- <h3>Paris</h3>
                  <p>Paris is the capital of France.</p> --}}
                  {!! Form::open(['url'=>url('/profiles/changepassword'),'method'=>'POST', 'files'=>'true', 'class'=>'form-horizontal', 'autocomplete'=>'off', 'onsubmit'=>'return validateForm(this)']) !!}
                  <div class="form-group">                    
                      <div class="col-sm-10">
                          <input type="hidden" class="form-control" id="id_email" name="email" value="{{ $profile->email }}">
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">New Password</label>
                      <div class="col-sm-10">
                          <input type="password" class="form-control" id="idnew_pass" name="new_pass" placeholder="New Password" onblur="checkLength1(this)">
              <span id="errPass1" style="color: red;"></span>
                      </div>
                  </div>   
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Confirm Password</label>
                      <div class="col-sm-10">
                          <input type="password" class="form-control" id="idconrim_pass" name="conrim_pass" placeholder="Confirm Password">
                <span id="errPass2" style="color: red;"></span>
                      </div>
                  </div>              
                  <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                          {!! Form::submit('Update', ['class'=>'btn btn-default','style'=>'background-color:#fb8c00;border-radius:5px;width:80px;color: white']) !!}
                      </div>
                    </div>
                  {!! Form::close() !!}
                </div>

                <div id="Tokyo" class="tabcontent">
                  {{-- <h3>Tokyo</h3>
                    <p>Tokyo is the capital of Japan.</p> --}}
                    {!! Form::open(['url'=>url('/profiles/changeuser'),'method'=>'POST','files'=>'true','class'=>'form-horizontal','autocomplete'=>'off']) !!}
                    <div class="form-group" id="rata">
                      <label class="col-sm-2 control-label"></label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="email" id="idemail" placeholder="Email" value="{{ $profile['email']}}" disabled>
                      </div>
                    </div>
                    <div class="form-group" id="rata">
                      <label class="col-sm-2 control-label"></label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" id="idname" placeholder="Name" value="{{ $profile['name']}}">
                      </div>
                    </div>
                    <div class="form-group" id="rata">
                      <label class="col-sm-2 control-label"></label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="phone" id="idphone" placeholder="phone" value="{{ $profile['phone']}}">
                      </div>
                    </div>
                    <div class="form-group" id="rata">
                      <label class="col-sm-2 control-label"></label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="tel_number" id="idtel_number" placeholder="tel_number" value="{{ $profile['tel_number']}}">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        {!! Form::submit('Update', ['class'=>'btn btn-default','style'=>'background-color:#fb8c00;border-radius:5px;width:80px;color: white']) !!}
                      </div>
                    </div>
                    {!! Form::close() !!}
                  </div>
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

@push('scripts')
<script>
  $(document).ready(function() {
    window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
      });
    }, 2500);
  });    
</script>

<script>
  function validateForm(form){        
    if (form.new_pass.value == ""){
    document.getElementById("errPass1").innerHTML = "Password can't be empty!";
    form.new_pass.focus();
    return false;
    }
    else if(form.new_pass.value.length < 6){
    document.getElementById("errPass1").innerHTML = "Minimum password must be 6 characters!";
    form.new_pass.focus();
    return false;
    }

    if (form.conrim_pass.value == ""){
    document.getElementById("errPass2").innerHTML = "Password can't be empty!";
    form.conrim_pass.focus();
    return false;
    }

    var newPass = document.getElementById('idnew_pass').value;
    var checkPass = document.getElementById('idconrim_pass').value;

    if (checkPass != newPass){
    document.getElementById("errPass2").innerHTML = "Confirm password does not match!";
    form.conrim_pass.focus();
    return false;
    }
    return true;
    }

  function checkLength1(el){
    if (el.value.length >= 6) {
      document.getElementById("errPass1").innerHtml = "";
    }
  }
</script>
@endpush
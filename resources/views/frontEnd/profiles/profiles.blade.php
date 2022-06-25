@extends('frontEnd.weblayouts.app')
@section('content')

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

  td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
  }

  tr:nth-child(even) {
    background-color: #dddddd;
  }

  .buttonaddress {
    display: block;
    width: 50%;
    height: 30px;
    border: none;
    background-color: #FF4500;
    color: white;
    /*padding: 14px 28px;*/
    border-radius: 10px;
    font-size: 12px;
    cursor: pointer;
    text-align: center;
  }
</style>
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> --}}
{{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> --}}
@include('sweetalert::alert')

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
          <div class="col-lg-12">
            <div style="border: 1px solid #969696;border-radius: 10px;">
              <div style="display: flex;justify-content: center;padding-top: 10px">
                <img src="{{ url('/files/'.$company_list['company_logo']) }}" alt="location" border="0" style="width: 150px" />
              </div>
              <div style="text-align: center;">
                <h5>{{ $company_list['company_name']}}</h5>
              </div>
              <div class="heading1"></div>
              <div class="list-group list-group-unbordered">
                <div class="list-group-item" style="display: flex;justify-content: space-around;">
                  <b>All Transaction Finished</b> <a class="pull-right text-orange text-bold" style="background-color: #e8f5e9;">{{ $count_finished }}</a>
                </div>
                <div class="list-group-item" style="display: flex;justify-content: space-around;">
                  <b>All Transaction Failed</b> <a class="pull-right text-orange text-bold" style="background-color: #e8f5e9;">{{ $count_failed }}</a>
                </div>                
              </div> 
              <div class="heading1"></div>
            </div>
          </div>
          <br>
          <div class="col-lg-12" style="padding-bottom: 20px;">
            <div style="border: 1px solid #969696;border-radius: 10px;">
              <div class="row" style="padding-top: 10px;padding-bottom: 10px">
                <div style="display: flex;align-content: space-around;">
                  <div class="col-lg-6"> 
                    <h4 style="font-family: 'Helvetica Neue';">
                      <img src="https://i.ibb.co/5sFK9qT/location.png" alt="location" border="0" style="width: 30px" />
                      All Address&nbsp&nbsp&nbsp
                    </h4>
                  </div>
                  <div class="col-lg-6" style="display: flex;justify-content: flex-end;padding-right: 10px">
                    <button type="button" class="btn btn-primary buttonaddress" data-bs-toggle="modal" data-bs-target="#myModal">
                     <i class="fa fa-add">&nbsp Add</i>
                   </button>
                 </div>
               </div>
             </div>
             <div class="heading1"></div>
             <div style="padding: 10px">


              @foreach($address_all as $address)
              <table style="width: 100%">
                <tr>
                  <td style="width: 20%;text-align: center;"> {{ $loop->iteration}}</td>
                  <td style="width: 50%;">{{ $address->name}}</td>
                  <td style="width: 30%;">
                    @if($address->primary_address == 1)
                    <button class="btn btn-primary buttonaddress" style="width: 100px;height: 50px" src="/profiles/updateprimary" disabled>
                      Main Address
                    </button>
                    @else
                    {!! Form::open(['url'=>url('/profiles/updateprimary'),'method'=>'POST', 'files'=>'true', 'class'=>'form-horizontal', 'autocomplete'=>'off']) !!}
                    <input type="hidden" class="form-control" id="address_id" name="address_id"  value="{{ $address['id'] }}">
                    {!! Form::submit('Update', ['class'=>'btn btn-default','style'=>'background-color:#fb8c00;border-radius:5px;width:80px;color: white']) !!}
                    {!! Form::close() !!}
                    @endif
                  </td>
                </tr>
              </table>
              @endforeach
            </div>
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
                @foreach($address_list as $address_list)
                <div class="form-group">                    
                  <div class="col-sm-10">
                    <input type="hidden" class="form-control" id="id_address" name="id_address"  value="{{ $address_list['id'] }}">
                  </div>
                </div>
                <div class="form-group" id="rata">
                  <label class="col-sm-2 control-label">Nama Jalan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="id_name" name="name" placeholder="Nama Jalan" value="{{ $address_list['name'] }}" required>
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
                @endforeach
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
                  <div class="form-group" id="rata">
                    <label class="col-sm-3 control-label">New Password</label>
                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="password" name="password" placeholder="New Password" onblur="checkLength1(this)" required>
                      <span id="errPass1" style="color: red;"></span>
                    </div>
                  </div>   
                  <div class="form-group" id="rata">
                    <label class="col-sm-3 control-label">Confirm Password</label>
                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="confirmed" name="confirmed" placeholder="Confirm Password" required>
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
                      <label class="col-sm-2 control-label">Email</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="email" id="idemail" placeholder="Email" value="{{ $profile['email']}}" disabled>
                      </div>
                    </div>
                    <div class="form-group" id="rata">
                      <label class="col-sm-2 control-label">Username</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" id="idname" placeholder="Name" value="{{ $profile['name']}}">
                      </div>
                    </div>
                    <div class="form-group" id="rata">
                      <label class="col-sm-2 control-label">Handphone</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="phone" id="idphone" placeholder="phone" value="{{ $profile['phone']}}">
                      </div>
                    </div>
                    <div class="form-group" id="rata">
                      <label class="col-sm-2 control-label">No. Telp</label>
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
            </div>

            <div class="col-lg-8" style="padding-bottom: 20px;">
              <div style="border: 1px solid #969696;border-radius: 10px;">
                <h4 style="font-family: 'Helvetica Neue';">
                  <img src="https://i.ibb.co/5sFK9qT/location.png" alt="location" border="0" style="width: 30px" />
                  Add Address
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

  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Address</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          {!! Form::open(['url'=>url('/profiles/'),'method'=>'POST','files'=>'true','class'=>'form-horizontal','autocomplete'=>'off'])!!}
          <div class="form-group" id="rata">
            <label class="col-sm-3 control-label">Nama jalan</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="name" placeholder="Nama Jalan" id="name" required>
            </div>
          </div>
          <div class="form-group" id="rata">
            <label class="col-sm-3 control-label">Contact</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="contact" placeholder="Contact" id="contact">
            </div>
          </div>
          <div class="form-group" id="rata">
            <label class="col-sm-3 control-label">provinsi</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="provinsi" placeholder="provinsi" id="provinsi">
            </div>
          </div>
          <div class="form-group" id="rata">
            <label class="col-sm-3 control-label">kabupaten</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="kabupaten" placeholder="kabupaten" id="kabupaten">
            </div>
          </div>
          <div class="form-group" id="rata">
            <label class="col-sm-3 control-label">kecamatan</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="kecamatan" placeholder="kecamatan" id="kecamatan">
            </div>
          </div>
          <div class="form-group" id="rata">
            <label class="col-sm-3 control-label">kelurahan</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="kelurahan" placeholder="kelurahan" id="kelurahan">
            </div>
          </div>
          <div class="form-group" id="rata">
            <label class="col-sm-3 control-label">Complete Address</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="complete_address" placeholder="complete_address" id="complete_address">
            </div>
          </div> 
          <div class="form-group" id="rata">
            <label class="col-sm-3 control-label">patokan</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="patokan" placeholder="patokan" id="patokan">
            </div>
          </div> 
          <div class="form-group" id="rata">
            <label class="col-sm-3 control-label">postcode</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="postcode" placeholder="postcode" id="postcode">
            </div>
          </div>
          
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <div class="form-group">
            {{ Form::submit('Simpan',['class'=>'btn btn-default','style'=>'background-color:#fb8c00;border-radius:5px;width:80px;color: white;'])}}
          </div>
          {{ Form::close()}}
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
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


    $(document).ready(function() {
      window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
          $(this).remove();
        });
      }, 2500);
    }); 


  </script>

  @endsection()

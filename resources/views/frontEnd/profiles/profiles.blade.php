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

  .buttonaddress {
    display: block;
    width: 50%;
    height: 30px;
    border: none;
    background-color: #FF0000;
    color: white;
    /*padding: 14px 28px;*/
    border-radius: 10px;
    font-size: 12px;
    cursor: pointer;
    text-align: center;
  }

  #borderimg2 { 
    border: 10px solid transparent;
    padding: 15px;
    border-image: url(border.png) 30 stretch;
  }

  .block {
    display: block;
    /*width: 50%;*/
    /*height: 30px;*/
    border: none;
    background-color: #FFA500;
    color: white;
    /*padding: 14px 28px;*/
    border-radius: 10px;
    font-size: 12px;
    cursor: pointer;
    text-align: center;
  }

  .block:hover {
    background-color: #ddd;
    color: black;
  }

  .button{
    border: none;
    text-align: center;
    display: inline-block;
    border-radius: 5px;

  }

  table, tr, td {
    border: none;
  }

  .padding1{
    padding-bottom: 10px;
  }


</style>
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> --}}
{{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> --}}
@include('sweetalert::alert')

<div class="about-us">
    
</div>
<div id="" class="show-up header-text" style="margin-bottom: 30000px">
	<div class="container ">
        <div class="row">
            <div class="col-lg-12" >
                <div class="row">
                    <div class="col-lg-4" style="padding-bottom: 20px;">
                       <div class="col-lg-12" style="padding-bottom: 20px">
                            <div style="border: 1px solid #969696;border-radius: 10px;">
                                <div style="display: flex;justify-content: center;padding-top: 10px;padding-bottom: 15px">
                                    <img src="{{ url('/files/'.$profile['user_foto']) }}" alt="user photo" border="0" style="width: 150px;border-radius: 30px" />
                                </div>
                                <div style="text-align: center;">
                                    <h5>{{ $profile['name']}}</h5>
                                </div>
                                <div class="heading1"></div>
                                <div class="list-group list-group-unbordered">
                                    <table class="table">
                                        <tr>
                                            <td>Transaction Finished</td>
                                            <td>{{ $count_finished }}</td>
                                        </tr>
                                        <tr>
                                            <td>Transaction Failed </td>
                                            <td>{{ $count_failed }}</td>
                                        </tr>
                                    </table>
                                       
                               </div> 
                            </div>
                       </div>

                       <div class="col-lg-12">
                            <div style="border: 1px solid #969696;border-radius: 10px;">
                                 <div style="">
                                <div class="row" style="padding:10px">
                                    <div style="display: flex;align-content: space-around;">
                                        <div class="col-lg-6"> 
                                            <h4 style="font-family: 'Helvetica Neue';">
                                              <img src="https://i.ibb.co/5sFK9qT/location.png" alt="location" border="0" style="width: 30px" />
                                              All Address
                                            </h4>
                                        </div>
                                        <div class="col-lg-6" style="display: flex;justify-content: flex-end;padding-right: 10px">
                                            <button type="button" class="buttonaddress" data-bs-toggle="modal" data-bs-target="#myModal">
                                             <i class="fa fa-add">&nbsp; Add</i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="heading1"></div>
                            <div style="padding: 10px">
                                @if(empty($address_all))

                                @else()
                                    @foreach($address_all as $address)
                                    <table style="width: 100%;border: 0;">
                                        <tr>
                                            <td style="width: 50%;">{{ $address->complete_address}}</td>
                                            <td style="width: 30%;text-align: right;">
                                                @if($address->primary_address == 1)
                                                  <button style="background-color:#FF0000 !important;border:none;border-radius:5px;color:white">
                                                      primary
                                                  </button>
                                                @else
                                                    {!! Form::open(['url'=>url('/profiles/updateprimary'),'method'=>'POST', 'files'=>'true', 'class'=>'form-horizontal', 'autocomplete'=>'off']) !!}
                                                        <input type="hidden" class="form-control" id="address_id" name="address_id"  value="{{ $address['id'] }}">
                                                        <button type="submit" style="background-color:#FF0000 !important;border:none;border-radius:5px;color:white">
                                                         set primary
                                                        </button>
                                                        
                                                    {!! Form::close() !!}
                                                @endif
                                            </td>
                                        </tr>
                                    </table>
                                @endforeach
                                @endif()
                               
                            </div>
                            </div>
                       </div>
                    </div>

                    <div class="col-lg-8" style="">
                        <div style="border: 1px solid #969696;border-radius: 10px;">
                            <div class="tab">
                                <button id="London-tab" class="tablinks" onclick="openCity(event, 'London')">Address</button>
                                <button id="Paris-tab" class="tablinks" onclick="openCity(event, 'Paris')">Change Password</button>
                                <button id="Tokyo-tab" class="tablinks" onclick="openCity(event, 'Tokyo')">User Setup</button>
                            </div>
                            <div class="heading1"></div>
                            <div id="London" class="tabcontent">
                                <div class="row">
                                    <div class="col-lg-12">

                                        @if(empty($address_list))

                                        {!! Form::open(['url'=>url('/address'),'method'=>'POST', 'files'=>'true', 'class'=>'form-horizontal', 'autocomplete'=>'off']) !!}
                                        <div class="row">
                                      
                                          <div class="form-group">                    
                                              <div class="col-sm-10">
                                              </div>
                                            </div>
                                            <div class="form-group padding1">
                                              <div class="col-lg-12">
                                                <div class="row">
                                                  <div class="col-lg-2">
                                                    <label class="control-label">Address owner</label>
                                                  </div>
                                                  <div class="col-lg-10">
                                                    <input type="text" class="form-control" id="name" name="name" placeholder="Address Owner" value="" required>
                                                    <input type="hidden" class="form-control" name="prmary"  id="prmary" required value="1">

                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="form-group padding1">
                                              <div class="col-lg-12">
                                                <div class="row">
                                                  <div class="col-lg-2">
                                                    <label class="control-label">Contact</label>
                                                  </div>
                                                  <div class="col-lg-10">
                                                    <input type="text" class="form-control" id="contact" name="contact" placeholder="Contact" value="" required>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="form-group padding1">
                                              <div class="col-lg-12">
                                                <div class="row">
                                                  <div class="col-lg-2">
                                                    <label class="control-label">Province</label>
                                                  </div>
                                                  <div class="col-lg-10">
                                                    <input type="text" class="form-control" id="provinsi" name="provinsi" placeholder="Province" value="" required>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="form-group padding1">
                                              <div class="col-lg-12">
                                                <div class="row">
                                                  <div class="col-lg-2">
                                                    <label class="control-label">City/Country</label>
                                                  </div>
                                                  <div class="col-lg-10">
                                                    <input type="text" class="form-control" id="kabupaten" name="kabupaten" placeholder="City or Country" value="" required>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="form-group padding1">
                                              <div class="col-lg-12">
                                                <div class="row">
                                                  <div class="col-lg-2">
                                                    <label class="control-label">District</label>
                                                  </div>
                                                  <div class="col-lg-10">
                                                    <input type="text" class="form-control" id="kecamatan" name="kecamatan" placeholder="Distric" value="" required>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="form-group padding1">
                                              <div class="col-lg-12">
                                                <div class="row">
                                                  <div class="col-lg-2">
                                                    <label class="control-label">Neighborhoods</label>
                                                  </div>
                                                  <div class="col-lg-10">
                                                    <input type="text" class="form-control" id="kelurahan" name="kelurahan" placeholder="Neighborhoods" value="" required>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="form-group padding1">
                                              <div class="col-lg-12">
                                                <div class="row">
                                                  <div class="col-lg-2">
                                                    <label class="control-label">Complete Address</label>
                                                  </div>
                                                  <div class="col-lg-10">
                                                    <textarea class="form-control" id="komplit" name="komplit" placeholder="Complete Address" required></textarea>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="form-group padding1">
                                              <div class="col-lg-12">
                                                <div class="row">
                                                  <div class="col-lg-2">
                                                    <label class="control-label">Postal Code</label>
                                                  </div>
                                                  <div class="col-lg-10">
                                                    <input type="text" class="form-control" id="kodepost" name="kodepost" placeholder="Postal Code" value="" required>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="form-group padding1">
                                              <div class="col-lg-12">
                                                <div class="row">
                                                  <div class="col-lg-2">
                                                    <label class="control-label">Remark</label>
                                                  </div>
                                                  <div class="col-lg-10">
                                                    <input type="text" class="form-control" id="patokan" name="patokan" placeholder="Remark" value="">
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="form-group padding1">
                                              <div class="col-lg-offset-2 col-lg-10">
                                                {!! Form::submit('Submit', ['class'=>'btn btn-default','style'=>'background-color:#fb8c00;border-radius:5px;width:80px;color: white']) !!}
                                              </div>
                                            </div>
                                        </div>
                                       
                                        {!! Form::close() !!}
                                        @else()
                                        {!! Form::open(['url'=>url('/profiles/updateaddress'),'method'=>'POST', 'files'=>'true', 'class'=>'form-horizontal', 'autocomplete'=>'off']) !!}
                                        <div class="row">
                                      
                                          <div class="form-group">                    
                                              <div class="col-sm-10">
                                                <input type="hidden" class="form-control" id="id_address" name="id_address"  value="{{ $address_list['id'] }}">
                                              </div>
                                            </div>
                                            <div class="form-group padding1">
                                              <div class="col-lg-12">
                                                <div class="row">
                                                  <div class="col-lg-2">
                                                    <label class="control-label">Address owner</label>
                                                  </div>
                                                  <div class="col-lg-10">
                                                    <input type="text" class="form-control" id="id_name" name="name" placeholder="Nama Jalan" value="{{ $address_list['name'] }}" required>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="form-group padding1">
                                              <div class="col-lg-12">
                                                <div class="row">
                                                  <div class="col-lg-2">
                                                    <label class="control-label">Contact</label>
                                                  </div>
                                                  <div class="col-lg-10">
                                                    <input type="text" class="form-control" id="id_contact" name="comp_contact" placeholder="Contact" value="{{ $address_list['contact'] }}" required>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="form-group padding1">
                                              <div class="col-lg-12">
                                                <div class="row">
                                                  <div class="col-lg-2">
                                                    <label class="control-label">Province</label>
                                                  </div>
                                                  <div class="col-lg-10">
                                                    <input type="text" class="form-control" id="id_prov" name="prov" placeholder="Province" value="{{ $address_list['provinsi'] }}" required>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="form-group padding1">
                                              <div class="col-lg-12">
                                                <div class="row">
                                                  <div class="col-lg-2">
                                                    <label class="control-label">City/Country</label>
                                                  </div>
                                                  <div class="col-lg-10">
                                                    <input type="text" class="form-control" id="id_city" name="city" placeholder="City or Country" value="{{ $address_list['kabupaten'] }}" required>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="form-group padding1">
                                              <div class="col-lg-12">
                                                <div class="row">
                                                  <div class="col-lg-2">
                                                    <label class="control-label">District</label>
                                                  </div>
                                                  <div class="col-lg-10">
                                                    <input type="text" class="form-control" id="id_district" name="district" placeholder="Distric" value="{{ $address_list['kecamatan'] }}" required>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="form-group padding1">
                                              <div class="col-lg-12">
                                                <div class="row">
                                                  <div class="col-lg-2">
                                                    <label class="control-label">Neighborhoods</label>
                                                  </div>
                                                  <div class="col-lg-10">
                                                    <input type="text" class="form-control" id="id_neighborhoods" name="neighborhoods" placeholder="Neighborhoods" value="{{ $address_list['kelurahan'] }}" required>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="form-group padding1">
                                              <div class="col-lg-12">
                                                <div class="row">
                                                  <div class="col-lg-2">
                                                    <label class="control-label">Complete Address</label>
                                                  </div>
                                                  <div class="col-lg-10">
                                                    <textarea class="form-control" id="id_compaddr" name="compaddr" placeholder="Complete Address" required>{{ $address_list['complete_address'] }}</textarea>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="form-group padding1">
                                              <div class="col-lg-12">
                                                <div class="row">
                                                  <div class="col-lg-2">
                                                    <label class="control-label">Postal Code</label>
                                                  </div>
                                                  <div class="col-lg-10">
                                                    <input type="text" class="form-control" id="id_postcode" name="postcode" placeholder="Postal Code" value="{{ $address_list['postcode'] }}" required>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="form-group padding1">
                                              <div class="col-lg-12">
                                                <div class="row">
                                                  <div class="col-lg-2">
                                                    <label class="control-label">Remark</label>
                                                  </div>
                                                  <div class="col-lg-10">
                                                    <input type="text" class="form-control" id="id_remark" name="remark" placeholder="Remark" value="{{ $address_list['patokan'] }}">
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="form-group padding1">
                                              <div class="col-lg-offset-2 col-lg-10">
                                                {!! Form::submit('Update', ['class'=>'btn btn-default','style'=>'background-color:#fb8c00;border-radius:5px;width:80px;color: white']) !!}
                                              </div>
                                            </div>
                                        </div>
                                       
                                        {!! Form::close() !!}
                                        @endif()

                                    </div>
                                </div>
                            </div>

                            <div id="Paris" class="tabcontent">
                                <div class="row">
                                    <div class="col-lg-12">
                                    {!! Form::open(['url'=>url('/profiles/changepassword'),'method'=>'POST', 'files'=>'true', 'class'=>'form-horizontal', 'autocomplete'=>'off', 'onsubmit'=>'return validateForm(this)']) !!}
                                        <div class="form-group">                    
                                            <div class="col-sm-10">
                                              <input type="hidden" class="form-control" id="id_email" name="email" value="{{ $profile->email }}">
                                            </div>
                                        </div>
                                        <div class="form-group padding1">
                                            <div class="col-lg-12">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                      <label class="control-label">New Password</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                          <input type="password" class="form-control" id="password" name="password" placeholder="New Password" onblur="checkLength1(this)" required>
                                                          <span id="errPass1" style="color: red;"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>   
                                        <div class="form-group padding1">
                                            <div class="col-lg-12">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                      <label class="control-label">Confirm Password</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                      <input type="password" class="form-control" id="confirmed" name="confirmed" placeholder="Confirm Password" required>
                                                      <span id="errPass2" style="color: red;"></span>
                                                    </div>
                                                </div> 
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

                            <div id="Tokyo" class="tabcontent">
                                <div class="row">
                                    <div class="col-lg-12">
                                        {!! Form::open(['url'=>url('/profiles/changeuser'),'method'=>'POST','files'=>'true','class'=>'form-horizontal','autocomplete'=>'off']) !!}
                                            <div class="form-group padding1">
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-2">
                                                        <label class="control-label">Email</label>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="email" id="idemail" placeholder="Email" value="{{ $profile['email']}}" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group padding1">
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-2">
                                                            <label class="control-label">Username</label>
                                                        </div>
                                                        <div class="col-lg-10">
                                                            <input type="text" class="form-control" name="name" id="idname" placeholder="Name" value="{{ $profile['name']}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group padding1">
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-2">
                                                            <label class="control-label">Handphone</label>
                                                        </div>
                                                        <div class="col-lg-10">
                                                            <input type="text" class="form-control" name="phone" id="idphone" placeholder="phone" value="{{ $profile['phone']}}">
                                                        </div>
                                                    </div> 
                                                </div>
                                            </div>
                                            <div class="form-group padding1">
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-2">
                                                            <label class="control-label">No. Telp</label>
                                                        </div>
                                                        <div class="col-lg-10">
                                                            <input type="text" class="form-control" name="tel_number" id="idtel_number" placeholder="tel_number" value="{{ $profile['tel_number']}}">
                                                        </div>
                                                    </div> 
                                                </div>
                                            </div>
                                            <div class="form-group padding1">
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-2">
                                                            <label class="control-label">Foto</label>
                                                        </div>
                                                        <div class="col-lg-5">
                                                            <input type="file" class="form-control" name="user_foto" id="iduser_foto">
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                                 <div class="row">
                                                        <div class="col-lg-2">
                                                            <label class="control-label"></label>
                                                        </div>
                                                        <div class="col-lg-5">
                                                             <img id="borderimg2" src="{{ url('/files/'.$profile['user_foto']) }}" alt="user_foto" border="0" style="width: 150px" />
                                                        </div>
                                                       
                                                    </div>
                                                
                                            </div>
                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
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
            <label class="col-sm-3 control-label">Address Owner</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="name" placeholder="Address Owner" id="name" required>
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

@extends('layouts.master')

@section('title')
Company Profile
@endsection
@section('breadcrumb')
@parent
<li class="active">Profile</li>
@endsection

@section('content')
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
<div class="row">
	<div class="col-md-3">
		<!-- Profile Image -->
      	<div class="box box-danger">
            <div class="box-body box-profile">
              	<img class="profile-user-img img-responsive img-circle" src="{{ url('/files/'.$company_list['company_logo']) }}" alt="Company profile picture" width="200">

              	<h3 class="profile-username text-center">{{ $company_list['company_name'] }}</h3>

              	<ul class="list-group list-group-unbordered">
                	<li class="list-group-item">
                  		<b>All Transaction Finished</b> <a class="pull-right text-orange text-bold" style="background-color: #e8f5e9;">{{ $count_finished }}</a>
                	</li>
                	<li class="list-group-item">
                  		<b>All Transaction Failed</b> <a class="pull-right text-orange text-bold" style="background-color: #e8f5e9;">{{ $count_failed }}</a>
                	</li>                
              	</ul>              
            </div>
            <!-- /.box-body -->
      	</div>
      	<!-- /.box -->

      	<!-- About Me Box -->
      	<div class="box box-danger">
            <div class="box-header with-border">
              	<h3 class="box-title">About Us</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              	<strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              	<p class="text-muted">{{ $address_list['complete_address'] }}</p>

              	<hr>
            </div>
        </div>
	</div>
	<div class="col-md-9">
		<div class="nav-tabs-custom tab-danger">
            <ul class="nav nav-tabs">
              	<li class="active"><a href="#address" data-toggle="tab">Address</a></li>
              	<li><a href="#chgpassword" data-toggle="tab">Change Password</a></li>
              	<li><a href="#usersetup" data-toggle="tab">User Setup</a></li>
            </ul>
            <div class="tab-content">            	
              	<div class="active tab-pane" id="address">
              		{!! Form::open(['url'=>url('/getprofile/updateaddress'),'method'=>'POST', 'files'=>'true', 'class'=>'form-horizontal', 'autocomplete'=>'off']) !!}
              		<div class="form-group">	                	
                  		<div class="col-sm-10">
	                      	<input type="hidden" class="form-control" id="id_address" name="id_address"  value="{{ $address_list['id'] }}">
	                    </div>
	              	</div>
                	<div class="form-group">
	                	<label class="col-sm-2 control-label">Contact</label>
                  		<div class="col-sm-10">
	                      	<input type="text" class="form-control" id="id_contact" name="comp_contact" placeholder="Contact" value="{{ $address_list['contact'] }}" required>
	                    </div>
	              	</div>
	              	<div class="form-group">
	                	<label class="col-sm-2 control-label">Province</label>
                  		<div class="col-sm-10">
	                      	<input type="text" class="form-control" id="id_prov" name="prov" placeholder="Province" value="{{ $address_list['provinsi'] }}" required>
	                    </div>
	              	</div>
	              	<div class="form-group">
	                	<label class="col-sm-2 control-label">City / Country</label>
                  		<div class="col-sm-10">
	                      	<input type="text" class="form-control" id="id_city" name="city" placeholder="City or Country" value="{{ $address_list['kabupaten'] }}" required>
	                    </div>
	              	</div>
	              	<div class="form-group">
	                	<label class="col-sm-2 control-label">District</label>
                  		<div class="col-sm-10">
	                      	<input type="text" class="form-control" id="id_district" name="district" placeholder="Distric" value="{{ $address_list['kecamatan'] }}" required>
	                    </div>
	              	</div>
	              	<div class="form-group">
	                	<label class="col-sm-2 control-label">Neighborhoods</label>
                  		<div class="col-sm-10">
	                      	<input type="text" class="form-control" id="id_neighborhoods" name="neighborhoods" placeholder="Neighborhoods" value="{{ $address_list['kelurahan'] }}" required>
	                    </div>
	              	</div>
	              	<div class="form-group">
	                	<label class="col-sm-2 control-label">Complete Address</label>
                  		<div class="col-sm-10">
	                      	<textarea class="form-control" id="id_compaddr" name="compaddr" placeholder="Complete Address" required>{{ $address_list['complete_address'] }}</textarea>
	                    </div>
	              	</div>
	              	<div class="form-group">
	                	<label class="col-sm-2 control-label">Postal Code</label>
                  		<div class="col-sm-10">
	                      	<input type="text" class="form-control" id="id_postcode" name="postcode" placeholder="Postal Code" value="{{ $address_list['postcode'] }}" required>
	                    </div>
	              	</div>
	              	<div class="form-group">
	                	<label class="col-sm-2 control-label">Remark</label>
                  		<div class="col-sm-10">
	                      	<input type="text" class="form-control" id="id_remark" name="remark" placeholder="Remark" value="{{ $address_list['patokan'] }}" required>
	                    </div>
	              	</div>
	              	<div class="form-group">
                    	<div class="col-sm-offset-2 col-sm-10">
                      		{!! Form::submit('Update', ['class'=>'btn btn-default','style'=>'background-color:#fb8c00;border-radius:5px;width:80px;color: white']) !!}
                    	</div>
                  	</div>
	              	{!! Form::close() !!}
              	</div>
              	<div class="tab-pane" id="chgpassword">
                	{!! Form::open(['url'=>url('/getprofile/changepassword'),'method'=>'POST', 'files'=>'true', 'class'=>'form-horizontal', 'autocomplete'=>'off', 'onsubmit'=>'return validateForm(this)']) !!}
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
              	<div class="tab-pane" id="usersetup">
              		{!! Form::open(['url'=>url('/getprofile/updateuser'),'method'=>'POST', 'files'=>'true', 'class'=>'form-horizontal', 'autocomplete'=>'off']) !!}
              		<div class="form-group">	      
              			<label class="col-sm-2 control-label">Email</label>          	
                  		<div class="col-sm-10">
	                      	<input type="email" class="form-control" id="id_email" name="email" value="{{ $profile['email'] }}" readonly>
	                    </div>
	              	</div>
              		<div class="form-group">
	                	<label class="col-sm-2 control-label">Username</label>
                  		<div class="col-sm-10">
	                      	<input type="text" class="form-control" id="iduname" name="uname" placeholder="Username" value="{{ $profile['name'] }}" required>
	                    </div>
	              	</div>
	              	<div class="form-group">
	                	<label class="col-sm-2 control-label">Phone</label>
                  		<div class="col-sm-10">
	                      	<input type="text" class="form-control" id="idphone" name="phone" placeholder="Phone Number" value="{{ $profile['phone'] }}" required>
	                    </div>
	              	</div>
	              	<div class="form-group">
	                	<label class="col-sm-2 control-label">Telephone</label>
                  		<div class="col-sm-10">
	                      	<input type="text" class="form-control" id="idtelephone" name="telephone" placeholder="Telephone Number" value="{{ $profile['tel_number'] }}">
	                    </div>
	              	</div>
	              	<div class="form-group">
	                	<label class="col-sm-2 control-label">Company Logo</label>
                  		<div class="col-sm-10">
	                      	<input type="file" class="form-control" id="idcomp_logo" name="comp_logo">
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
@endsection

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

	// On Leave Passwword Baru
	function checkLength1(el){
		if (el.value.length >= 6){
		document.getElementById("errPass1").innerHTML = "";
		}       
	}
</script>
@endpush
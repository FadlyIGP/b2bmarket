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
    <div class="col-md-12">
		    <div class="nav-tabs-custom tab-warning">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#account" data-toggle="tab">Account Number</a></li>
              	<li><a href="#bank" data-toggle="tab">Bank</a></li>              	              	
            </ul>
            <div class="tab-content">            	
                <div class="active tab-pane" id="account">

                </div>
                <div class="tab-pane" id="bank">

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
@endpush
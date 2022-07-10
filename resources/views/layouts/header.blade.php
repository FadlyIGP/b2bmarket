<!-- <style type="text/css">
    .navbar { background-color: red !important; }
</style> -->

<header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
        <span class="logo-mini"><img  src="https://i.ibb.co/hfM4kvb/B2BLOGO.png" alt="Back to homepage" routerlink="main" class="responsive" tabindex="0" ng-reflect-router-link="main" style="width:120%;height: 70%"></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b><img  src="https://i.ibb.co/hfM4kvb/B2BLOGO.png" alt="Back to homepage" routerlink="main" class="responsive" tabindex="0" ng-reflect-router-link="main" style="width:100%;height: 100%"></b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Notifications: style can be found in dropdown.less -->
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-bell-o"></i>
                      <span class="label label-success">{{ \Session::get('countnotif') }}</span>
                    </a>
                    <ul class="dropdown-menu">
                      <li class="header">You have {{ \Session::get('countnotif') }} notifications</li>
                      <li>
                        <!-- inner menu: contains the actual data -->
                        <ul class="menu">
                          @foreach( \Session::get('notif_list') as $notif_list)
                          <li>
                            <a href="javascript:void(0)">
                              <i class="fa fa-cart-arrow-down text-green"></i> New Order from {{ $notif_list['company_name'] }}
                            </a>
                          </li>    
                          @endforeach()
                        </ul>
                      </li>
                      <li class="footer"><a href="/transaction">View all</a></li>
                    </ul>
                </li>
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="https://i.ibb.co/jrvz5ZC/user1.jpg" class="user-image img-profil"
                            alt="User Image">
                        <span class="hidden-xs">{{ \Session::get('username') }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">

                            <img src="https://i.ibb.co/jrvz5ZC/user1.jpg" class="user-image img-profil"
                            alt="User Image">
                            <br> 

                            <p>
                                {{ \Session::get('username') }}
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                @if(empty(\Session::get('check_address')))
                                    <a href="#" id="idmodalPA" data-target="#modalPA" data-toggle="modal" title="Add Primary Address" class="btn btn-default btn-flat">Profile</a>
                                @else
                                    <a href="{{ url('/getprofile') }}" class="btn btn-default btn-flat">Profile</a>
                                @endif
                            </div>
                            <div class="pull-right">
                                <a href="{{ url('/logout') }}" class="btn btn-default btn-flat"
                                    onclick="$('#logout-form').submit()">Logout</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>

<form action="#" method="post" id="logout-form" style="display: none;">
    @csrf
</form>

<!-- Modal Add Primary Address -->
<div class="modal fade" id="modalPA" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: orange;">   
                <h4 class="modal-title" style="color: white;">
                  <i class="fa fa-home"> Add Primary Address</i>
                    <!-- <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <div class="pull-right" style="color: white;">x</div>
                    </button> -->
                </h4>                                
            </div>

            {!! Form::open(['url'=>url('/getprofile/create/primaryaddress'),'method'=>'POST', 'autocomplete'=>'off', 'onsubmit'=>'return validateForm(this)']) !!}
            <div class="modal-body" id="body-PA">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">       
                            <input type="text" class="form-control" name="addr_own" id="idaddr_own" placeholder="Address Ownwer" required>
                        </div>
                        <div class="form-group">       
                            <input type="text" class="form-control" name="contact" id="idcontact" placeholder="Contact" required>
                        </div>
                        <div class="form-group">       
                            <input type="text" class="form-control" name="prov" id="idprov" placeholder="Province" required>
                        </div>
                        <div class="form-group">       
                            <input type="text" class="form-control" name="city" id="idcity" placeholder="City / Country" required>
                        </div>
                        <div class="form-group">       
                            <input type="text" class="form-control" name="district" id="iddistrict" placeholder="District" required>
                        </div>
                        <div class="form-group">       
                            <input type="text" class="form-control" name="neighborhoods" id="idneighborhoods" placeholder="Neighborhoods" required>
                        </div>
                        <div class="form-group">       
                            <input type="text" class="form-control" name="complete_addr" id="idcomplete_addr" placeholder="Complete Address" required>
                        </div>
                        <div class="form-group">       
                            <input type="text" class="form-control" name="postcode" id="idpostcode" placeholder="Postal Code" onkeypress="return onlyNumeric(event)" required>
                        </div>
                        <div class="form-group">       
                            <input type="text" class="form-control" name="remark" id="idremark" placeholder="Remark" required>
                        </div>
                    </div>
                </div>
            </div>              
            
            <div class="modal-footer">
                {!! Form::submit('Send', ['class'=>'btn btn-default','id' => 'updatefp', 'style'=>'background-color:#32CD32;border-radius:5px;width:80px;color: white']) !!}
                &nbsp;&nbsp;
                <!-- &nbsp;&nbsp; -->
                <a class="btn btn-default" id="cancelfp" data-dismiss="modal" aria-label="Close" style="border-radius: 5px;width:80px;background-color:#FF0000;color: white">
                    Cancel
                </a>
            </div>      
            {!! Form::close() !!}           
        </div>
    </div>
</div>

@push('scripts')
<script type="text/javascript">
    /* PAPUL => function for numeric input only whne keyboard pressed */
    function onlyNumeric(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57)){
            return false;
        }       
        return true;
    }
</script>
@endpush

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
                                <a href="{{ url('/getprofile') }}" class="btn btn-default btn-flat">Profile</a>
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
@push('scripts')

<script type="text/javascript">
       
</script>
@endpush

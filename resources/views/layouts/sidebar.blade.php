<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
       
        
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="{{request()->is('home') ? 'active' : ''}}">
                <a href="{{ url('/home') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>

            <li class="{{request()->is('products') ? 'active' : ''}}">
                <a href="{{ url('/products') }}">
                    <i class="fa fa-dropbox"></i> <span>Products</span>
                </a>
            </li>
            
             <li class="{{request()->is('productcategories') ? 'active' : ''}}">
                <a href="{{ url('/productcategories') }}">
                    <i class="fa fa-gg-circle"></i> <span>Product Categories</span>
                </a>
            </li>

            <li class="{{request()->is('transaction') ? 'active' : ''}}">
                <a href="{{ url('/transaction') }}">
                    <i class="fa fa-cart-arrow-down"></i> <span>Transactions</span>
                </a>
            </li>

            <li class="{{request()->is('productcategories') ? 'active' : ''}}">
                <a href="#">
                    <i class="fa fa-stumbleupon-circle"></i> <span>Contract</span>
                </a>
            </li>

            <li class="{{request()->is('productcategories') ? 'active' : ''}}">
                <a href="#">
                    <i class="fa fa-users"></i> <span>Customers</span>
                </a>
            </li>

            <li class="{{request()->is('productcategories') ? 'active' : ''}}">
                <a href="#">
                    <i class="fa fa-money"></i> <span>Payment List</span>
                </a>
            </li>
            
            
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

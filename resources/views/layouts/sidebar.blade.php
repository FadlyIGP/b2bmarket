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
                <a href="#">
                    <i class="fa fa-file-text"></i> <span>Products</span>
                </a>
            </li>

             <li class="{{request()->is('productcategories') ? 'active' : ''}}">
                <a href="#">
                    <i class="fa fa-file-text"></i> <span>Product Categories</span>
                </a>
            </li>
            
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

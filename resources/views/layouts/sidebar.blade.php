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
                    <i class="fa fa-dashboard text-orange"></i> <span>Dashboard</span>
                </a>
            </li>

            <li class="{{request()->is('productcategories') ? 'active' : ''}}">
                <a href="{{ url('/productcategories') }}">
                    <i class="fa fa-gg-circle text-lime"></i> <span>Product Categories</span>
                </a>
            </li>
            
            <li class="{{request()->is('products') ? 'active' : ''}}">
                <a href="{{ url('/products') }}">
                    <i class="fa fa-dropbox text-aqua"></i> <span>Products</span>
                </a>
            </li> 

            <li class="{{request()->is('productimages') ? 'active' : ''}}">
                <a href="{{ url('/productimages') }}">
                    <i class="fa fa-image text-fuchsia"></i> <span>Product Images</span>
                </a>
            </li>

            <li class="{{request()->is('bankaccount') ? 'active' : ''}}">
                <a href="{{ url('/bankaccount') }}">
                    <i class="fa fa-image text-warning"></i> <span>Bank Account</span>
                </a>
            </li>                     

            <li class="{{request()->is('transaction') ? 'active' : ''}}">
                <a href="{{ url('/transaction') }}">
                    <i class="fa fa-cart-arrow-down text-green"></i> <span>Transactions & Payment</span>
                </a>
            </li>

            <li class="{{request()->is('') ? 'active' : ''}}">
                <a href="#">
                    <i class="fa fa-stumbleupon-circle text-red"></i> <span>Contract</span>
                </a>
            </li> 
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-book text-blue"></i>
                    <span> Report</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{request()->is('report/transaction/journal') ? 'active' : ''}}">
                        <a href="{{ url('/report/transaction/journal') }}"><i class="fa fa-file-text text-blue"></i> Transaction Journal</a>
                    </li>    
                    <li class="{{request()->is('report/transaction/cancellation') ? 'active' : ''}}">
                        <a href="{{ url('/report/transaction/cancellation') }}"><i class="fa fa-file-text text-blue"></i> Cancellation Transaction</a>
                    </li>                
                </ul>
            </li>                                 
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

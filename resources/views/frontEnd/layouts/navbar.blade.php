<<<<<<< HEAD
<!-- NAVIGATION -->
<nav id="navigation">

    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                @foreach($menu as $menu_category)
                <li><a href="#">{{ $menu_category['name'] }}</a></li>
                @endforeach

                {{--  <li><a href="#">Categories</a></li>
                <li><a href="#">Laptops</a></li>
                <li><a href="#">Smartphones</a></li>
                <li><a href="#">Cameras</a></li>
                <li><a href="#">Accessories</a></li>  --}}
            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
<!-- /NAVIGATION -->
=======
>>>>>>> 0067ef3fa19a55ece2aea4d9450efe7217d9d6ab

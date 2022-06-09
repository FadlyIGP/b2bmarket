<body>
    <style>
        .sticky {
            position: fixed;
            top: 0;
            width: 100%;
            border-bottom: 2px solid #DCDCDC;
            
        }
        .line{
            width: 100%;
            /*height: 47px;*/
            border-bottom: 2px solid #DCDCDC;
            position: absolute;
        }
    </style>
    <!-- HEADER -->
    <header>
        <!-- TOP HEADER -->
        <div id="top-header">
            <div class="container">
                <ul class="header-links pull-left">
                    <li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
                </ul>
                <ul class="header-links pull-right">
                    <li>
                        <a href="{{ url('/login') }}">
                            <i class="fa fa-user-o" style="color: white"></i>
                            My Account
                        </a>
                    </li>
                </ul>
                
            </div>
        </div>
        <!-- /TOP HEADER -->

        <!-- MAIN HEADER -->
        <div id="header">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-md-3">
                        <div class="header-logo">
                            <a href="#" class="logo">
                                <img src="https://i.ibb.co/jTCvPSN/B2-Borangelogo.png" alt="" style="width:100%;height: 50px">
                            </a>
                        </div>
                    </div>
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <div class="line"></div>
        <!-- /MAIN HEADER -->
    </header>
    <!-- /HEADER -->
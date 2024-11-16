<!DOCTYPE html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>dashboard admin</title>
	
	<meta name="description" content="Some description for the page"/>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/1.jfif')  }}">
	
	
	
    <link href="{{asset('admin/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet" type="text/css"/>
   <link href="{{asset('admin/vendor/jqvmap/css/jqvmap.min.css')}}" rel="stylesheet" type="text/css"/>
   <link href="{{asset('admin/vendor/chartist/css/chartist.min.css')}}" rel="stylesheet" type="text/css"/>
   <link href="{{asset('admin/2.0/LineIcons.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin/css/style.css')}}" rel="stylesheet" type="text/css"/>
				


</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.html" class="brand-logo">
							<img class="logo-abbr" src="{{ asset('images/1.jfif') }}"class="rounded-lg mr-3" width ="300%" height="150px"   alt="">
				
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        
		
		<!--**********************************
            Chat box End
        ***********************************-->
		
		<!--**********************************
            Header start
        ***********************************-->
        @include('partials.header')
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->		
		
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->

        @include('partials.sidebar')
     
              <!--**********************************
            Sidebar end
        ***********************************-->

		
		
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
                        <!-- row -->
                        @yield('content')
			
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        
        @include('partials.footer') 	
        <!--**********************************
            Footer end
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->


            <script src="{{asset('admin/vendor/global/global.min.js')}}" type="text/javascript"></script>
            <script src="{{asset('admin/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}" 
            type="text/javascript"></script>
            <script src="{{asset('admin/vendor/chart.js/Chart.bundle.min.js')}}" type="text/javascript"></script>
            <script src="{{asset('admin/vendor/waypoints/jquery.waypoints.min.js')}}" type="text/javascript"></script>
            <script src="{{asset('admin/vendor/jquery.counterup/jquery.counterup.min.js')}}" type="text/javascript"></script>
            <script src="{{asset('admin/vendor/apexchart/apexchart.js')}}" type="text/javascript"></script>
            <script src="{{asset('admin/vendor/peity/jquery.peity.min.js')}}" type="text/javascript"></script>
            <script src="{{asset('admin/js/dashboard/dashboard-1.js')}}" type="text/javascript"></script>
            <script src="{{asset('admin/js/custom.min.js')}}" type="text/javascript"></script>
            <script src="{{asset('admin/js/deznav-init.')}}" type="text/javascript"></script>
            <script id="DZScript" src="{{asset('admin/js/w3-global8bb6.js?btn_dir=right')}}"></script>

        </body>

</html>
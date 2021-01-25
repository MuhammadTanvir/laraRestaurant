<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> @yield('title','Laravel Member Management Sytem')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('backend.layouts.partials.styles')
    @yield('styles')
</head>

<body>
    
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">


        <!-- sidebar menu area start -->
        @include('backend.layouts.partials.sidebar')



        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">


            <!-- header area start -->
           @include('backend.layouts.partials.header')
            <!-- header area end -->



           @yield('admin-content')


        </div>
        <!-- main content area end -->

        <!-- footer area start-->
        @include('backend.layouts.partials.copyright')
        
        <!-- footer area end-->


    </div>
    <!-- page container area end -->


    <!-- offset area start -->
     @include('backend.layouts.partials.offset')
    <!-- offset area end -->


    @include('backend.layouts.partials.scripts')

    @yield('scripts')

    
</body>

</html>

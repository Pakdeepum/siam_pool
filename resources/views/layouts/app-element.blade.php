<!doctype html>
<html ng-app="application" lang="{{ app()->getLocale() }}">
    <head class="Kanit">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>POOLSHOP</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        <link rel="stylesheet" type="text/css" id="theme" href='{{asset("css/app.css")}}'/>
        <link rel="stylesheet" type="text/css" id="theme" href='{{asset("dependencies/css/theme-default.css")}}'/>
        <!-- CSS INCLUDE -->
        <link rel="stylesheet" type="text/css" id="theme" href='{{asset("css/custom/main.css")}}'/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- EOF CSS INCLUDE -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>

        <!-- script -->
        <script type="text/javascript" src='{{asset("dependencies/js/plugins/jquery/jquery.min.js")}}'></script>
        <!-- end script -->
        <!-- AngularJs -->
        <script src="{{asset('js/angular-1.7.2/angular.min.js')}}"></script>
        <script src="{{asset('js/angular-1.7.2/dirPaginate.js')}}"></script>
        <!-- THIS PAGE PLUGINS -->
        <script type="text/javascript" src="{{asset('dependencies/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js')}}"></script>
        <!-- START PLUGINS -->

        <!-- END PLUGINS -->
        <!-- script -->
        <script type="text/javascript" src="{{asset('js/jquery/jquery.min.js')}}"></script>

        <!-- AngularJs -->
        <script type="text/javascript" src="{{asset('js/app.js')}}"></script>

        <!--ส่วนslideสินค้า-->
        <script src="{{ asset('js/jquery-1.11.3.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/jquery-ui.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
        <script src="{{ asset('js/BootstarpTable/bootstrap-table.js') }}"></script>
        <script src="{{ asset('js/BootstarpTable/bootstrap-table-th-TH.js') }}"></script>
        <script src="{{ asset('js/BootstarpTable/bootstrap-table-th-TH.min.js') }}"></script>
    </head>
    <body>
        @include('elements.navbar')
        <div>
            @yield('content')
        </div>
        @include('elements.footer')
        <!-- START PLUGINS -->
        <script type="text/javascript" src='{{asset("dependencies/js/plugins/jquery/jquery-ui.min.js")}}'></script>
        <script type="text/javascript" src='{{asset("dependencies/js/plugins/bootstrap/bootstrap.min.js")}}'></script>
        <script type="text/javascript" src="{{asset('js/jQueryRotateCompressed.js')}}"></script>
        <!-- END PLUGINS -->

        <!-- THIS PAGE PLUGINS -->
        <script type='text/javascript' src='{{asset("dependencies/js/plugins/icheck/icheck.min.js")}}'></script>
        <script type="text/javascript" src='{{asset("dependencies/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js")}}'></script>
        <!-- END PAGE PLUGINS -->

        <!-- START TEMPLATE -->
        <script type="text/javascript" src='{{asset("dependencies/js/plugins.js")}}'></script>
        <script type="text/javascript" src='{{asset("dependencies/js/actions.js")}}'></script>
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->
    </body>
</html>

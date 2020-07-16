<!DOCTYPE html>
<html ng-app="application" lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>POOLSHOP</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

    <!-- CSS INCLUDE -->
    <link rel="stylesheet" type="text/css" id="theme" href='{{asset("dependencies/css/theme-default.css")}}'/>
    <link rel="stylesheet" type="text/css" id="theme" href='{{asset("css/custom/main.css")}}'/>
    <link rel="stylesheet" type="text/css" id="theme" href='{{asset("css/custom/backend.css")}}'/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon"/>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" id="theme" href='{{asset("css/app.css")}}'/>
    <link rel="stylesheet" type="text/css" id="theme" href='{{asset("css/custom/main.css")}}'/>

    <script src="{{ asset('js/jquery-1.11.3.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{asset('js/jquery/jquery-ui.min.js')}}"></script>

    <!-- Scripts -->
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
    <!-- AngularJs -->
    <script src="{{asset('js/angular-1.7.2/angular.min.js')}}"></script>
    <script src="{{asset('js/angular-1.7.2/dirPaginate.js')}}"></script>
    <script> var app = angular.module('application', []); </script>
    <!-- THIS PAGE PLUGINS -->
    <script type="text/javascript"
            src="{{asset('dependencies/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js')}}"></script>

    <script src="{{ asset('js/BootstarpTable/bootstrap-table.js') }}"></script>
    <script src="{{ asset('js/BootstarpTable/bootstrap-table-th-TH.js') }}"></script>
    <script src="{{ asset('js/BootstarpTable/bootstrap-table-th-TH.min.js') }}"></script>
</head>
<body>
<div id="app">

@guest

@else
    <!-- Top Bar-->
        <nav class="navbar-fixed-top navbar-default mainnavbarindex">
            <div class="container-fluid">
                <ul class="nav navbar-nav navbar-right" style="margin-right:20px">
                    <li role="presentation" class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle active" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color:black;">
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right logouthover" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" style="text-align:right" ;
                               onclick="event.preventDefault();
                                                document.getElementById('signout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="signout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <!--end top bar-->
        <!-- Right Side Of Navbar -->
        <ul class="sidebar-nav"
            style="background-color: #1E73BE; list-style-type:none;margin:0;padding:0;position: absolute;display: table;height: 100%;width:13%;table-layout: fixed;position:fixed;z-index:2;">
            <div class="logotxt" align="center"><b>POOLSHOPBKK</b></div>
            <h1 class="line"></h1>
            <li role="presentation" class="nav-item">
                <a class="nav-link" href="/BackendProduct"><i class="fa fa-product-hunt"></i> Product</a>
            </li>
            <li role="presentation" class="nav-item">
                <a class="nav-link" href="/BackendCategoryProduct"><i class="fa fa-bullhorn"></i> Category</a>
            </li>
            <li role="presentation" class="nav-item">
                <a class="nav-link" href="/BackendBrandProduct"><i class="fa fa-shield"></i> Brand</a>
            </li>
            <li role="presentation" class="nav-item">
                <a class="nav-link" href="/BackendSpecial"><i class="fa fa-bullhorn"></i> Promotion</a>
            </li>
            <li role="presentation" class="nav-item">
                <a class="nav-link" href="/v1/handle/user"><i class="fa fa-user"></i> Member</a>
            </li>
            <li role="presentation" class="nav-item">
                <a class="nav-link" href="/v1/handle"><i class="fa fa-shopping-cart"></i> Order</a>
            </li>
            <li role="presentation" class="nav-item">
                <a class="nav-link" href="/BackendContactUs"><i class="fa fa-home"></i> Contact Us</a>
            </li>

            <li role="presentation" class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false" v-pre>
                    <i class="fa fa-cog" aria-hidden="true"></i>
                    Setting
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"
                     style="background-color: darkgray;">
                    <a class="dropdown-item" href="/v1" style="background-color: #314190;" ;>
                        <i class="fa fa-university" aria-hidden="true"></i>
                        Create Bank Info
                    </a>
                    <a class="dropdown-item" href="/v1/handle/delivery" style="background-color: #314190;" ;>
                        <i class="fa fa-truck"></i> Delivery
                    </a>
                    <a class="dropdown-item" href="/VideoSetting" style="background-color: #314190;" ;>
                        <i class="fa fa-video-camera" aria-hidden="true"></i>
                        Video Setting
                    </a>
                </div>
            </li>
        </ul>
</div>
<!-- show responsive -->
<div class="show-responsive">
    <!-- Top Bar-->
    <nav class="navbar-fixed-top navbar-default"
         style="position:fixed;z-index:1;background-color:#EDEDED;height:45px;max-height:auto;">
        <div class="container-fluid">
            <ul class="nav navbar-nav navbar-right" style="margin-right:20px">
                <li role="presentation" class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle active" href="#" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color:black;">
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"
                         style="background-color: darkgray;">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           style="background-color: darkgray;text-align:right" ;
                           onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <!--end top bar-->
    <!-- Right Side Of Navbar -->
    <ul class="sidebar-nav"
        style="background-color: #1E73BE; list-style-type:none;margin:0;padding:0;position: absolute;display: table;height: 100%;table-layout: fixed;position:fixed;z-index:0;">
        <h1 style="color:white;" align="center">POOLSHOPBKK</h1>
        <h1 class="line"></h1>
        <li role="presentation" class="nav-item">
            <a class="nav-link" href="/BackendBanner">Banner</a>
        </li>
        <li role="presentation" class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false" v-pre>
                <i class="fa fa-cog" aria-hidden="true"></i>
                Product
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"
                 style="background-color: darkgray;">
                <a class="dropdown-item" href="/BackendProduct" style="background-color: darkgray;" ;>
                    Product
                </a>
                <a class="dropdown-item" href="/BackendCategoryProduct" style="background-color: darkgray;" ;>
                    Category
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
        <li role="presentation" class="nav-item">
            <a class="nav-link" href="/BackendSpecial"><i class="fa fa-bullhorn"></i> Promotion</a>
        </li>
        <li role="presentation" class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false" v-pre>
                Blog
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"
                 style="background-color: darkgray;">
                <a class="dropdown-item" href="/BackendPromotion" style="background-color: darkgray;" ;>
                    HealthyTopic
                </a>
                <a class="dropdown-item" href="/BackendCategoryPromotion" style="background-color: darkgray;" ;>
                    Category
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
        <li role="presentation" class="nav-item">
            <a class="nav-link" href="/BackendReview">Review</a>
        </li>
        <li role="presentation" class="nav-item">
            <a class="nav-link" href="/BackendAbout">About</a>
        </li>
        <li role="presentation" class="nav-item">
            <a class="nav-link" href="/BackendContactUs">ContactUs</a>
        </li>
        <li role="presentation" class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
        </li>
        <li role="presentation" class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false" v-pre>
                Setting
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"
                 style="background-color: darkgray;">
                <a class="dropdown-item" href="/v1" style="background-color: darkgray;" ;>
                    <i class="fa fa-university" aria-hidden="true"></i>
                    CreateBankInfo
                </a>
                <a class="dropdown-item" href="/v1/handle" style="background-color: darkgray;" ;>
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    Order
                </a>
                <a class="dropdown-item" href="/v1/handle/user" style="background-color: darkgray;" ;>
                    <i class="fa fa-user"></i>
                    User
                </a>
                <a class="dropdown-item" href="/VideoSetting" style="background-color: #314190;" ;>
                    <i class="fa fa-video-camera" aria-hidden="true"></i>
                    Video Setting
                </a>
            </div>
        </li>

    </ul>
    <!-- Right Side Of Navbar -->
    <ul class="sidebar-nav"
        style="background-color: #1E73BE; list-style-type:none;margin:0;padding:0;position: absolute;display: table;height: 100%;width:13%;table-layout: fixed;position:fixed;z-index:2;">
        <div style="color:white;font-size:30px" align="center">POOLSHOPBKK</div>
        <h1 class="line"></h1>
        <li role="presentation" class="nav-item">
            <a class="nav-link" href="/BackendProduct"><i class="fa fa-product-hunt"></i> Product</a>
        </li>
        <li role="presentation" class="nav-item">
            <a class="nav-link" href="/BackendCategoryProduct"><i class="fa fa-bullhorn"></i> Category</a>
        </li>
        <li role="presentation" class="nav-item">
            <a class="nav-link" href="/BackendBrandProduct"><i class="fa fa-shield"></i> Brand</a>
        </li>
        <li role="presentation" class="nav-item">
            <a class="nav-link" href="/BackendSpecial"><i class="fa fa-bullhorn"></i> Promotion</a>
        </li>
        <li role="presentation" class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false" v-pre>
                Blog
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"
                 style="background-color: #314190;">
                <a class="dropdown-item" href="/BackendPromotion" style="background-color: #314190;" ;>
                    Pooshopbkktopic
                </a>
                <a class="dropdown-item" href="/BackendCategoryPromotion" style="background-color: #314190;" ;>
                    Category
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_token() }}
                </form>
            </div>
        </li>
        <li role="presentation" class="nav-item">
            <a class="nav-link" href="/BackendReview">Review</a>
        </li>
        <li role="presentation" class="nav-item">
            <a class="nav-link" href="/BackendAbout">About</a>
        </li>
        <li role="presentation" class="nav-item">
            <a class="nav-link" href="/BackendContactUs">ContactUs</a>
        </li>
        <li role="presentation" class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
        </li>
        <li role="presentation" class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false" v-pre>
                <i class="fa fa-cog" aria-hidden="true"></i>
                Setting
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"
                 style="background-color: darkgray;">
                <a class="dropdown-item" href="/v1" style="background-color: #314190;" ;>
                    <i class="fa fa-university" aria-hidden="true"></i>
                    CreateBankInfo
                </a>
                <a class="dropdown-item" href="/v1/handle" style="background-color: #314190;" ;>
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    Order
                </a>
                <a class="dropdown-item" href="/v1/handle/user" style="background-color: #314190;" ;>
                    <i class="fa fa-user"></i>
                    User
                </a>
                <a class="dropdown-item" href="/v1/handle/delivery" style="background-color: #314190;" ;>
                    Delivery
                </a>
                <a class="dropdown-item" href="/VideoSetting" style="background-color: #314190;" ;>
                    <i class="fa fa-video-camera" aria-hidden="true"></i>
                    Video Setting
                </a>

            </div>
        </li>
    </ul>
</div>
@endauth
<!-- content  -->
<script>
</script>
<main class="py-4 nonpaddingtop" style="margin-top:5%;margin-left:15%;margin-right:2%">
    @yield('content')
</main>
</body>
</html>

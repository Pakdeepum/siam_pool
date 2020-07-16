<div class="headbar">
    <div class="bg-navbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <a href="{{url('/')}}"><img class="logo" src='{{asset("img/logo/poolicon.png")}}'></a>
                </div>

                <div class="col-lg-9">
                    <ul class="ultobmenubar">



                        @if(Session::has('_signin'))

                            <li>
                                <ul class="navbar-nav ml-auto fr">
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle logpos"
                                           style="top: 20px;" href="#" role="button" data-toggle="dropdown"
                                           aria-haspopup="true" aria-expanded="false" v-pre>

                                            {{ Session::get('data.name') }}
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right logpos"
                                             aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="/v1/profile">{{trans('home.edit_profile')}}</a>
                                            <a class="dropdown-item" id="payment" href="{{ url('/v1/payment/old/'.Session::get('data.id')) }}">
                                                {{trans('home.payment')}}
                                                <input type="hidden" name="users_id" id="users-id" value="{{ Session::get('data.id') }}">
                                                <input type="hidden" name="info" id="info" value="0">
                                            </a>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                               document.getElementById('signout-form').submit();">{{ trans('home.log_out') }}</a>
                                            <form id="signout-form" action="{{ route('logout') }}" method="POST"
                                                  style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li>
                                <a href="javascript:void(0);" id="signup" style="color:#282525;">{{ trans('home.sign_up') }}</a></p>
                            </li>
                            <li>
                                <a href="javascript:void(0);" id="signin" style="color:#282525;">{{ trans('home.log_in') }}</a>
                            </li>
                            @if(Session::has('paymentOldPath'))
                            <input type="hidden" id="paymentOldPath" value={{ Session::get('paymentOldPath') }} ></input>
                          @else
                            <input type="hidden" id="paymentOldPath" value="/" ></input>
                            @endif
                        @endif
                        <li>
                            <div class="cartpos">
                                <img src="{{asset('img/pic/shoppingcart .png')}}" class="cart-size" id="cart-category"
                                     alt="">
                                <span class="badge badge-success badge-light" id="cart">0</span>
                            </div>
                        </li>
                        @if(\App::getLocale()=="en")
                          <li><a href="{{ URL::to('setlocale/en') }}" class="lang-selected">EN</a></li>
                          <li> | </li>
                          <li><a href="{{ URL::to('setlocale/th') }}" >ไทย</a></li>
                        @else
                          <li><a href="{{ URL::to('setlocale/en') }}" >EN</a></li>
                          <li> | </li>
                          <li><a href="{{ URL::to('setlocale/th') }}" class="lang-selected">ไทย</a></li>
                        @endif

                    </ul>

                </div>


            </div>
        </div>
    </div>
</div>
<div class="bluebar hidden-sm hidden-xs">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="buleul" >
                  <div class="btn-group">
                    <a style="color:white;" href="/"><li class="bluebarli">{{ trans('home.home') }}</li></a></div>
                      <div class="btn-group">
                      <div class="dropdown">
                    <a class="dropdown" data-toggle="dropdown" style="color:white;" href="" class="bluebarli"><li class="bluebarli">
                        {{trans('home.product' )}}
                  </li></a>
                   <ul class="dropdown-menu buleul">

                      <a class="dropdown-item" style="color:white;background: #238fcc; text-align:left;" class="submenustd" href="/product/FilterCategory/1"><li class="bluebarli">{{ trans('home.chlorinators') }}</li></a>
                     <a class="dropdown-item" style="color:white;background: #238fcc; text-align:left;" class="submenustd" href="/product/FilterCategory/7"><li class="bluebarli">{{ trans('home.oxygen_minerale')}}</li></a>
                     <a class="dropdown-item" style="color:white;background: #238fcc; text-align:left;" class="submenustd" href="/product/FilterCategory/3"><li class="bluebarli">{{ trans('home.filter') }}</li></a>
                      <a class="dropdown-item" style="color:white;background: #238fcc; text-align:left;"  class="submenustd" href="/product/FilterCategory/2"><li class="bluebarli">{{ trans('home.pumps') }}</li></a>
                      <a class="dropdown-item" style="color:white;background: #238fcc; text-align:left;" class="submenustd"  href="/product/FilterCategory/6"><li class="bluebarli">{{ trans('home.accessories') }}</li></a>
                    </ul>
                  </div>
                </div>
                    <div class="btn-group"><a style="color:white;" href="/home/FAQ"><li class="bluebarli">{{ trans('home.FAQ') }}</li></a></div>
                    <div class="btn-group"><a style="color:white;" href="/contactUs"><li class="bluebarli">{{ trans('home.contact_us') }}</li></a></div>
                    <div class="btn-group"><a style="color:white;"  href="/contactUs"><li class="bluebarli">{{ trans('home.pool_construction') }}</li></a></div>
                    {{-- <div class="btn-group"><a style="color:white;" target="_blank" href="http://www.siampool.com"><li class="bluebarli">{{ trans('home.pool_construction') }}</li></a></div> --}}
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="burger-menu">
    <div class="bg-navbar">
        <div class="container">
            <div class="row">
                <!-- Top Navigation Menu -->
                <div class="topnav text-right" ng-controller="ElementsController" ng-cloak>
                    <a href="#"></a>
                    <div id="myLinks" class="text-center">

                        <div><a style="color:white;background: #238fcc;" href="/">{{ trans('home.home') }}</a></div>
                        <div class="dropdown">
                          <a class="dropdown" data-toggle="collapse" ng-click="isCollapsed=!isCollapsed" data-target="#collapseItem" style="color:white;background: #238fcc;" href="" class="bluebarli">{{trans('home.product')}}<i ng-show="!isCollapsed" class="fa fa-plus pull-right"></i><i ng-show="isCollapsed" class="fa fa-minus pull-right"></i>
                          </a>
                          <div class="collapse" id="collapseItem">
                            <div><a class="dropdown-item submenustd" style="color:white;background: #238fcc; text-align:left;"  href="/product/FilterCategory/1">{{ trans('home.chlorinators') }}</a></div>
                           <div><a class="dropdown-item submenustd" style="color:white;background: #238fcc; text-align:left;" href="/product/FilterCategory/7">{{ trans('home.oxygen_minerale')}}</a></div>
                           <div><a class="dropdown-item submenustd" style="color:white;background: #238fcc; text-align:left;" href="/product/FilterCategory/3">{{ trans('home.filter') }}</a></div>
                            <div><a class="dropdown-item submenustd" style="color:white;background: #238fcc; text-align:left;"  href="/product/FilterCategory/2">{{ trans('home.pumps') }}</a></div>
                            <div><a class="dropdown-item submenustd" style="color:white;background: #238fcc; text-align:left;"  href="/product/FilterCategory/6">{{ trans('home.accessories') }}</a></div>
                          </div>
                        </div>
                          <div><a style="color:white;background: #238fcc;" href="/home/FAQ">{{ trans('home.FAQ') }}</a></div>
                          <div><a style="color:white;background: #238fcc;" href="/contactUs">{{ trans('home.contact_us') }}</a></div>
                          <div><a style="color:white;background: #238fcc;" href="/contactUs">{{ trans('home.pool_construction') }}</a></div>
                          {{-- <div><a style="color:white;background: #238fcc;" target="_blank" href="http://www.siampool.com">{{ trans('home.pool_construction') }}</a></div> --}}
                    </div>
                    <a href="javascript:void(0);" class="icon" onclick="myFunction()"  style="background: #238fcc;">
                        <i class="fa fa-bars"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div class="col-sm-offset show-responsive text-center">
    <img src="{{asset('img/pic/shopping-bag.png')}}" class="cart-size" style="padding-top: 0px;" id="cart-category2"
         alt="">
</div> --}}
</div>
<script src="{{ asset('js/navbar/signup.js')}}"></script>
<script src="{{ asset('js/navbar/signin.js')}}"></script>
<script src="{{ asset('js/navbar/basket.js')}}"></script>
<script src="{{ asset('js/navbar/forgotpwd.js')}}"></script>
<script>
    function myFunction() {
        var x = document.getElementById("myLinks");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }

    $(document).ready(function () {
      var paymentPath = $("#paymentOldPath").val();
      console.log('paymentPath:',paymentPath);
      var paymentPathsession = "{!!Session::has('paymentOldPath')!!}";
      if(paymentPathsession){
        var session = "{!!Session::get('_signin')!!}";
        if(!session){
          $("#signin").click();
        }

      }
        $("#cart-accept").on('click', function () {
            var getProduct = $('#cart-table').bootstrapTable('getData');
            if (getProduct.length > 0) {
                var session = "{!!Session::get('_signin')!!}";
                if (!session) {
                    $("#modal-cart").modal('hide');
                    setTimeout(function () {
                        $("#modal-signin").modal('show');
                    }, 100);
                } else {
                    setTimeout(function () {
                        window.location.href = "/v1/address";
                    }, 100);
                }
            }
        });

    });
</script>
@include('elements.Modals.cart_category-modal')
@include('elements.Modals.sign-up-modal')
@include('elements.Modals.signin-modal')
@include('elements.Modals.forgot-pwd-modal')

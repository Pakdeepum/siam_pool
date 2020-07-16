<style>
    button {
        display: block;
    }
</style>
<div class="bg-footer" ng-controller="ElementsController" ng-cloak ng-model='datalistcontactus'>

    <div class="row hide-responsive" style="border-top: 1px solid rgb(108, 108, 108); margin-bottom: 10px">
        <div class="container">
        <div class="col-md-2  col-lg-offset-1 text-left">
            <div class="ft-menu">menu
            </div>
            <div style="line-height:15pt;">
                {{-- <button class="btn-footer" ng-repeat="data in datalistmemu ">
                    <a href="@{{data.url}}">@{{data.menu_name}}</a>
                </button> --}}
                <button class="btn-footer" style="display: inline-block;">
                    <div style="text-align:left"><a href="/">Home</a></div>
                    <div style="text-align:left"><a href="/product">Product</a></div>
                    <div style="text-align:left"><a href="/contactUs">Contact Us</a></div>
                </button>
            </div>
        </div>
        <div class="col-md-2 col-lg-offset-1 text-left">
            <div class="ft-menu">FOLLOW US</div>
            <p class="txtfootcol2">Instragram</p>
            <p class="txtfootcol2">Faceboook</p>
            <p class="txtfootcol2">Twitter</p>
        </div>
        <div class="col-md-4 col-lg-offset-2 text-left" style="padding-right:25px;" ng-repeat="contact in datalistcontactus">
            <div class=" ft-menu">Contact</div>
            <p class="txtfoolcol3"><b>Address :</b>@{{contact.contact_us_address}}</p>
            <p class="txtfoolcol3"><b>Tel :</b> @{{contact.contact_us_phone}} </p>
        </div>
    </div>
    </div>
    <!-- showreponsive -->
    <div class="row show-responsive" style="border-top: 1px solid rgb(108, 108, 108);">
        <div class="container">
            <div class="col-md-4 text-left">
                <div class="f_size_ct20">menu</div>
                <div style="line-height:18pt;">
                    <div class="">
                        {{-- <button class="btn-footer" ng-repeat="data in datalistmemu " style="display: inline-block;">
                            <a href="@{{data.url}}">@{{data.menu_name}}</a>
                        </button> --}}
                        <button class="btn-footer" style="display: inline-block;">
                          <div style="text-align:left"><a href="/">Home</a></div>
                          <div style="text-align:left"><a href="/product">Product</a></div>
                          <div style="text-align:left"><a href="/contactUs">Contact Us</a></div>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-4  text-left">
                <div class="f_size_ct20">FOLLOW US</div>
                <a class="txtfootcol2">Instragram</a>
                <a class="txtfootcol2">Faceboook</a>
                <a class="txtfootcol2">Twitter</a>

                {{--                            <a href="https://www.facebook.com/healthhandheart/"><img--}}
{{--                                        src="{{asset('img/pic/facebook.png')}}" alt="" style="padding:10px 10px;"></a>--}}
{{--                            <a href="http://line.me/ti/p/@be3h"><img src="{{asset('img/pic/line.png')}}" alt=""--}}
{{--                                                                     style="padding:10px 10px;"></a>--}}

            </div>
        </div>
    </div>
    <div class="last-footer-bg">
        <div class="container">
            <div class="row hide-responsive" style="margin-top: 15px;">
                <div class="col-lg-12">
                    <center>
                        <p class="footertxt">Copyright 2019 POOLSHOPBKK CO.,Ltd | All Rights Reserved</p>
                    </center>
                </div>
            </div>
            <!--showreponsive-->
            <div class="show-responsive">
                <div class="row" style="margin-top: 15px;">
                    <div class="col-lg-6 text-center">
                        <p class="footertxt">Copyright 2019 POOLSHOPBKK CO.,Ltd | All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@extends('layouts.app-element')
@section('content')
    <!-- start -->
    <div ng-controller="HomeController" ng-model='datalistmemuonhome' ng-cloak>
        <?php if(isset($data)){?>
        <div data-ng-init=<?php echo "load_data(" . $data . ")" ?> ></div>
        <?php } ?>
        <div id="myCarousel" class="carousel slide">
            <div class="carousel-inner">
                <div class="item active">
                    <img class="imgbasic" src="{{asset('img/pic/slider_1.png')}}">
                </div>
                <div class="item">
                    <img class="imgbasic" src="{{asset('img/pic/slider_2.png')}}">
                </div>
                <div class="item">
                    <img class="imgbasic" src="{{asset('img/pic/slider_3.png')}}">
                </div>
                <div class="item">
                    <img class="imgbasic" src="{{asset('img/pic/slider_4.png')}}">
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="container martop20 " style="padding-bottom: 20px;">
          <div class="row">
            <div class="col-md-3 nopadding"><h3 class="headstdindex">{{trans('home.company_profile')}}</h3></div>
            <div class="col-md-9  nopadding">
                <hr style="border-top:1px;margin:10px 0px 10px 0px" align="center"></hr>
            </div>
          </div>
          <div class="row">
            <div class="stdindexbox">

                <div class="container">
                    <div class="row ">
                        <div class="col-lg-12">
                            <h3 align="center" >POOLSHOPBKK</h3>
                            <b style="margin-bottom: 10px;">{!!trans('profile.company_profile')!!}</b>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
        <div class="container martop20 " style="padding-bottom: 20px;">
            <div class="row">
                <div class="col-md-3 nopadding">
                    <h3  class="headstdindex">{{trans('home.top_seller')}}</h3>
                </div>
                <div class="col-md-8  nopadding">
                    <hr style="border-top:1px;margin:10px 0px 10px 0px" align="center"></hr>
                </div>
                <div class="col-md-1 nopadding" align="right">
                    <a class="left menu-link"><i class="glyphicon glyphicon-chevron-left"
                                                 ng-click="pageTopSellerChanged(2)"></i></a>
                    <a class="right menu-link"><i class="glyphicon glyphicon-chevron-right"
                                                  ng-click="pageTopSellerChanged(1)"></i></a>
                </div>
            </div>
            <div class="col-lg-3" ng-repeat="topProduct in topSellerProduct | limitTo:PerPage:PerPage*(pageTopSell-1)">
                <a ng-href="/product/ListProductDetail?id_product=@{{topProduct.id_product}}&id_category=@{{topProduct.id_category_product}}">
                    <img style="max-width:100%;max-height:auto;height:170px" class="imgbasic image-resize"
                         ng-src="{{asset('/storage/product')}}/@{{topProduct.id_product}}/@{{topProduct.pic1_url}}"></img>
                    <p class="headshopindex">@{{topProduct.product_name}}</p>
                </a>
                <p class="priceindex1" align="center">฿ @{{topProduct.price| number}}</p>
                <center>
                    <button class="shopbtn" style="background-color:white;"
                            ng-click="addProductToCart(topProduct.id_product)"><a style="color:black"
                                                                                  ng-href="/product/ListProductDetail?id_product=@{{topProduct.id_product}}&id_category=@{{topProduct.id_category_product}}">
                            <i class="fa fa-shopping-cart"> {{trans('home.add_to_cart')}}</i></a></button>
                </center>
            </div>
        </div>
        <div class="container martop" style="padding-bottom: 20px;">
            <div class="row">
                <div class="col-md-3 nopadding"><h3  class="headstdindex">{{trans('home.new_arrivals')}}</h3></div>
                <div class="col-md-8  nopadding">
                    <hr style="border-top:1px;margin:10px 0px 10px 0px" align="center"></hr>
                </div>
                <div class="col-md-1 nopadding" align="right">
                    <a class="left menu-link"><i class="glyphicon glyphicon-chevron-left" ng-click="pageChanged(2)"></i></a>
                    <a class="right menu-link"><i class="glyphicon glyphicon-chevron-right"
                                                  ng-click="pageChanged(1)"></i></a>
                </div>
            </div>
                <div class="col-lg-3" ng-repeat="new in newArrivalProduct | limitTo:PerPage:PerPage*(page-1)">
                        <a ng-href="/product/ListProductDetail?id_product=@{{new.id_product}}&id_category=@{{new.id_category_product}}">
                            <img style="max-width:100%;max-height:auto;height:170px" class="imgbasic image-resize"
                                 ng-src="{{asset('/storage/product')}}/@{{new.id_product}}/@{{new.pic1_url}}"></img>
                            <p class="headshopindex" style="color:black">@{{new.product_name}}</p>
                        </a>
                        <p class="priceindex1" align="center">฿ @{{new.price | number}}</p>
                        <center>
                            <button class="shopbtn" style="background-color:white;"
                                    ng-click="addProductToCart(new.id_product)"><a style="color:black"
                                                                                   ng-href="/product/ListProductDetail?id_product=@{{new.id_product}}&id_category=@{{new.id_category_product}}">
                                    <i class="fa fa-shopping-cart"> {{trans('home.add_to_cart')}}</i></a></button>
                        </center>
                </div>
        </div>
        <div class="container martop">
          <div class="row">
            <div class="col-md-3 nopadding"><h3  class="headstdindex">{{trans('home.product')}}</h3></div>
            <div class="col-md-9  nopadding">
                <hr style="border-top:1px;margin:10px 0px 10px 0px" align="center"></hr>
            </div>
          </div>
            <div class="row">
                <div class="col-lg-4">
                    <a href="/product/FilterCategory/2">
                        <img class="imgbasic imgproductindex" src="{{asset('img/pic/ban2.jpg')}}">
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href="/product/FilterCategory/6">
                        <img class="imgbasic  imgproductindex" src="{{asset('img/pic/ban3.jpg')}}">
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href="/product/FilterCategory/3">
                        <img class="imgbasic imgproductindex" src="{{asset('img/pic/ban4.jpg')}}">
                    </a>
                </div>
            </div>
            <div class="row martop20">
                <div class="col-lg-4">
                    <a href="/product/FilterCategory/1">
                        <img class="imgbasic imgproductindex" src="{{asset('img/pic/ban5.jpg')}}">
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href="/product">
                        <img class="imgbasic imgproductindex" src="{{asset('img/pic/ban10.jpg')}}">
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href="/product/FilterCategory/4">
                        <img class="imgbasic imgproductindex" src="{{asset('img/pic/ban6.jpg')}}">
                    </a>
                </div>
            </div>
            <div class="row martop20 marbottom">
                <div class="col-lg-4">
                    <a href="/product/FilterCategory/5">
                        <img class="imgbasic imgproductindex" src="{{asset('img/pic/ban7.jpg')}}">
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href="/product/FilterCategory/7">
                        <img class="imgbasic imgproductindex" src="{{asset('img/pic/ban8.jpg')}}">
                    </a>
                </div>
                <div class="col-lg-4">
                    {{-- <a href="/product">
                        <img class="imgbasic" src="{{asset('img/pic/ban9.jpg')}}">
                    </a> --}}
                </div>
            </div>
        </div>


        <div class="container">
            <div class="row martop20">
                <div class="col-md-2 nopadding">
                    <h3>{{trans('home.featured_brands')}}</h3>
                </div>
                <div class="col-md-9 nopadding">
                    <hr style="border-top:1px;margin:10px 0px 10px 0px" align="center"></hr>
                </div>
                <div class="col-md-1 nopadding" align="right">
                    <a class="left menu-link" href="#BrandCarouselControl" style="color:grey" data-slide="prev"><i
                                class="glyphicon glyphicon-chevron-left"></i></a>
                    <a class="right menu-link" href="#BrandCarouselControl" style="color:grey" data-slide="next"><i
                                class="glyphicon glyphicon-chevron-right"></i></a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="carousel slide multi-item-carousel" id="BrandCarouselControl" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item" ng-repeat="brand in datalistBrand" id="BrandCarousel"
                                 ng-class="{'active': $index =='0'}" on-finish-render="ngRepeatBrandFinished">
                                <div class="col-xs-4">
                                    <div class="bgslide">
                                        {{-- <h3>@{{brand.brand_name}}</h3> --}}
                                        <img class="img-responsive image-resize"
                                             ng-src="/storage/brandProduct/@{{brand.id_brand}}/@{{brand.brand_pic_url}}">
                                        {{-- <img style = "vertical-align: middle !important;" align="center" class="imgbasic" ng-src="/storage/brandProduct/@{{brand.id_brand}}/@{{brand.brand_pic_url}}"> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <a class="left carousel-control" href="#BrandCarouselControl" style="color:grey" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                        <a class="right carousel-control" href="#BrandCarouselControl" style="color:grey" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a> --}}
                    </div>
                </div>
            </div>
            <div class="row martop20">
                <div class="col-md-3 nopadding">
                    <h3  class="headstdindex">{{trans('home.featured_video')}}</h3>
                </div>
                <div class="col-md-8 nopadding">
                    <hr style="border-top:1px;margin:10px 0px 10px 0px" align="center"></hr>
                </div>
                <div class="col-md-1 nopadding" align="right">
                    <a class="left menu-link" href="#theCarousel" style="color:grey" data-slide="prev"><i
                                class="glyphicon glyphicon-chevron-left"></i></a>
                    <a class="right menu-link" href="#theCarousel" style="color:grey" data-slide="next"><i
                                class="glyphicon glyphicon-chevron-right"></i></a>
                </div>
            </div>
            <div class="row martop20 marbottom">
                <!--carousel-->
                <div class="col-md-12">
                    <div class="carousel slide multi-item-carousel" id="theCarousel" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item" ng-repeat="video in allActiveVideo" id="videoCarousel"
                                 ng-class="{'active': $index =='0'}" on-finish-render="ngRepeatVideoFinished">
                                <div class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                    <iframe width="350" height="250" ng-src="@{{video.video_url_embed | trusted}}"
                                            frameborder="0"
                                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!--end carousel-->
            </div>
            <div style="padding:20px;"></div>
        </div>

    </div>
    <script src="{{asset('js/home/form.js')}}"></script>
@endsection

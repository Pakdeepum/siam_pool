@extends('layouts.app-element')
@section('content')
      <?php if(isset($filter)){?>
      <div ng-controller="ProductController" data-ng-init="init({{ $filter['id'] }})" ng-cloak>
      <?php }else{ ?>
        <div ng-controller="ProductController" ng-cloak>
      <?php }?>
        <?php if(isset($data)){?>
        <div data-ng-init=<?php echo "load_data(" . $data . ")" ?> ></div>
    <?php } ?>
    <!--Side Bar Fiter Section-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xs-12 col-lg-3 col-md-3">
                    <div class="sideshop" style="margin-top: 50px;">
                        <h4 class="headshop">{{ trans('product.category')}}</h4>
                        <ul class="ulshop">
                            <li role="presentation" class="lishop" ng-repeat="data in allcategoryproduct track by $index">
                              <a ng-show="data.id_category_product!=6" class="head-txt-product dropdown" href=""
                                   ng-click="SelectCategoryProduct(data.id_category_product,data.category_product_name)"
                                   tabindex="1" style="margin-right:5px" ng-class="{'lang-selected':Current_Category_ID==data.id_category_product}">@{{data.category_product_name}}</a>
                              <a ng-show="data.id_category_product==6" class="head-txt-product dropdown" href=""
                                {{-- data-toggle="collapse" data-target="#collapseCategoryItem" aria-expanded="false" --}}
                                   ng-click="SelectCategoryProduct(data.id_category_product,data.category_product_name)"
                                   tabindex="1"  style="margin-right:5px" ng-class="{'lang-selected':Current_Category_ID==data.id_category_product}">@{{data.category_product_name}}</a>
                                     <div ng-show="isCollapsed"  ng-repeat="sub in data.submenu track by $index">
                                       <a href="" tabindex="1"  style="margin-right:5px;padding-left:10px;" class="head-txt-product dropdown" ng-click="SelectCategoryProduct(sub.id_category_product,sub.category_product_name)" ng-class="{'lang-selected':Current_Category_ID==sub.id_category_product}">@{{sub.category_product_name}}</a>
                                     </div>
                            </li>
                        </ul>
                        <h4 class="headshop">{{ trans('product.price_range')}}</h4>
                        <hr>
                        <div class="row">
                            <div class="col-lg-12">
                                <slider-range min="0" max="100000" value-min="search.price_min"
                                              value-max="search.price_max"></slider-range>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 nopadding" align="left">฿0</div>
                            <div class="col-lg-6 nopadding" align="right">฿100000</div>
                        </div>
                        <div class="row" style="padding:10px">
                            <div class="col-lg-1 nopadding">฿</div>
                            <div class="col-lg-5 nopadding"><input id="priceInputText" class="form-control" type="text"
                                                                   ng-model="search.price_min"/></div>
                            <div class="col-lg-1 nopadding" style="vertical-align:center;" align="center"> -</div>
                            <div class="col-lg-5 nopadding"><input id="priceInputText" class="form-control" type="text"
                                                                   ng-model="search.price_max"/></div>
                        </div>
                        <div align="center" style="padding:10px">
                            <button class="btn btn-success" style="width:80%" ng-click="priceFiltering()"
                                    align="center">
                                {{ trans('product.apply') }}
                            </button>
                        </div>
                        <hr>
                    </div>
                </div>
                <!--End Side Bar Fiter Section-->
                <div class="col-sm-12 col-xs-12 col-md-9 col-lg-9 nopadding" align="left">
                    <div class="last-section-bg">
                        <div class="row" style=" margin-bottom: 40px;">
                                <div class="col-lg-4"
                                     dir-paginate="data in datalistproduct | itemsPerPage:12 |filter:pricefilter|filter:Product |orderBy: order" on-finish-render="ngRepeatProductFinished">
                                    <form action="{{route('product.ListProductDetail')}}" method="get"
                                          enctype="multipart/form-data" class="form-horizontal" role="form">
                                        {{-- {{csrf_field()}} --}}
                                        <input type="hidden" name="id_product" value="@{{data.id_product}}">
                                        <input type="hidden" name="id_category"
                                               value="@{{data.id_category_product}}">
                                        <div class="show-product  imgcropped">
                                            <a ng-href="/product/ListProductDetail?id_product=@{{data.id_product}}&id_category=@{{data.id_category_product}}"><img class="image-resize" ng-src="{{asset('/storage/product')}}/@{{data.id_product}}/@{{data.pic1_url}}"></a>
                                        </div>
                                        <div class="select text-center" ng-show="data.product_code!='CHL-C'">
                                               <p class="prohd"><a ng-href="/product/ListProductDetail?id_product=@{{data.id_product}}&id_category=@{{data.id_category_product}}" class="lang-selected"> @{{data.product_name}} </a></p>
                                                <p class="proprice">@{{data.price | number}} Baht</p>
                                                <div ng-show="data.stock_amount<=0">
                                                  <button type="button" class="btn btn-danger">{{ trans('product.out_of_stock')}}</button>
                                                </div>
                                        </div>
                                        <div class="select text-center" ng-show="data.product_code=='CHL-C'">
                                               <p class="prohd"><a ng-href="/product/ListProductDetail?id_product=@{{data.id_product}}&id_category=@{{data.id_category_product}}" class="lang-selected"> @{{data.product_name}} </a></p>
                                            <button class="btn btn-danger">{{ trans('product.please_contact_the_seller')}}</button>
                                        </div>
                                    </form>
                                </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4 col-md-offset-3">
                                    <nav aria-label="...">
                                        <ul class="pagination pagination-sm" style="float:right;">
                                            <dir-pagination-controls max-size="5" direction-links="true"
                                                                     boundary-links="true">
                                            </dir-pagination-controls>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/product/form.js')}}"></script>
@endsection

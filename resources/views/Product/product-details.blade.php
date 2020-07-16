@extends('layouts.app-element')
@section('content')

<?php
$data = end($data);
?>
<div ng-controller="ProductController" ng-cloak>
    <input type="hidden" value="{{$category}}" name="category" id="category" ng-model="category"/>
    <div class="last-section-bg" >
      <div class="container">
        <div class="hide-responsive">
          <div class="row">
            <div class="col-lg-8 text-center" hidden>
              <div class="link-txt-product">HEALTH HAND HEART > Product > Product Detail</div>
            </div>
          </div>
        </div>
        <div class="show-responsive">
          <div class="row">
            <div class="col-lg-6" hidden>
              <div class="link-txt-product">HEALTH HAND HEART > Product > Product Detail</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
    <div class="row">
    <div class="col-md-9 col-md-offset-2" style="padding-bottom: 40px;">
    <div class="row" style="margin-top: 40px; margin-bottom: 40px;">
    <!-- hide -->
    <div class="col-lg-6 hide-responsive">
        <div class="show-product" id="image-product">
            <img class="imgstd" src='<?php echo asset('/storage/product'.'/'.($data['id_product'])).'/'.($data['pic1_url']); ?>' >
            <input type="hidden" id="pid" value='<?php echo asset('/storage/product'.'/'.($data['id_product'])).'/'.($data['pic1_url']); ?>'/>
        </div>
        <div class="row"display: inline-block;>
            @if($data['pic2_url'] !== null)
            <div class="show-sub-product sub-image" id="sub-1">
                <img   class="subimgstd" src='<?php echo asset('/storage/product'.'/'.($data['id_product'])).'/'.($data['pic2_url']); ?>' >
                <input type="hidden" value='<?php echo asset('/storage/product'.'/'.($data['id_product'])).'/'.($data['pic2_url']); ?>'/>
            </div>
            @endif
            @if($data['pic3_url'] !== null)
            <div class="show-sub-product sub-image" id="sub-2">
                <img  class="subimgstd" src='<?php echo asset('/storage/product'.'/'.($data['id_product'])).'/'.($data['pic3_url']); ?>' >
                <input type="hidden" value='<?php echo asset('/storage/product'.'/'.($data['id_product'])).'/'.($data['pic3_url']); ?>'/>
            </div>
            @endif
            @if($data['pic4_url'] !== null)
            <div class="show-sub-product sub-image" id="sub-3">
                <img  class="subimgstd" src='<?php echo asset('/storage/product'.'/'.($data['id_product'])).'/'.($data['pic4_url']); ?>' >
                <input type="hidden" value='<?php echo asset('/storage/product'.'/'.($data['id_product'])).'/'.($data['pic4_url']); ?>'/>
            </div>
            @endif
            @if($data['pic5_url'] !== null)
            <div class="show-sub-product sub-image" id="sub-4">
                <img class="subimgstd" src='<?php echo asset('/storage/product'.'/'.($data['id_product'])).'/'.($data['pic5_url']); ?>' >
                <input type="hidden" value='<?php echo asset('/storage/product'.'/'.($data['id_product'])).'/'.($data['pic5_url']); ?>'/>
            </div>
            @endif
        </div>
    </div>
    <!-- show -->
    <div class="col-lg-6 show-responsive">
    <div class="container">
        <div class="show-product" id="image-product">
            <img style="width: 190px;" src='<?php echo asset('/storage/product'.'/'.($data['id_product'])).'/'.($data['pic1_url']); ?>' >
            <input type="hidden" value='<?php echo asset('/storage/product'.'/'.($data['id_product'])).'/'.($data['pic1_url']); ?>'/>
        </div>
        <div class="row"display: inline-block;>
            @if($data['pic2_url'] !== null)
            <div class="col show-sub-product-res sub-image" id="sub-1">
                <img style="width: 45px;" src='<?php echo asset('/storage/product'.'/'.($data['id_product'])).'/'.($data['pic2_url']); ?>' >
                <input type="hidden" value='<?php echo asset('/storage/product'.'/'.($data['id_product'])).'/'.($data['pic2_url']); ?>'/>
            </div>
            @endif
            @if($data['pic3_url'] !== null)
            <div class="col show-sub-product-res sub-image" id="sub-2">
                <img style="width: 45px;" src='<?php echo asset('/storage/product'.'/'.($data['id_product'])).'/'.($data['pic3_url']); ?>' >
                <input type="hidden" value='<?php echo asset('/storage/product'.'/'.($data['id_product'])).'/'.($data['pic3_url']); ?>'/>
            </div>
            @endif
            @if($data['pic4_url'] !== null)
            <div class="col show-sub-product-res sub-image" id="sub-3">
                <img style="width: 45px;" src='<?php echo asset('/storage/product'.'/'.($data['id_product'])).'/'.($data['pic4_url']); ?>' >
                <input type="hidden" value='<?php echo asset('/storage/product'.'/'.($data['id_product'])).'/'.($data['pic4_url']); ?>'/>
            </div>
            @endif
            @if($data['pic5_url'] !== null)
            <div class="col show-sub-product-res sub-image" id="sub-4">
                <img style="width: 45px;" src='<?php echo asset('/storage/product'.'/'.($data['id_product'])).'/'.($data['pic5_url']); ?>' >
                <input type="hidden" value='<?php echo asset('/storage/product'.'/'.($data['id_product'])).'/'.($data['pic5_url']); ?>'/>
            </div>
            @endif
        </div>
    </div>
    </div>
      <div class="col-lg-6 txt-product-detail">
        <div class="col-lg-12" >
          <h3 id="product-name">{{$data['product_name']}}</h3>
          {{-- <label>รหัสสินค้า : <span id="product-detail">{{$data['id_product']}}</span></label> --}}
          <label>{{ trans('product.product_id') }}: <span id="product-detail">{{$data['product_code']}}</span></label>
          <input type="hidden" disabled="true" value="{{$data['stock_amount']}}" name="stock_amount" id="stock_amount"/>
          @if($data['product_code']!='CHL-C'){{--if not commercial--}}
            {{-- <h3> ราคา : --}}
            <h3> {{ trans('product.price') }} :
              <span id="price2">{{ number_format($data['price'] - (($data['price'] /100) * (count($data['special']) > 0 ? $data['special'][0]['discount'] : 0) ))}}</span>
              <input id="price-discount" type="hidden" value="{{ count($data['special']) > 0 ? $data['special'][0]['discount'] : 0}}"/>
              <input type="hidden" value="{{number_format($data['price'])}}" id="pricel"/>
              @if(count($data['special']) > 0)
              {{-- <strike><span id="price">{{number_format($data['price'])}} </span>บาท</strike></h3> --}}
              <strike><span id="price">{{number_format($data['price'])}} </span>{{ trans('product.Bath') }}</strike></h3>
              @else
              {{-- บาท --}}
              {{ trans('product.Bath') }}
              @endif
            <div class="row">
                {{-- <label for="amount">จำนวน</label> --}}
                <label for="amount">{{ trans('product.amount') }}</label>
            </div>
            {{-- <button type="button" class="btn buy_btn" id="buy" style="margin: 19px 1px 17px;">ใส่ตระกร้าสินค้า</button> --}}
            @if($data['stock_amount']>0){{-- ถ้ามีของใน stock--}}
              <div class="row">
                <input type="number" min="1" max="{{$data['stock_amount']}}" value="1" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" style="display: inline-block;width:120px;"maxlength="4" id="amount" name="amount" class="form-control"/>
                <input type="hidden" value="{{$data['id_product']}}" name="product-id" id="product-id"/>
              </div>
              <button type="button" class="btn buy_btn" id="buy" style="margin: 19px 1px 17px;">{{ trans('home.add_to_cart')}}</button>
              <div class="row">
              <label>{{ trans('product.stock_balance') }}: <span id="stock_balance">{{$data['stock_amount']}}</span> {{trans('product.piece')}}</label>
            </div>
            @else{{-- ถ้าไม่มีของใน stock--}}
              <div class="row">
                <input disabled="true" type="number" min="1" value="1" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" style="display: inline-block;width:120px;"maxlength="4" id="amount" name="amount" class="form-control"/>
                <input disabled="true" type="hidden" value="{{$data['id_product']}}" name="product-id" id="product-id"/>
              </div>
              <button type="button" disabled="true" class="btn btn-danger buy_btn" id="buy" style="margin: 19px 1px 17px;">{{ trans('product.out_of_stock')}}</button>
            @endif
            <hr>
          @else
            <h3> {{ trans('product.price') }} :
            <span id="price2">{{ trans('product.contact_the_seller') }}</span>
            <div class="row">
                {{-- <label for="amount">จำนวน</label> --}}
                {{-- <label for="amount">Contact the seller</label> --}}
            </div>
            <div class="row">
            </div>
            {{-- <button type="button" class="btn buy_btn" id="buy" style="margin: 19px 1px 17px;">ใส่ตระกร้าสินค้า</button> --}}
            <a href="/contactUs" style="color:white" target="_blank"><button type="button" class="btn btn-danger" style="margin: 19px 1px 17px;">{{ trans('product.contact_the_seller') }}</button></a>
            <hr>
          @endif
          {{-- <label>ข้อมูลสินค้า : <span id="product-detail" style="white-space: pre-wrap;">{{$data['product_detail']}}</span></label>
          <h1>วิธีใช้: <span id="product-instruction">{{$data['product_instruction']}}</span></h1>
          <label>คำเตือน : <span id="product-warning">{{$data['product_warning']}}</span></label> --}}
          <label>{{ trans('product.product_detail') }} : <span id="product-detail" style="white-space: pre-wrap;">{{$data['product_detail']}}</span></label>
          <h1>{{ trans('product.instruction') }}: <span id="product-instruction">{{$data['product_instruction']}}</span></h1>
          <label>{{ trans('product.warning') }} : <span id="product-warning">{{$data['product_warning']}}</span></label>
          {{-- <h1>สนใจซื้อสินค้าทางไลน์ติดต่อได้ที่</h1>
          <span ng-repeat="data in datalistcontactus ">
              <a href = @{{data.contact_us_facebook_url}} ><img src="{{asset('img/pic/facebook.png')}}"style="padding:10px 10px;"></a>
              <a href = @{{data.contact_us_line_url}} ><img src="{{asset('img/pic/line.png')}}"style="padding:10px 10px;"></a>
          </span>
          <img width="70px" height="70px" style="-webkit-user-select: none;" src="http://qr-official.line.me/L/uVzvKVmF1Z.png"><label style="color: #00c300;">Line: @be3h</label> --}}
        </div>
      </div>
    </div>
          <span style="text-transform: uppercase;">{{ trans('product.same_type_of_product') }}</span>
                <hr />
                <div class="row" display: inline-block;>
                    <div class="col show-row-product" ng-repeat="sames in sametype">
                    <div id="@{{sames.id_product}}_image" class="imgcropped">
                        <a ng-href="/product/ListProductDetail?id_product=@{{sames.id_product}}&id_category=@{{sames.id_category_product}}">
                          <img ng-src="<?php echo asset('/storage/product').'/{{sames.id_product}}/{{sames.pic1_url}}';?>" class="img-responsive img-fluid image-resize" style="height:150px;width:100%">

                          <!-- <img ng-src="<?php echo asset('/storage/product').'/{{sames.id_product}}/{{sames.pic1_url}}';?>" class="img-responsive img-fluid" alt=""> -->

                          </a>
                        </div>
                        <div class="select text-center" ng-show="sames.product_code!='CHL-C'">
                               <p class="prohd"><a ng-href="/product/ListProductDetail?id_product=@{{sames.id_product}}" class="lang-selected"> @{{sames.product_name.length>12?sames.product_name.substr(0,12).concat('...'):sames.product_name}} </a></p>
                                <p class="proprice">@{{sames.price | number}} Baht</p>
                            {{-- <button class="btn btn-success"> ADD TO CART</button> --}}
                        </div>
                        <div class="select text-center" ng-show="sames.product_code=='CHL-C'">
                               <p class="prohd"><a ng-href="/product/ListProductDetail?id_product=@{{sames.id_product}}" class="lang-selected"> @{{sames.product_name.length>12?sames.product_name.substr(0,12).concat('...'):sames.product_name}} </a></p>
                                {{-- <p class="proprice">Please Contact the Seller</p> --}}
                            <a href="/contactUs" style="color:white" target="_blank"><button class="btn btn-danger">{{ trans('product.contact_the_seller') }}</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-offset-2" style="padding-bottom: 40px;">
        <span style="text-transform: uppercase;">{{ trans('product.some_things_you_might_like') }}</span>
        <hr />
        <div class="row">
            <div class="col show-row-product" ng-repeat="might in somemight">
                <div id="@{{might.id_product}}_image">
                    <a ng-href="/product/ListProductDetail?id_product=@{{might.id_product}}&id_category=@{{might.id_category_product}}">
                        <img ng-src="<?php echo asset('/storage/product').'/{{might.id_product}}/{{might.pic1_url}}';?>" class="img-responsive img-fluid image-resize" style="height:150px;">
                    </a>
                </div>
                <div class="select text-center" ng-show="might.product_code!='CHL-C'">
                       <p class="prohd"><a ng-href="/product/ListProductDetail?id_product=@{{might.id_product}}" class="lang-selected"> @{{might.product_name.length>12?might.product_name.substr(0,12).concat('...'):might.product_name}} </a></p>
                        <p class="proprice">@{{might.price | number}} {{ trans('product.Bath') }}</p>
                    {{-- <button class="btn btn-success"> ADD TO CART</button> --}}
                </div>
                <div class="select text-center" ng-show="might.product_code=='CHL-C'">
                       <p class="prohd"><a ng-href="/product/ListProductDetail?id_product=@{{might.id_product}}" class="lang-selected"> @{{might.product_name.length>12?might.product_name.substr(0,12).concat('...'):might.product_name}} </a></p>
                        {{-- <p class="proprice">Please Contact the Seller</p> --}}
                    <a href="/contactUs" style="color:white" target="_blank"><button class="btn btn-danger">{{ trans('product.contact_the_seller') }}</button></a>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    @include('elements.Modals.cart_category-modal')
</div>
<script src="{{asset('js/product-details/form.js')}}"></script>
<script src="{{asset('js/navbar/basket.js')}}"></script>
@endsection

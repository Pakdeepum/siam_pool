@extends('layouts.app-element')
@section('content')

<?php
// print_r($data);
$data = end($data);
$data1 = end($data1);
  ?>

<div class="last-section-bg">
    <div class="container">
        <div class="hide-responsive">
            <div class="row">
                <div class="col-lg-6 text-left">
                    <div class="head-txt-product">{{$data['name_review']}}</div>
                </div>
                <div class="col-lg-6 text-right">
                    <div class="link-txt-product">HEALTH HAND HEART > Review  > {{$data['name_review']}}</div>
                </div>
            </div>
        </div>
        <div class="show-responsive">
            <div class="row">
                <div class="col-lg-6">
                    <div class="head-txt-product">{{$data['name_review']}}</div>
                </div>
                <div class="col-lg-6">
                    <div class="link-txt-product">HEALTH HAND HEART > Review > {{$data['name_review']}}</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row" style="margin-top: 40px;">
        <div class="col-lg-10 col-lg-offset-1 text-center">
            <img src='<?php echo asset('/storage/review').'/'.($data['id_review']).'/'.($data['pic_url']); ?>' style="width: 20%;">
        </div >
        <div class="col-lg-2"></div>
    </div>
    <div class="row" style="margin-bottom: 50px;">
        <div class="col-lg-9 col-lg-offset-2">
            <div class="txt-promotion-detail">
                <h1>{{$data['name_review']}}
                    <div style="font-size: 15px;">
                        About Product : {{$data1['product_name']}}
                    </div>
                </h1>

                {{-- <div ng-repeat="data1 in allaboutproduct" ng-show = "data.id_product == data1.id_product" >About Product : @{{data1.product_name}}</div> --}}
                <div class="row">
                    <div class="col-lg-12"  style="white-space: pre-wrap;text-align: justify;text-indent: 5em;">
                        <!--<div class="border-right"> -->
                            <p>{{$data['review_detail']}}</p>
                        <!--</div>-->
                    </div>
                </div>
            </diV>
        </div>
    </div>
</div>
<script src="{{asset('js/promotion-details/form.js')}}"></script>
@endsection
